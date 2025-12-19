<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Traits\HasImageUrl;

class Book extends Model
{
    use HasImageUrl;

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
        'slug',
        'is_active',
        'sort_order',
        'price',
        'stock',
        'is_available',
        'ebook_file_path',
        'is_ebook',
        'is_ebook_available',
        'ebook_format',
        'has_text_content'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_available' => 'boolean',
        'is_ebook' => 'boolean',
        'is_ebook_available' => 'boolean',
        'has_text_content' => 'boolean',
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    protected $appends = [
        'cover_image_url',
        'ebook_file_url',
    ];

    /**
     * Get the cover image URL attribute
     *
     * @return string|null
     */
    public function getCoverImageUrlAttribute(): ?string
    {
        if (empty($this->cover_image)) {
            return asset('images/placeholder.jpg');
        }
        return $this->getStorageUrl($this->cover_image, 'public');
    }

    /**
     * Get the e-book file URL attribute
     *
     * @return string|null
     */
    public function getEbookFileUrlAttribute(): ?string
    {
        if (empty($this->ebook_file_path)) {
            return null;
        }
        return $this->getStorageUrl($this->ebook_file_path, 'public');
    }

    /**
     * Check if book is available as e-book
     *
     * @return bool
     */
    public function isEbookAvailable(): bool
    {
        return $this->is_ebook && $this->is_ebook_available && !empty($this->ebook_file_path);
    }

    /**
     * Check if e-book supports text-to-speech
     *
     * @return bool
     */
    public function supportsTTS(): bool
    {
        return $this->isEbookAvailable() && $this->has_text_content && $this->ebook_format === 'pdf';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($book) {
            if (empty($book->slug)) {
                $book->slug = Str::slug($book->title);
            }
        });

        static::updating(function ($book) {
            if ($book->isDirty('title') && empty($book->slug)) {
                $book->slug = Str::slug($book->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


    public function orders()
    {
        return $this->hasMany(BookOrder::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)
                     ->where('is_active', true)
                     ->where('stock', '>', 0);
    }
}
