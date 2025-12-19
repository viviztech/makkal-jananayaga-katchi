<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default LLM Provider
    |--------------------------------------------------------------------------
    |
    | This option defines which LLM provider should be used by default.
    | Supported: "ollama", "openai"
    |
    */

    'default' => env('LLM_PROVIDER', 'ollama'),

    /*
    |--------------------------------------------------------------------------
    | LLM Providers
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many LLM providers as you wish.
    |
    */

    'providers' => [
        'ollama' => [
            'base_url' => env('OLLAMA_BASE_URL', 'http://localhost:11434'),
            'model' => env('OLLAMA_MODEL', 'llama3'),
            'timeout' => env('OLLAMA_TIMEOUT', 120),
        ],

        'openai' => [
            'api_key' => env('OPENAI_API_KEY'),
            'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),
            'model' => env('OPENAI_MODEL', 'gpt-4'),
            'timeout' => env('OPENAI_TIMEOUT', 120),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Llama 3 Model Configuration
    |--------------------------------------------------------------------------
    |
    | Configure default parameters for Llama 3 models.
    |
    */

    'llama3' => [
        // Default context length for Llama 3 (8K tokens)
        'context_length' => env('LLAMA3_CONTEXT_LENGTH', 8192),
        
        // Max tokens for Llama 3.1 extended (128K tokens)
        'context_length_extended' => env('LLAMA3_CONTEXT_LENGTH_EXTENDED', 131072),
        
        // Default generation parameters
        'temperature' => env('LLAMA3_TEMPERATURE', 0.7),
        'top_p' => env('LLAMA3_TOP_P', 0.9),
        'max_tokens' => env('LLAMA3_MAX_TOKENS', 2048),
        'stream' => env('LLAMA3_STREAM', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | System Prompt
    |--------------------------------------------------------------------------
    |
    | Default system prompt for the LLM.
    |
    */

    'system_prompt' => env('LLM_SYSTEM_PROMPT', 'You are a helpful assistant.'),

];
