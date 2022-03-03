<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lparticipantes extends Model
{
    protected $fillable = ['evento_id', 'mascota_id'];

    // A LPARTICIPANTES BELONGS_TO EVENTO
    public function evento()
    {
        return $this->belongsTo(Eventos::class);
    }
    // A LPARTICIPANTES BELONGS_TO MASCOTA
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
    // A LPARTICIPANTES BELONGS_TO EVENTO
    public function duelos()
    {
        return $this->hasMany(Duelos::class,'lparticipante_id');
    }
}
