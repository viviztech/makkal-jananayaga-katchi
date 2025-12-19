<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbody extends Model
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
}