<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mfotos extends Model
{
    protected $guarded = [];

    // A MFotos BELONGS_TO MASCOTA
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
