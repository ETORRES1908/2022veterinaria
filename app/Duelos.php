<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duelos extends Model
{
    protected $guarded = [];

    // A DUELOS BELONGS_TO LParticipantes
    public function lparticipante()
    {
        return $this->belongsTo(LParticipantes::class, 'lparticipante_id');
    }

    // A DUELOS BELONGS_TO LParticipantes
    public function evento()
    {
        return $this->belongsTo(Eventos::class);
    }

    // A MASCOTA BELONGS_TO DUEL.PMASTOA_ID
    public function pmascota()
    {
        return $this->belongsTo(Mascota::class, 'pmascota_id');
    }
    // A MASCOTA BELONGS_TO DUEL.SMASTOA_ID
    public function smascota()
    {
        return $this->belongsTo(Mascota::class, 'smascota_id');
    }
}
