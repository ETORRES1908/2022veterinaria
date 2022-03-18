<?php

namespace App\Http\Controllers\Auth;

use App\Coliseos;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\ImageManagerStatic as Image;

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
    protected $redirectTo = '/login';

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
            'usert' => 'required|string',
            'nombre' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellido' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'foto' => 'required|image|max:2048',
            'discapacidad' => 'required|string',
            'dni' => 'required|numeric|digits:8|unique:users',
            'galpon' => 'required|string',
            'prepa' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'company' => 'required|string',
            'celular' => 'required|unique:users|digits:9',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'direction' => 'required|string',
            'job' => 'required|string',
            'password' => 'required|string|confirmed',
            'answer' => 'required|string',
            'captcha' => 'required|captcha',
            'foto' => 'required',
            'fdpt' => 'mimes:pdf',
            'sdpt' => 'image'
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

        //FOTO PROFILE
        $pph = $data['foto'];
        $nombre = $data['dni'] . "profile." . $pph->guessExtension();
        $ruta = 'storage/images/users/' . $nombre;
        Image::make($pph->getRealPath())->resize(1280, 720, function ($constraint) {
            $constraint->aspectRatio();
        })->save($ruta, 40, 'jpeg');
        //FOTO DISABILITY 1
        $rutaf = null;
        if (isset($data['fdpt'])) {
            $fdpt = $data['fdpt'];
            $fn = $data['dni'] . "fdpt." . $fdpt->guessExtension();
            $rutaf = 'storage/docs/users/' . $fn;
            copy($fdpt, $rutaf);
        }
        //FOTO DISABILITY 2
        $rutas = null;
        if (isset($data['sdpt'])) {
            $sdpt = $data['sdpt'];
            $ss = $data['dni'] . "sdpt." . $sdpt->guessExtension();
            $rutas = 'storage/images/users/' . $ss;
            Image::make($sdpt->getRealPath())->resize(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->save($rutas, 40, 'jpeg');
        }

        $user = User::create([
            'name' => $data['name'],
            'usert' => $data['usert'],
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
            'answer' => $data['answer'],
            'fdpt' =>  $rutaf,
            'sdpt' =>  $rutas
        ])->assignRole($data['usert']);

        Coliseos::create([
            'user_id' => $user->id,
            'nombre' => $data['clsname'],
            'country' => $data['country'],
            'state' => $data['state'],
            'district' => $data['district'],
            'reference' => $data['direction'],
        ]);
        return $user;
    }
}
