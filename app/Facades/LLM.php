<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array chat(string $prompt, array $options = [], array $messages = [])
 * @method static string generate(string $prompt, array $options = [])
 * @method static int getContextLength(bool $extended = false)
 * @method static int estimateTokens(string $text)
 * @method static bool exceedsContextLength(string $text, bool $extended = false)
 * @method static string truncateToContextLength(string $text, ?int $maxTokens = null)
 * @method static array getAvailableModels()
 * @method static bool pullModel(string $modelName)
 *
 * @see \App\Services\LLMService
 */
class LLM extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'llm';
    }
}
