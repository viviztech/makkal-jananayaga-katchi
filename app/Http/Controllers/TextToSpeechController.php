<?php

namespace App\Http\Controllers;

use App\Services\GoogleTextToSpeechService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TextToSpeechController extends Controller
{
    protected $ttsService;

    public function __construct(GoogleTextToSpeechService $ttsService)
    {
        $this->ttsService = $ttsService;
    }

    /**
     * Check TTS status and configuration
     */
    public function status(): JsonResponse
    {
        $isEnabled = $this->ttsService->isEnabled();

        return response()->json([
            'google_tts_enabled' => $isEnabled,
            'web_speech_available' => true, // Always available as fallback
            'default_engine' => $isEnabled ? 'google' : 'web_speech',
        ]);
    }

    /**
     * Generate speech from text
     */
    public function synthesize(Request $request): JsonResponse
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|max:5000',
            'language' => 'required|in:ta,en',
            'voice' => 'nullable|string',
            'use_google' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ], 400);
        }

        $text = $request->input('text');
        $language = $request->input('language', 'en');
        $voice = $request->input('voice');
        $useGoogle = $request->input('use_google', false);

        // If Google TTS is requested but not available, return error
        if ($useGoogle && !$this->ttsService->isEnabled()) {
            return response()->json([
                'success' => false,
                'error' => 'Google Cloud TTS is not configured. Using free Web Speech API.',
                'fallback_to_web_speech' => true
            ], 200);
        }

        // Use Web Speech API if Google not requested
        if (!$useGoogle) {
            return response()->json([
                'success' => true,
                'use_web_speech' => true,
                'message' => 'Using free Web Speech API'
            ]);
        }

        // Generate speech using Google Cloud TTS
        $result = $this->ttsService->synthesizeSpeech($text, $language, $voice);

        if ($result['success']) {
            return response()->json([
                'success' => true,
                'audio_url' => $result['audio_url'],
                'cached' => $result['cached'] ?? false,
                'engine' => 'google_cloud_tts'
            ]);
        }

        return response()->json([
            'success' => false,
            'error' => $result['error'],
            'fallback_to_web_speech' => true
        ], 500);
    }

    /**
     * Get available voices for a language
     */
    public function voices(Request $request): JsonResponse
    {
        $language = $request->input('language', 'ta');

        if (!$this->ttsService->isEnabled()) {
            return response()->json([
                'success' => false,
                'error' => 'Google Cloud TTS is not configured'
            ], 400);
        }

        $voices = $this->ttsService->getAvailableVoices($language);

        return response()->json([
            'success' => true,
            'voices' => $voices,
            'count' => count($voices)
        ]);
    }

    /**
     * Get estimated cost for text
     */
    public function estimateCost(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ], 400);
        }

        $text = $request->input('text');
        $estimate = $this->ttsService->getEstimatedCost($text);

        return response()->json([
            'success' => true,
            'estimate' => $estimate
        ]);
    }
}
