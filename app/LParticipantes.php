<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lparticipantes extends Model
{
    protected $guarded = [];

    protected $fillable = ['evento_id', 'mascota_id', 'status'];

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
    // A LParticipantes BELONGS_TO EVENTO
    public function duelos()
    {
        return $this->hasMany(Duelos::class, 'lparticipante_id');
    }
}
