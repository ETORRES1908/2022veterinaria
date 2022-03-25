<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lparticipantes extends Model
{
    protected $guarded = [];

    // A LParticipantes BELONGS_TO EVENTO
    public function evento()
    {
        return $this->belongsTo(Eventos::class);
    }
    // A LParticipantes BELONGS_TO MASCOTA
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
