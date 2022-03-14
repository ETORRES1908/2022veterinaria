<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $guarded = [];

    protected $casts = [
        'fechas' => 'array',
        'spl' => 'array',
    ];

    // A MASCOTA BELONGS_TO USER
    public function organizador()
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function mcontrol()
    {
        return $this->belongsTo(User::class, 'mcontrol_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function judge()
    {
        return $this->belongsTo(User::class, 'judge_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function assistent()
    {
        return $this->belongsTo(User::class, 'assistent_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function participants()
    {
        return $this->hasMany(LParticipantes::class, 'evento_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function coliseum()
    {
        return $this->belongsTo(Coliseos::class, 'coliseo_id');
    }
}
