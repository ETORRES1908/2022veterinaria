<?php

namespace App\Http\Controllers\Evento;

use App\Banners;
use App\Coliseos;
use App\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LParticipantes;
use App\User;
use Spatie\Permission\Models\Role;

class EventoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:addevent')->only('create', 'store', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Eventos::where('status', '1')->get();
        return view('Events.index', compact('eventos'));
    }

    public function create()
    {
        $cdks = User::where('usert', 'cdk')->get();
        $jdgs = User::where('usert', 'jdg')->get();
        $assts = User::where('usert', 'asst')->get();
        $coliseos = Coliseos::all();
        $banners = Banners::where('type', 'bcreate')->get();
        return view('Events.create', compact('cdks', 'jdgs', 'assts', 'coliseos', 'banners'));
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
            'organizador_id' => 'required',
            'fechas' => 'required',
            'fechas.*' => 'required|distinct',
            'coliseo_id' => 'required',
            'tevent' => 'required',
            'trl' => 'required',
            'spl' => 'required',
            'spl.*' => 'required|distinct',
            'sz' => 'required',
            'time' => 'required',
            'miw' => 'required',
            'maw' => 'required|after_or_equal:miw',
            'ftw' => 'required',
            'stw' => 'required',
            'hstart' => 'required',
            'mcontrol_id' => 'required',
            'judge_id' => 'required',
            'assistent_id' => '',
            'awards' => 'required',
            'trophys' => '',
            'rooster' => 'required',
            'trooster' => 'required',
            'rten' => '',
            'fft' => '',
            'sft' => '',
            'tft' => '',
            'fcd' => '',
            'pvs' => '',
            'lch' => '',
            'cnt' => '',
            'skg' => '',
            'egn' => 'required',
            'evp' => '',
            'pct' => 'required',
            'bs' => '',
            'ift' => '',
            'gll' => '',
            'glp' => '',
        ]);
        $nevento = Eventos::create($request->all());
        return redirect()->route('events.index')->with('mensaje', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($evento_id)
    {
        $listps = LParticipantes::where('evento_id', '=', $evento_id)->get();
        $evento = Eventos::find($evento_id);
        return view('Events.show', compact('listps', 'evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventos $eventos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventos $eventos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventos $eventos)
    {
        //
    }
}
