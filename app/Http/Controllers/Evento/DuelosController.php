<?php

namespace App\Http\Controllers\Evento;

use App\Duelos;
use App\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lparticipantes;
use Illuminate\Validation\Rule;

class DuelosController extends Controller
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
        /*  return $request->all(); */
        $pmascota_id = $request->pmascota_id;
        $smascota_id = $request->smascota_id;
        $this->validate($request, [
            'lparticipante_id' => 'required',
            'pmascota_id' => 'required|different:smascota_id',
            'smascota_id' => 'required|different:pmascota_id',
            'fcc' => 'required|different:scc',
            'scc' => 'required|different:fcc',
            'cch' => 'required',
            'npelea' => 'required',
        ]);

        Duelos::create([
            'lparticipante_id' => $request->lparticipante_id,
            'pmascota_id' => $request->pmascota_id,
            'fcc' => $request->fcc,
            'smascota_id' => $request->smascota_id,
            'scc' => $request->scc,
            'cch' => $request->cch,
            'npelea' => $request->npelea,
        ]);
        return redirect()->route('Duels.show', $request->lparticipante_id)->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);
        
        $evento = Eventos::find($id);
        if (Lparticipantes::where('evento_id', $id)->first()) {
            $lparticipante = Lparticipantes::where('evento_id', $id)->first()->id;
            $participantes = Lparticipantes::where('evento_id', $id)->get();
            $duelos = Duelos::where('lparticipante_id', $lparticipante)->get();
            return view('Events.Duels.index', compact('lparticipante', 'participantes', 'duelos', 'evento'));
        } else {
            return redirect()->route('Events.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
