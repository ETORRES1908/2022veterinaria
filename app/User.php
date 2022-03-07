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
        'name', 'nombre', 'apellido', 'foto',
        'discapacidad', 'dni',
        'galpon', 'prepa',
        'email', 'company', 'celular',
        'country', 'state', 'district',
        'password',
        'direction', 'job',
        'question', 'answer', 'status', 'fdpt', 'sdpt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // UN USUARIO MANY MASCOTAS
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
