@props([
    'videoUrl' => null,
    'videoId' => null,
    'embedUrl' => null,
    'title' => '',
    'autoplay' => false,
    'class' => 'w-full',
    'style' => 'aspect-ratio: 16/9; min-height: 400px;',
])

@php
    // Determine the embed URL
    $finalEmbedUrl = null;
    
    if ($embedUrl) {
        $finalEmbedUrl = $embedUrl;
    } elseif ($videoId) {
        // Use the Media model's trait method if available
        $media = new \App\Models\Media();
        $finalEmbedUrl = $media->getYouTubeEmbedUrl($videoId, ['autoplay' => $autoplay ? '1' : '0']);
    } elseif ($videoUrl) {
        $media = new \App\Models\Media();
        $finalEmbedUrl = $media->getYouTubeEmbedUrl($videoUrl, ['autoplay' => $autoplay ? '1' : '0']);
    }
@endphp

@if($finalEmbedUrl)
    <iframe
        src="{!! $finalEmbedUrl !!}"
        class="{{ $class }}"
        style="{{ $style }}"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
        referrerpolicy="strict-origin-when-cross-origin"
        title="{{ $title }}"
        loading="lazy"
    ></iframe>
@else
    <div class="w-full bg-gray-200 rounded-lg flex items-center justify-center" style="aspect-ratio: 16/9; min-height: 400px;">
        <div class="text-center text-gray-500">
            <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
            </svg>
            <p class="text-sm">Invalid video URL</p>
        </div>
    </div>
@endif

