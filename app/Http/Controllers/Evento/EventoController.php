<?php

namespace App\Http\Controllers\Evento;

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
        $eventos = Eventos::all();
        return view('events.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judges = Role::find(1)->users;
        return view('events.create', compact('judges'));
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
            'jueza_id' => 'required',
            'juezb_id' => 'required',
            'coliseum' => 'required',
            'title' => 'required',
            'tevent' => 'required',
            'trule' => 'required',
            'fstart' => 'required',
            'fend' => 'required|after_or_equal:fstart',
            'hstart' => 'required|',
            'hend' => 'required|after:hstart',
            'rooster' => 'required',
            'trophy' => 'required',
            'trule' => 'required',
            'trule' => 'required',
            'trule' => 'required',
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
        $listps = Lparticipantes::where('evento_id', '=', $evento_id)->get();
        $evento = Eventos::find($evento_id);
        return view('events.show', compact('listps','evento'));
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
