<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' ? $this->name_en : $this->name_ta;
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function perurs()
    {
        return $this->hasMany(Perur::class);
    }

    public function paguthis()
    {
        return $this->hasMany(Paguthi::class);
    }

    public function vattams()
    {
        return $this->hasMany(Vattam::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}