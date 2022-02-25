<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $guarded = [];

    // A MASCOTA BELONGS_TO USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // A MASCOTA HAS_MANY FOTOS
    public function fotos()
    {
        return $this->hasMany(MFotos::class);
    }
    // A MASCOTA HAS_MANY VIDEOS
    public function videos()
    {
        return $this->hasMany(MVideos::class);
    }
}
