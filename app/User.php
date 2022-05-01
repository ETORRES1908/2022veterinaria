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

    protected $guarded = [];

    protected $fillable = [
        'name', 'usert',
        'nombre', 'apellido', 'foto',
        'discapacidad', 'dni',
        'galpon', 'prepa',
        'email', 'company', 'celular',
        'country', 'state', 'district',
        'password',
        'direction', 'job',
        'answer', 'status', 'fdpt', 'sdpt'
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // UN USUARIO MANY MASCOTAS
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
