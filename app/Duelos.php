<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duelos extends Model
{
    protected $guarded = [];
    protected $fillable = ['lparticipante_id', 'pmascota_id', 'fcc', 'smascota_id', 'scc', 'cch', 'npelea', 'result', 'trslt', 'dm', 'ds', 'pactada'];

    // A DUELOS BELONGS_TO LParticipantes
    public function lparticipante()
    {
        return $this->belongsTo(LParticipantes::class, 'lparticipante_id');
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
