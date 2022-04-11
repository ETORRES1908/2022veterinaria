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
        $this->middleware('can:adddeal')->only('create', 'store');
        $this->middleware('can:sentence')->only('update');
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
        /* return $request->all(); */
        $pmascota_id = $request->pmascota_id;
        $smascota_id = $request->smascota_id;
        $evento_id = $request->evento_id;

        $this->validate($request, [
            'evento_id' => 'required',
            'pmascota_id' =>  ['required', 'different:smascota_id', Rule::unique('duelos')->where(function ($query) use ($pmascota_id, $evento_id) {
                return $query->where('pmascota_id', $pmascota_id)
                    ->where('evento_id', $evento_id);
            }),],
            'smascota_id' =>  ['required', 'different:pmascota_id',  Rule::unique('duelos')->where(function ($query) use ($smascota_id, $evento_id) {
                return $query->where('smascota_id', $smascota_id)
                    ->where('evento_id', $evento_id);
            }),],
            'fcc' => 'required|different:scc',
            'scc' => 'required|different:fcc',
            'cch' => 'required',
            'npelea' => 'required',
        ]);

        Duelos::create([
            'evento_id' => $request->evento_id,
            'pmascota_id' => $request->pmascota_id,
            'fcc' => $request->fcc,
            'smascota_id' => $request->smascota_id,
            'scc' => $request->scc,
            'pactada' => $request->pactada,
            'box' => $request->box,
            'peleap' => $request->peleap,
            'cch' => $request->cch,
            'npelea' => $request->npelea,
            'result' => ''
        ]);

        $L1 = LParticipantes::where('evento_id', $request->evento_id)
            ->where('mascota_id', $request->pmascota_id)->first();
        $L1->update(['status' => 0]);

        $L2 = LParticipantes::where('evento_id', $request->evento_id)
            ->where('mascota_id', $request->smascota_id)->first();
        $L2->update(['status' => 0]);

        return redirect()->route('pactados.show', $request->evento_id)->with('mensaje', __('Agreed correctly'));
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
        if (!empty(LParticipantes::where('evento_id', $id)->get())) {
            $participantes = LParticipantes::where('evento_id', $id)->where(['status' => '1'])->get();
            $duelos = Duelos::where('evento_id', $id)->get();
            return view('Events.Duels.index', compact('evento', 'participantes', 'duelos'));
        } else {
            return redirect()->route('events.index');
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $duel = Duelos::find($id);

        $L1 = LParticipantes::where('evento_id', $duel->evento_id)
            ->where('mascota_id', $duel->pmascota->id)->first();
        $L1->update(['status' => 1]);

        $L2 = LParticipantes::where('evento_id', $duel->evento_id)
            ->where('mascota_id', $duel->smascota->id)->first();
        $L2->update(['status' => 1]);

        $duel->update(['result' => $request->result, 'dm' => $request->dm, 'ds' => $request->ds]);

        return redirect()->route('pactados.show', $duel->evento_id)->with('mensaje', __('Successfully sentenced'));
    }


    public function destroy($id)
    {
        $duelo = Duelos::find($id);

        if (!empty($duelo->result)) {
            return redirect()->route('pactados.show', $duelo->evento_id)->with('mensaje', __('Imposible desaccord'));
        } else {
            LParticipantes::where('evento_id', $duelo->evento_id)
                ->where('mascota_id', $duelo->pmascota_id)->first()->update(['status' => 1]);

            LParticipantes::where('evento_id', $duelo->evento_id)
                ->where('mascota_id', $duelo->smascota_id)->first()->update(['status' => 1]);
            $duelo->delete();
            return redirect()->route('pactados.show', $duelo->evento_id)->with('mensaje', __('Successfully desaccord'));
        }
    }
}
