<?php

namespace App\Http\Controllers\Administrador;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManagerStatic as Image;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:cms')->only('index', 'show');
        $this->middleware('can:chngs')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('usert', '!=', 'admin')->where('usert', '!=', 'webmaster')->get();
        return  view('Administrador.MUsuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return  view('Administrador.MUsuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return  view('Administrador.MUsuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->typec == 0) {
            $user->update(['status' => $request->status]);
        } elseif ($request->typec == 1) {
            $user->update(['name' => $request->name, 'password' => bcrypt($request->password)]);
        } elseif ($request->typec == 2) {

            $rutaf = $user->fdpt;
            if (isset($request->fdpt)) {
                if ($user->fdpt != null) {
                    unlink($user->fdpt);
                }
                $fdpt = $request->fdpt;
                return var_dump($request->all());
                $fn = $request->dni . "fdpt." . $fdpt->guessExtension();
                $rutaf = 'storage/docs/users/' . $fn;
                copy($fdpt, $rutaf);
            }

            $rutas = $user->spdt;
            if (isset($request->sdpt)) {
                if ($user->sdpt != null) {
                    unlink($user->spdt);
                }
                return dd($request->file('sdpt'));
                $sdpt = $request->file('sdpt');
                $ss = $request->dni . "sdpt.jpg";
                $rutas = 'storage/images/users/' . $ss;
                Image::make($sdpt->getRealPath())->resize(1280, 720, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($rutas, 72, 'jpg');
            }


            $user->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'discapacidad' => $request->discapacidad,
                'dni' => $request->dni,
                'fdpt' =>  $rutaf,
                'sdpt' =>  $rutas
            ]);
        }
        return redirect()->route('usuarios.edit', $id)->with('mensaje', __('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('mensaje', __('Successfully deleted'));
    }
}
