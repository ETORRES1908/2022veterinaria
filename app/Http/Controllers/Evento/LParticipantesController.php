<?php

namespace App\Http\Controllers\Evento;

use App\LParticipantes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mascota;
use App\Mfotos;
use Illuminate\Validation\Rule;

class LParticipantesController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LParticipants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento_id = $request->evento_id;
        $mascota_id = $request->mascota_id;
        $this->validate($request, [
            'evento_id' => 'required',
            'mascota_id' => ['required', Rule::unique('lparticipantes')->where(function ($query) use ($mascota_id, $evento_id) {
                return $query->where('mascota_id', $mascota_id)
                    ->where('evento_id', $evento_id);
            }),],
            'foto' => 'required|image',
            'peso' => 'required',
        ]);
        if ($request->hasFile('foto')) {
            $mascota = Mascota::find($request->mascota_id); //MASCOTA
            if (!empty($mascota->fotos->where('nfoto', 1)->first()->id)) {
                $mfoto = MFotos::Find($mascota->fotos->where('nfoto', 1)->first()->id);
                unlink($mfoto->ruta);
                $mfoto->delete(); // ELIMINAR FOTO
            }
            //NAME PHOTO
            $file = $request->file('foto');
            $nombre =
                $mascota->REGGAL .
                1 .
                '.' .
                $file->guessExtension();
            $ruta = 'images/mascotas/' . $nombre; //RUTA
            copy($file, $ruta); //COPIAR EN LA RUTA
            $nmfotos = Mfotos::Create([
                'nfoto' => '1',
                'ruta' => $ruta,
                'texto' => 'Perfil',
                'mascota_id' => $request->mascota_id,
            ]); //CREAR PHOTO
            $mascota->update(['sss' => $request->peso]); // UPDATE

            LParticipantes::create(['evento_id' => $request->evento_id, 'mascota_id' => $mascota->id]);

            $listps = Lparticipantes::where('evento_id',)->get();
            return redirect()->route('events.show', $request->evento_id)->with('mensaje', 'ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LParticipantes  $lParticipantes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        return response()->json(array('success' => true, 'mascota' => $mascota));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LParticipantes  $lParticipantes
     * @return \Illuminate\Http\Response
     */
    public function edit(LParticipantes $lParticipantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LParticipantes  $lParticipantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LParticipantes $lParticipantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LParticipantes  $lParticipantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(LParticipantes $lParticipantes)
    {
        //
    }
}
