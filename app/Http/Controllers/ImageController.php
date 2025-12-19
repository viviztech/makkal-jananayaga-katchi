<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * Serve images securely from storage
     * This route handles all storage image requests and avoids 403 permission issues
     * Works for both old files (in root) and new files (in subdirectories)
     *
     * @param Request $request
     * @param string $path
     * @return Response
     */
    public function serve(Request $request, string $path): Response
    {
        // Decode the path if it's encoded
        $path = urldecode($path);

        // Security: Prevent directory traversal
        $path = str_replace('..', '', $path);
        $path = ltrim($path, '/');

        // Check if file exists in public disk
        if (!Storage::disk('public')->exists($path)) {
            // Try alternative locations for old files
            // Some old files might be stored differently
            abort(404, 'Image not found: ' . $path);
        }

        try {
            // Get file contents
            $file = Storage::disk('public')->get($path);
            $type = Storage::disk('public')->mimeType($path);

            // If mime type detection fails, try to detect from extension
            if (!$type) {
                $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $type = match($extension) {
                    'jpg', 'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp',
                    'svg' => 'image/svg+xml',
                    default => 'application/octet-stream',
                };
            }

            // Return image with appropriate headers
            return response($file, 200)
                ->header('Content-Type', $type)
                ->header('Cache-Control', 'public, max-age=31536000') // Cache for 1 year
                ->header('X-Content-Type-Options', 'nosniff');
        } catch (\Exception $e) {
            abort(404, 'Image could not be loaded');
        }
    }
}

