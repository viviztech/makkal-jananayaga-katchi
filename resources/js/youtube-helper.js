/**
 * YouTube Embed URL Helper
 * Generates properly configured YouTube embed URLs to prevent Error 153
 */

/**
 * Get clean origin for YouTube embeds (removes port if present)
 * @returns {string} Clean origin URL
 */
function getYouTubeOrigin() {
    const origin = window.location.origin;
    
    // Remove port number if present (YouTube doesn't need it and it can cause issues)
    // Only remove if it's not a standard port (80 for http, 443 for https)
    const url = new URL(origin);
    const isStandardPort = (url.protocol === 'https:' && url.port === '443') || 
                          (url.protocol === 'http:' && url.port === '80') ||
                          !url.port;
    
    if (isStandardPort) {
        return `${url.protocol}//${url.hostname}`;
    }
    
    return origin;
}

/**
 * Build a YouTube embed URL with all required parameters
 * @param {string} videoId - YouTube video ID
 * @param {Object} options - Additional options
 * @returns {string} Complete embed URL
 */
function buildYouTubeEmbedUrl(videoId, options = {}) {
    if (!videoId) {
        return null;
    }

    const origin = getYouTubeOrigin();
    
    // Default parameters to prevent Error 153
    const params = {
        rel: '0',
        modestbranding: '1',
        enablejsapi: '1',
        origin: origin,
        widget_referrer: origin,
        ...options // Override with provided options
    };

    // Build query string
    const queryString = Object.keys(params)
        .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`)
        .join('&');

    return `https://www.youtube.com/embed/${videoId}?${queryString}`;
}

// Make it available globally
if (typeof window !== 'undefined') {
    window.buildYouTubeEmbedUrl = buildYouTubeEmbedUrl;
    window.getYouTubeOrigin = getYouTubeOrigin;
}

