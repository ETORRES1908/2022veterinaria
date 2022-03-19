<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplementos extends Model
{
    protected $guarded = [];

    // A MASCOTA BELONGS_TO MASCOTA
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
