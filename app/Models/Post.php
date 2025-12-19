<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function postingstage()
    {
        return $this->belongsTo(Postingstage::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function bearers()
    {
        return $this->hasMany(Bearer::class);
    }
}