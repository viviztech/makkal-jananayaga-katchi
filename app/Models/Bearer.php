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

    public function district()
    {
        return $this->hasOneThrough(
            \App\Models\District::class,
            \App\Models\Assembly::class,
            'id', // Foreign key on assemblies table
            'id', // Foreign key on districts table
            'assembly_id', // Local key on bearers table
            'district_id' // Local key on assemblies table
        );
    }
}
