<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\HasImageUrl;
use App\Models\Traits\HasYouTubeVideo;
use League\CommonMark\CommonMarkConverter;

class Media extends Model
{
    use HasImageUrl, HasYouTubeVideo;

    protected $fillable = [
        'category_id',
        'title_ta',
        'title_en',
        'slug',
        'content_ta',
        'content_en',
        'featured_image',
        'event_date',
        'more_photos',
        'video_link',
    ];

    protected $casts = [
        'more_photos' => 'array',
        'event_date' => 'date',
    ];

    protected $appends = [
        'featured_image_url',
        'video_embed_url',
        'video_thumbnail_url',
    ];

    /**
     * Get the full URL for the featured image
     *
     * @return string|null
     */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        if (empty($this->featured_image)) {
            return asset('images/placeholder.jpg');
        }
        return $this->getStorageUrl($this->featured_image, 'public');
    }

    /**
     * Get URLs for more photos array
     *
     * @return array
     */
    public function getMorePhotosUrlsAttribute(): array
    {
        if (empty($this->more_photos) || !is_array($this->more_photos)) {
            return [];
        }

        return array_map(function ($photo) {
            return $this->getStorageUrl($photo, 'public');
        }, array_filter($this->more_photos));
    }

    /**
     * Get URL for a single photo path (helper method for views)
     *
     * @param string|null $path
     * @return string|null
     */
    public function getPhotoUrl(?string $path): ?string
    {
        return $this->getStorageUrl($path, 'public');
    }

    /**
     * Get YouTube embed URL with proper configuration
     *
     * @return string|null
     */
    public function getVideoEmbedUrlAttribute(): ?string
    {
        return $this->getYouTubeEmbedUrl($this->video_link);
    }

    /**
     * Get YouTube video ID
     *
     * @return string|null
     */
    public function getVideoIdAttribute(): ?string
    {
        return $this->getYouTubeVideoId($this->video_link);
    }

    /**
     * Get YouTube thumbnail URL
     *
     * @return string|null
     */
    public function getVideoThumbnailUrlAttribute(): ?string
    {
        return $this->getYouTubeThumbnailUrl($this->video_link);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Convert markdown content to HTML
     *
     * @param string|null $markdown
     * @return string
     */
    protected function parseMarkdown(?string $markdown): string
    {
        if (empty($markdown)) {
            return '';
        }

        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        return $converter->convert($markdown)->getContent();
    }

    /**
     * Get parsed markdown content in Tamil
     *
     * @return string
     */
    public function getContentTaHtmlAttribute(): string
    {
        return $this->parseMarkdown($this->content_ta);
    }

    /**
     * Get parsed markdown content in English
     *
     * @return string
     */
    public function getContentEnHtmlAttribute(): string
    {
        return $this->parseMarkdown($this->content_en);
    }

    /**
     * Get parsed markdown content based on current locale
     *
     * @return string
     */
    public function getContentHtmlAttribute(): string
    {
        $content = app()->getLocale() === 'ta' ? $this->content_ta : $this->content_en;
        return $this->parseMarkdown($content);
    }
}
