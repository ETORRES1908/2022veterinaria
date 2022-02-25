<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Mfotos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|between:3,20|unique:users',
            'nombre' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellido' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'foto' => 'required|image|max:2048',
            'discapacidad' => 'required|string',
            'dni' => 'required|numeric|digits:7|unique:users',
            'galpon' => 'required|string',
            'prepa' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'company' => 'required|string',
            'celular' => 'required|unique:users',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'direction' => 'required|string',
            'job' => 'required|string',
            'password' => 'required|string|confirmed',
            'question' => 'required|string',
            'answer' => 'required|string',
            'captcha' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $file = $data['foto'];
        $nombre = $data['name'] . $data['dni'] . "." . $file->guessExtension();
        $ruta = 'images/users/' . $nombre;
        copy($file, $ruta);

        return User::create([
            'name' => $data['name'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'foto' => $ruta,
            'discapacidad' => $data['discapacidad'],
            'dni' => $data['dni'],
            'galpon' => $data['galpon'],
            'prepa' => $data['prepa'],
            'email' => $data['email'],
            'company' => $data['company'],
            'celular' => $data['celular'],
            'country' => $data['country'],
            'state' => $data['state'],
            'district' => $data['district'],
            'direction' => $data['direction'],
            'job' => $data['job'],
            'password' => bcrypt($data['password']),
            'question' => $data['question'],
            'answer' => bcrypt($data['answer'])
        ])->assignRole('user');
    }
}
