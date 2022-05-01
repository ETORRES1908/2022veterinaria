<?php

namespace App\Http\Controllers\Usuario;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:profile');
    }

    public function index()
    {
        return view('profile');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::Find($id);
        $this->validate($request, [
            'celular' => 'unique:users,celular,' . $user->id
        ]);

        if ($request->type == "a") { //USUARIO - CLAVE
            $user->update(['password' => bcrypt($request->password)]);
            return redirect()->route('profile.index')->with('mensaje', __('Successfully updated'));
        } elseif ($request->type == "b") { //OTROS DATOS
            $user->update(['company' => $request->company]);
            $user->update(['celular' => $request->celular]);
            $user->update(['galpon' => $request->galpon, 'prepa' => $request->prepa]);
            $user->update(['district' => $request->district, 'direction' => $request->direction, 'job' => $request->job]);
            return redirect()->route('profile.index')->with('mensaje', __('Successfully updated'));
        }
    }

    public function destroy($id)
    {
        //
    }
}
