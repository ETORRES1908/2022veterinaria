<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $guarded = [];

    // A MASCOTA BELONGS_TO USER
    public function organizador()
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function juezA()
    {
        return $this->belongsTo(User::class, 'jueza_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function juezB()
    {
        return $this->belongsTo(User::class, 'juezb_id');
    }
    // A MASCOTA BELONGS_TO USER
    public function participants()
    {
        return $this->hasMany(Lparticipantes::class, 'evento_id');
    }
}
