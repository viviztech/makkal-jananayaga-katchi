<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'en' ? $this->name_en : $this->name_ta;
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function assemblies()
    {
        return $this->hasMany(Assembly::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function bearers()
    {
        return $this->hasManyThrough(
            Bearer::class,
            Assembly::class,
            'district_id', // Foreign key on assemblies table
            'assembly_id', // Foreign key on bearers table
            'id', // Local key on districts table
            'id' // Local key on assemblies table
        );
    }
}