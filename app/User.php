<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable;

    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nombre', 'apellido',
        'discapacidad', 'dni',
        'galpon', 'prepa',
        'email', 'company', 'celular',
        'country', 'state', 'district',
        'password',
        'direction', 'job',
        'question', 'answer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
