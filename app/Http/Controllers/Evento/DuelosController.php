<?php

namespace App\Http\Controllers\Evento;

use App\Duelos;
use App\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LParticipantes;
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
        $this->middleware('can:adddeal')->only('create', 'store' . 'edit' . 'update' . 'delete');
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

        return redirect()->route('duels.show', $request->evento_id)->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Eventos::find($id);
        if (LParticipantes::where('evento_id', $id)->first()) {
            $lparticipante = LParticipantes::where('evento_id', $id)->first()->id;
            $participantes = LParticipantes::where('evento_id', $id)->where(['status' => '1'])->get();
            $duelos = Duelos::where('lparticipante_id', $lparticipante)->get();
            return view('Events.Duels.index', compact('lparticipante', 'participantes', 'duelos', 'evento'));
        } else {
            return redirect()->route('events.index');
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
        $duel = Duelos::find($id);
        $duel->update(['result' => $request->result, 'trslt' => $request->trslt, 'dm' => $request->dm, 'ds' => $request->ds]);
        $evento_id = $duel->lparticipante->evento_id;
        return redirect()->route('duels.show', $evento_id)->with('mensaje', __('Successfully updated'));
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
