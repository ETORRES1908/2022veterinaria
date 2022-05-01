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
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|between:3,20|unique:users',
            'usert' => 'required|string',
            'nombre' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellido' => 'required|string|between:3,20|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'foto' => 'required|image|max:2048',
            'discapacidad' => 'required|string',
            'dni' => 'required|numeric|unique:users',
            'galpon' => '',
            'prepa' => '',
            'email' => 'required|string|email|max:255|unique:users',
            'company' => '',
            'celular' => 'required|unique:users|digits:9',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => '',
            'direction' => '',
            'job' => '',
            'password' => 'required|string|confirmed',
            'answer' => 'required|string',
            'captcha' => 'required|captcha',
            'foto' => 'image',
            'fdpt' => 'mimes:pdf',
            'sdpt' => 'image'
        ]);
    }

    protected function create(array $data)
    {

        //FOTO PROFILE
        $ruta = 'user.png';
        if (isset($data['foto'])) {
            $pph = $data['foto'];
            $nombre = $data['dni'] . "profile.jpg";

            $ruta = 'storage/images/users/' . $nombre;
            Image::make($pph->getRealPath())->resize(400, 400)->save($ruta, 72, 'jpg');
        }
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
            $ss = $data['dni'] . "sdpt.jpg";
            $rutas = 'storage/images/users/' . $ss;
            Image::make($sdpt->getRealPath())->resize(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
            })->save($rutas, 72, 'jpg');
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
            'status' => '1', // ESTADO DE USUARIO 0 = PENDIENTE, 1 = ACTIVADO
            'fdpt' =>  $rutaf,
            'sdpt' =>  $rutas
        ])->assignRole($data['usert']);

        if ($data['clsname']) {
            Coliseos::create([
                'user_id' => $user->id,
                'nombre' => $data['clsname'],
                'country' => $data['country'],
                'state' => $data['state'],
                'district' => $data['district'],
                'reference' => $data['direction'],
            ]);
        }
        return $user;
    }
}
