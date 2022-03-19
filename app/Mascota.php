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
    // A MASCOTA BELONGS_TO LParticipantes
    public function lparticipante()
    {
        return $this->hasMany(LParticipantes::class);
    }

    // UN MASCOTAS MANY VACUNAS
    public function vacunas()
    {
        return $this->hasMany(Vacunas::class);
    }

    // UN MASCOTAS MANY MOVIDAS
    public function movidas()
    {
        return $this->hasMany(Movidas::class);
    }

    // UN MASCOTAS MANY SUPLEMENTOS
    public function suplementos()
    {
        return $this->hasMany(Suplementos::class);
    }
}
