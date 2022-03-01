<?php

namespace App\Http\Controllers\Evento;

use App\Coliseos;
use App\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lparticipantes;
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);

        $eventos = Eventos::all();
        return view('Events.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);

        $users = Role::where('name', 'user')->first()->users;
        $coliseos = Coliseos::all();
        return view('Events.create', compact('users', 'coliseos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);
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
            'ctr' => 'required',
            'stt' => 'required',
            'drc' => 'required',
            'ftw' => 'required',
            'stw' => 'required',
            'hstart' => 'required',
            'mcontrol_id' => 'required',
            'judge_id' => 'required',
            'assistent_id' => 'required',
            'awards' => 'required',
            'trophys' => 'required',
            'rooster' => 'required',
            'trooster' => 'required',
            'rten' => 'required',
            'fft' => 'required',
            'sft' => 'required',
            'tft' => 'required',
            'fcd' => 'required',
            'pvs' => 'required',
            'lch' => 'required',
            'cnt' => 'required',
            'skg' => 'required',
            'egn' => 'required',
            'evp' => 'required',
            'pct' => 'required',
            'bs' => 'required',
            'ift' => 'required',
            'gll' => 'required',
            'glp' => 'required',
        ]);
        $nevento = Eventos::create($request->all());
        return redirect()->route('Events.index')->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($evento_id)
    {
        $currentLocale = session('locale');
        if ($currentLocale) app()->setLocale($currentLocale);

        $listps = Lparticipantes::where('evento_id', '=', $evento_id)->get();
        $evento = Eventos::find($evento_id);
        return view('events.show', compact('listps', 'evento'));
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
