<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Exception;

class LLMService
{
    protected string $provider;
    protected array $config;

    public function __construct(?string $provider = null)
    {
        $this->provider = $provider ?? config('llm.default');
        $this->config = config("llm.providers.{$this->provider}");
        
        if (empty($this->config)) {
            throw new Exception("LLM provider '{$this->provider}' is not configured.");
        }
    }

    /**
     * Generate a chat completion.
     *
     * @param string $prompt The user prompt
     * @param array $options Additional options (temperature, max_tokens, etc.)
     * @param array $messages Optional message history
     * @return array
     */
    public function chat(string $prompt, array $options = [], array $messages = []): array
    {
        // Build messages array
        if (empty($messages)) {
            $messages = [
                [
                    'role' => 'system',
                    'content' => $options['system_prompt'] ?? config('llm.system_prompt')
                ],
                [
                    'role' => 'user',
                    'content' => $prompt
                ]
            ];
        }

        // Merge default options with provided options
        $defaultOptions = [
            'temperature' => config('llm.llama3.temperature'),
            'top_p' => config('llm.llama3.top_p'),
            'max_tokens' => config('llm.llama3.max_tokens'),
            'stream' => config('llm.llama3.stream'),
        ];

        $options = array_merge($defaultOptions, $options);

        // Call appropriate provider
        return match ($this->provider) {
            'ollama' => $this->ollamaChat($messages, $options),
            'openai' => $this->openaiChat($messages, $options),
            default => throw new Exception("Provider '{$this->provider}' is not supported."),
        };
    }

    /**
     * Generate a simple completion.
     *
     * @param string $prompt
     * @param array $options
     * @return string
     */
    public function generate(string $prompt, array $options = []): string
    {
        $response = $this->chat($prompt, $options);
        return $response['content'] ?? '';
    }

    /**
     * Chat with Ollama provider.
     *
     * @param array $messages
     * @param array $options
     * @return array
     */
    protected function ollamaChat(array $messages, array $options): array
    {
        try {
            $response = Http::timeout($this->config['timeout'])
                ->post("{$this->config['base_url']}/api/chat", [
                    'model' => $this->config['model'],
                    'messages' => $messages,
                    'stream' => $options['stream'],
                    'options' => [
                        'temperature' => $options['temperature'],
                        'top_p' => $options['top_p'],
                        'num_predict' => $options['max_tokens'],
                    ]
                ]);

            if (!$response->successful()) {
                throw new Exception("Ollama API error: {$response->body()}");
            }

            $data = $response->json();

            return [
                'content' => $data['message']['content'] ?? '',
                'model' => $data['model'] ?? $this->config['model'],
                'created_at' => $data['created_at'] ?? now()->toIso8601String(),
                'done' => $data['done'] ?? true,
                'total_duration' => $data['total_duration'] ?? null,
                'load_duration' => $data['load_duration'] ?? null,
                'prompt_eval_count' => $data['prompt_eval_count'] ?? null,
                'eval_count' => $data['eval_count'] ?? null,
            ];

        } catch (Exception $e) {
            throw new Exception("Failed to communicate with Ollama: {$e->getMessage()}");
        }
    }

    /**
     * Chat with OpenAI-compatible provider.
     *
     * @param array $messages
     * @param array $options
     * @return array
     */
    protected function openaiChat(array $messages, array $options): array
    {
        try {
            $response = Http::timeout($this->config['timeout'])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->config['api_key'],
                    'Content-Type' => 'application/json',
                ])
                ->post("{$this->config['base_url']}/chat/completions", [
                    'model' => $this->config['model'],
                    'messages' => $messages,
                    'temperature' => $options['temperature'],
                    'top_p' => $options['top_p'],
                    'max_tokens' => $options['max_tokens'],
                    'stream' => $options['stream'],
                ]);

            if (!$response->successful()) {
                throw new Exception("OpenAI API error: {$response->body()}");
            }

            $data = $response->json();
            $choice = $data['choices'][0] ?? [];

            return [
                'content' => $choice['message']['content'] ?? '',
                'model' => $data['model'] ?? $this->config['model'],
                'finish_reason' => $choice['finish_reason'] ?? null,
                'usage' => $data['usage'] ?? null,
                'created' => $data['created'] ?? null,
            ];

        } catch (Exception $e) {
            throw new Exception("Failed to communicate with OpenAI: {$e->getMessage()}");
        }
    }

    /**
     * Get the context length for the current model.
     *
     * @param bool $extended Whether to get extended context length
     * @return int
     */
    public function getContextLength(bool $extended = false): int
    {
        if ($extended) {
            return config('llm.llama3.context_length_extended');
        }
        
        return config('llm.llama3.context_length');
    }

    /**
     * Count tokens (approximate).
     * Note: This is a rough estimation. For accurate counting, use tiktoken or similar.
     *
     * @param string $text
     * @return int
     */
    public function estimateTokens(string $text): int
    {
        // Rough estimation: ~4 characters per token
        return (int) ceil(strlen($text) / 4);
    }

    /**
     * Check if text exceeds context length.
     *
     * @param string $text
     * @param bool $extended
     * @return bool
     */
    public function exceedsContextLength(string $text, bool $extended = false): bool
    {
        return $this->estimateTokens($text) > $this->getContextLength($extended);
    }

    /**
     * Truncate text to fit within context length.
     *
     * @param string $text
     * @param int|null $maxTokens
     * @return string
     */
    public function truncateToContextLength(string $text, ?int $maxTokens = null): string
    {
        $maxTokens = $maxTokens ?? $this->getContextLength();
        $estimatedTokens = $this->estimateTokens($text);
        
        if ($estimatedTokens <= $maxTokens) {
            return $text;
        }
        
        // Truncate to approximate character count
        $maxChars = $maxTokens * 4;
        return substr($text, 0, $maxChars) . '...';
    }

    /**
     * Get available models from Ollama.
     *
     * @return array
     */
    public function getAvailableModels(): array
    {
        if ($this->provider !== 'ollama') {
            throw new Exception("This method is only available for Ollama provider.");
        }

        try {
            $response = Http::timeout($this->config['timeout'])
                ->get("{$this->config['base_url']}/api/tags");

            if (!$response->successful()) {
                throw new Exception("Failed to fetch models: {$response->body()}");
            }

            return $response->json()['models'] ?? [];
        } catch (Exception $e) {
            throw new Exception("Failed to fetch available models: {$e->getMessage()}");
        }
    }

    /**
     * Pull a model from Ollama.
     *
     * @param string $modelName
     * @return bool
     */
    public function pullModel(string $modelName): bool
    {
        if ($this->provider !== 'ollama') {
            throw new Exception("This method is only available for Ollama provider.");
        }

        try {
            $response = Http::timeout(600) // 10 minutes for pulling models
                ->post("{$this->config['base_url']}/api/pull", [
                    'name' => $modelName,
                    'stream' => false,
                ]);

            return $response->successful();
        } catch (Exception $e) {
            throw new Exception("Failed to pull model: {$e->getMessage()}");
        }
    }
}
