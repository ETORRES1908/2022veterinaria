<?php

namespace App\Http\Controllers\Usuario;

use App\Duelos;
use App\Mascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lparticipantes;
use App\MFotos;
use App\User;
use Illuminate\Support\Facades\Auth;

class MascotasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $mascotas = Mascota::where('user_id', '=', $user->id)->get();
        return view('Usuario.Mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usuario.Mascotas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foto' => 'required|image|max:2048',
        ]);

        $nmascota = Mascota::Create([
            'user_id' => $request->user_id,
            'fnac' => $request->fnac,
            'sss' => $request->sss,
            'nombre' => $request->nombre,
            'plc' => $request->plc,
            'plu' => $request->plu,
            'pad' => $request->pad,
            'mad' => $request->mad,
            'des' => $request->des,
            'obs' => $request->obs,
        ]);

        $user = User::Find($request->user_id);
        $REGGAL =
            substr($user->country, 0, 2) .
            substr($user->state, 0, 2) .
            '000' .
            $user->id .
            '0' .
            $nmascota->id;

        $nmascota->update(['REGGAL' => $REGGAL]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nombre = $REGGAL . '1.' . $file->guessExtension();
            $ruta = 'images/mascotas/' . $nombre;
            copy($file, $ruta);
            $nmfotos = MFotos::Create([
                'nfoto' => 1,
                'ruta' => $ruta,
                'texto' => $nmascota->nombre,
                'mascota_id' => $nmascota->id,
            ]);

            return redirect()
                ->route('mascotas.show', $nmascota->id)
                ->with('mensaje', 'ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        $duelos = Duelos::orWhere(['pmascota_id' => $id, 'smascota_id' => $id])->paginate(10);
        return view('Usuario.Mascotas.show', compact('mascota', 'duelos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        //
    }
}
