<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duelos extends Model
{
    protected $guarded = [];
    protected $fillable = ['lparticipante_id', 'pmascota_id', 'smascota_id', 'npelea'];

    // A DUELOS BELONGS_TO LPARTICIPANTES
    public function lparticiante()
    {
        return $this->hasMany(Lparticipantes::class);
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
