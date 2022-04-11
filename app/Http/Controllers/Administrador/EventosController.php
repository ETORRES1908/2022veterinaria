<?php

namespace App\Http\Controllers\Administrador;

use App\Eventos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:cms')->only('index', 'show');
        $this->middleware('can:chngs')->only('edit', 'update');
    }

    public function index()
    {
        $eventos = Eventos::all();
        return view('Administrador.MEventos.index', compact('eventos'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Eventos::find($id);
        return view('Administrador.MEventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Eventos::find($id);
        return view('Administrador.MEventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $evento = Eventos::find($id);
        $evento->update(['status' => $request->status]);
        return redirect()->route('meventos.edit', $id)->with('mensaje', __('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Eventos::find($id);
        $evento->delete();
        return redirect()->route('meventos.index')->with('mensaje', __('Successfully deleted'));
    }
}
