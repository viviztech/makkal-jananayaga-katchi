<?php

namespace App\Models\Traits;

trait HasYouTubeVideo
{
    /**
     * Extract YouTube video ID from various URL formats
     *
     * @param string|null $url
     * @return string|null
     */
    protected function getYouTubeVideoId(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        $videoId = null;

        // Pattern to match various YouTube URL formats
        // Supports: youtube.com/watch?v=, youtu.be/, youtube.com/embed/, youtube.com/v/
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|v\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
            $videoId = $matches[1];
        } elseif (preg_match('/^[a-zA-Z0-9_-]{11}$/', trim($url))) {
            // If it's already just a video ID
            $videoId = trim($url);
        }

        // Validate video ID format (YouTube IDs are always 11 characters)
        if ($videoId && strlen($videoId) === 11 && preg_match('/^[a-zA-Z0-9_-]+$/', $videoId)) {
            return $videoId;
        }

        return null;
    }

    /**
     * Get YouTube embed URL with all required parameters
     * This fixes Error 153 by including proper configuration
     *
     * @param string|null $videoLink
     * @param array $options Additional parameters
     * @return string|null
     */
    public function getYouTubeEmbedUrl(?string $videoLink, array $options = []): ?string
    {
        $videoId = $this->getYouTubeVideoId($videoLink);
        
        if (!$videoId) {
            return null;
        }

        // Get the origin domain - prioritize current request to ensure exact match
        $origin = $this->getOriginForYouTube();
        
        $defaultParams = [
            'rel' => '0', // Don't show related videos
            'modestbranding' => '1', // Hide YouTube logo
            'enablejsapi' => '1', // Enable JavaScript API (important!)
            'origin' => $origin, // Set origin domain (must match actual domain)
            'widget_referrer' => $origin, // Set referrer (must match actual domain)
        ];

        // Merge with custom options (allow overriding origin if needed)
        $params = array_merge($defaultParams, $options);

        // Build query string
        $queryString = http_build_query($params);

        // Return complete embed URL
        return "https://www.youtube.com/embed/{$videoId}?" . $queryString;
    }

    /**
     * Get the origin domain for YouTube embeds
     * Ensures exact match with production domain to prevent Error 153
     *
     * @return string
     */
    protected function getOriginForYouTube(): string
    {
        $isProduction = config('app.env') === 'production';
        
        // Priority 1: Use current request origin (most reliable in production)
        if (request()->hasHeader('Host')) {
            $host = request()->getHost();
            
            // Remove port if present (YouTube doesn't need it)
            $host = preg_replace('/:\d+$/', '', $host);
            
            // In production, always use HTTPS
            // Check multiple ways to detect HTTPS
            $isSecure = false;
            if ($isProduction) {
                $isSecure = true; // Force HTTPS in production
            } else {
                $isSecure = request()->secure() 
                    || request()->server('HTTPS') === 'on' 
                    || request()->server('HTTPS') === '1'
                    || request()->server('HTTP_X_FORWARDED_PROTO') === 'https'
                    || request()->server('REQUEST_SCHEME') === 'https';
            }
            
            $scheme = $isSecure ? 'https' : 'http';
            $origin = $scheme . '://' . $host;
            
            // Validate it's a proper URL
            if (filter_var($origin, FILTER_VALIDATE_URL)) {
                return $origin;
            }
        }
        
        // Priority 2: Use APP_URL from config
        $appUrl = config('app.url', '');
        
        if (!empty($appUrl)) {
            // Ensure URL has protocol
            if (!preg_match('/^https?:\/\//', $appUrl)) {
                // In production, default to HTTPS
                $appUrl = ($isProduction ? 'https://' : 'http://') . $appUrl;
            } else {
                // In production, force HTTPS even if config says HTTP
                if ($isProduction && strpos($appUrl, 'http://') === 0) {
                    $appUrl = str_replace('http://', 'https://', $appUrl);
                }
            }
            
            // Parse and extract clean origin (scheme + host only, no path/port)
            $parsed = parse_url($appUrl);
            if ($parsed && isset($parsed['host'])) {
                $scheme = $parsed['scheme'] ?? ($isProduction ? 'https' : 'http');
                $host = $parsed['host'];
                
                // Remove port if present
                $host = preg_replace('/:\d+$/', '', $host);
                
                // Force HTTPS in production
                if ($isProduction) {
                    $scheme = 'https';
                }
                
                $origin = $scheme . '://' . $host;
                
                if (filter_var($origin, FILTER_VALIDATE_URL)) {
                    return $origin;
                }
            }
        }
        
        // Priority 3: Fallback to url() helper
        $fallbackUrl = url('/');
        $parsed = parse_url($fallbackUrl);
        if ($parsed && isset($parsed['host'])) {
            $scheme = $parsed['scheme'] ?? ($isProduction ? 'https' : 'http');
            $host = $parsed['host'];
            $host = preg_replace('/:\d+$/', '', $host);
            
            // Force HTTPS in production
            if ($isProduction) {
                $scheme = 'https';
            }
            
            return $scheme . '://' . $host;
        }
        
        // Last resort: return production domain with HTTPS
        return 'https://viduthalaichiruthaigalkatchi.com';
    }

    /**
     * Get YouTube thumbnail URL
     *
     * @param string|null $videoLink
     * @param string $quality Quality: default, mqdefault, hqdefault, sddefault, maxresdefault
     * @return string|null
     */
    protected function getYouTubeThumbnailUrl(?string $videoLink, string $quality = 'maxresdefault'): ?string
    {
        $videoId = $this->getYouTubeVideoId($videoLink);
        
        if (!$videoId) {
            return null;
        }

        $validQualities = ['default', 'mqdefault', 'hqdefault', 'sddefault', 'maxresdefault'];
        $quality = in_array($quality, $validQualities) ? $quality : 'maxresdefault';

        return "https://img.youtube.com/vi/{$videoId}/{$quality}.jpg";
    }

    /**
     * Validate if a string is a valid YouTube video URL or ID
     *
     * @param string|null $url
     * @return bool
     */
    protected function isValidYouTubeUrl(?string $url): bool
    {
        return $this->getYouTubeVideoId($url) !== null;
    }
}

