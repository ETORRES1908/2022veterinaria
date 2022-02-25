<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mvideos extends Model
{
    protected $guarded = [];

    // A MVideos BELONGS_TO MASCOTA
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
