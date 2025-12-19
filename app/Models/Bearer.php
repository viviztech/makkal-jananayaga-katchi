<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasImageUrl;

class Bearer extends Model
{
    use HasImageUrl;

    protected $fillable = [
        'post_id',
        'assembly_id',
        'name_ta',
        'name_en',
        'content_ta',
        'content_en',
        'slug',
        'photo',
        'facebook',
        'x',
        'instagram',
        'youtube',
    ];

    protected $appends = [
        'photo_url',
    ];

    /**
     * Get the photo URL attribute
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->photo)) {
            return asset('images/placeholder.jpg');
        }
        return $this->getStorageUrl($this->photo, 'public');
    }

    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class);
    }

    public function assembly()
    {
        return $this->belongsTo(\App\Models\Assembly::class);
    }
}
