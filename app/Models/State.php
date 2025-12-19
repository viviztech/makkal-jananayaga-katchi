<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' ? $this->name_en : $this->name_ta;
    }

    public function districts()
    {
        return $this->hasMany(District::class);
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