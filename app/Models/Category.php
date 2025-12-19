<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    /**
     * Get the name attribute based on current locale
     */
    public function getNameAttribute()
    {
        return app()->getLocale() == 'ta' ? $this->name_ta : $this->name_en;
    }
}
