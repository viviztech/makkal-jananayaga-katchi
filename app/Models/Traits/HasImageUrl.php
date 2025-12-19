<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;

trait HasImageUrl
{
    /**
     * Get the full URL for a storage file
     * This ensures consistent URL generation across the application
     * Handles both old files (in root) and new files (in subdirectories)
     * Uses route-based serving to avoid 403 permission issues
     *
     * @param string|null $path
     * @param string $disk
     * @param string|null $default
     * @return string|null
     */
    protected function getStorageUrl(?string $path, string $disk = 'public', ?string $default = null): ?string
    {
        if (empty($path)) {
            return $default;
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');

        // Use URL helper to generate route URL (works even if route name changes)
        // This goes through Laravel's ImageController which handles permissions correctly
        // Works for both:
        // 1. Just filename (old uploads): "01K8WF4RF3RNM8V2FDD9BTQ06Z.jpg"
        // 2. With directory (new uploads): "media/featured/01K8WF4RF3RNM8V2FDD9BTQ06Z.jpg"
        // The route pattern matches /storage/{path} where path can be anything
        try {
            // Generate URL directly using the path pattern
            $url = url('/storage/' . $path);
            return $url;
        } catch (\Exception $e) {
            // Fallback to asset() if URL generation fails
            return asset('storage/' . $path);
        }
    }

    /**
     * Get the asset URL for a storage file (alternative method)
     * Use this when you want to use the storage symlink directly
     *
     * @param string|null $path
     * @param string|null $default
     * @return string|null
     */
    protected function getStorageAssetUrl(?string $path, ?string $default = null): ?string
    {
        if (empty($path)) {
            return $default;
        }

        // Remove leading slash if present
        $path = ltrim($path, '/');

        // Ensure path starts with 'storage/'
        if (substr($path, 0, 8) !== 'storage/') {
            $path = 'storage/' . $path;
        }

        return asset($path);
    }
}

