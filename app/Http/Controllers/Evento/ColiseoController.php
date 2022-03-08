<?php

namespace App\Http\Controllers\Evento;

use App\Coliseos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColiseoController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coliseos  $coliseos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coliseo = Coliseos::find($id);
        return response()->json(array('success' => true, 'coliseo' => $coliseo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coliseos  $coliseos
     * @return \Illuminate\Http\Response
     */
    public function edit(Coliseos $coliseos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coliseos  $coliseos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coliseos $coliseos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coliseos  $coliseos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coliseos $coliseos)
    {
        //
    }
}
