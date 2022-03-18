<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coliseos extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'nombre', 'country', 'state', 'district', 'reference'
    ];
}
