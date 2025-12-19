<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasImageUrl;

class Application extends Model
{
    use HasFactory, HasImageUrl;
    protected $guarded = [];

    protected $appends = [
        'photo_url',
        'document_url',
    ];

    protected $casts = [
        'payment_completed_at' => 'datetime',
        'application_fee' => 'decimal:2',
    ];

    /**
     * Get the photo URL attribute
     *
     * @return string|null
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (empty($this->photo)) {
            return null;
        }
        return $this->getStorageUrl($this->photo, 'public');
    }

    /**
     * Get the document URL attribute
     *
     * @return string|null
     */
    public function getDocumentUrlAttribute(): ?string
    {
        if (empty($this->document)) {
            return null;
        }
        return $this->getStorageUrl($this->document, 'public');
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function assembly()
    {
        return $this->belongsTo(Assembly::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function perur()
    {
        return $this->belongsTo(Perur::class);
    }

    public function paguthi()
    {
        return $this->belongsTo(Paguthi::class);
    }

    public function vattam()
    {
        return $this->belongsTo(Vattam::class);
    }

    public function postingstage()
    {
        return $this->belongsTo(Postingstage::class);
    }

    public function subbody()
    {
        return $this->belongsTo(Subbody::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
}