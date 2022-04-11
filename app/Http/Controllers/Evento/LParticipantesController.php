<?php

namespace App\Http\Controllers\Evento;

use App\LParticipantes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mascota;
use App\MFotos;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

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
        $mascota = Mascota::find($request->mascota_id); //MASCOTA
        $evento_id = $request->evento_id;
        $mascota_id = $request->mascota_id;
        $this->validate($request, [
            'evento_id' => 'required',
            'mascota_id' => ['required', Rule::unique('lparticipantes')->where(function ($query) use ($mascota_id, $evento_id) {
                return $query->where('mascota_id', $mascota_id)
                    ->where('evento_id', $evento_id);
            }),],
        ]);
        LParticipantes::create(['evento_id' => $request->evento_id, 'boxn' => $request->boxn, 'boxx' => $request->boxx, 'mascota_id' => $mascota->id, 'status' => '0']);
        return redirect()->route('events.show', $request->evento_id)->with('mensaje', __('Successfully joined'));
    }

    public function show($id)
    {
        $mascota = Mascota::find($id);
        return response()->json(array('success' => true, 'mascota' => $mascota));
    }

    public function edit(LParticipantes $LParticipantes)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $mascota = Mascota::find($request->mascota_id); //MASCOTA

        $this->validate($request, [
            'mascota_id' => 'required',
            'foto' => 'image',
            'peso' => 'integer|required',
            'seal' => '',
        ]);

        //NAME PHOTO
        if ($request->file('foto')) {
            if (!empty($mascota->fotos->where('nfoto', 1)->last()->id)) {
                $mfoto = MFotos::Find($mascota->fotos->where('nfoto', 1)->first()->id);
                unlink($mfoto->ruta);
                $mfoto->delete(); // ELIMINAR FOTO
            }

            $file = $request->file('foto');
            $nombre =
                $mascota->REGANI .
                1 .
                '.' .
                $file->guessExtension();
            $ruta = 'storage/images/mascotas/' . $nombre; //RUTA
            Image::make($file->getRealPath())->resize(1280, 720, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($ruta, 72, 'jpeg'); //COPIAR EN LA RUTA
            $nMFotos = MFotos::Create([
                'nfoto' => '1',
                'ruta' => $ruta,
                'texto' => 'Perfil',
                'mascota_id' => $request->mascota_id,
            ]); //CREAR PHOTO
        }
        $mascota->update(['sss' => $request->peso]); // UPDATE
        LParticipantes::where('evento_id', $request->evento_id)->where('mascota_id', $mascota->id)->first()->update(['sss' => $request->peso, 'seal' => $request->seal, 'status' => "1"]);
        return redirect()->route('events.show', $request->evento_id)->with('mensaje', __('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LParticipantes  $LParticipantes
     * @return \Illuminate\Http\Response
     */
    public function destroy(LParticipantes $LParticipantes)
    {
        //
    }
}
