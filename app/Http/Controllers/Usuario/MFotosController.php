<?php

namespace App\Http\Controllers\Usuario;

use App\MFotos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class MFotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:addanimal')->only('index', 'show', 'create', 'store', 'edit', 'update', 'delete');
    }

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
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:3000',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            //NAME PHOTO
            $nombre =
                $request->REGANI .
                $request->nfoto .
                '.jpg';

            $ruta = 'storage/images/mascotas/' . $nombre;
            Image::make($file->getRealPath())->resize(1280, 720)->save($ruta, 72, 'jpg');
            $nMFotos = MFotos::Create([
                'nfoto' => $request->nfoto,
                'ruta' => $ruta,
                'texto' => $request->text,
                'mascota_id' => $request->mascota_id,
            ]);

            return redirect()
                ->route('mascotas.show', $nMFotos->mascota_id)
                ->with('mensaje', __('Successfully edited'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MFotos  $MFotos
     * @return \Illuminate\Http\Response
     */
    public function show(MFotos $MFotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MFotos  $MFotos
     * @return \Illuminate\Http\Response
     */
    public function edit(MFotos $MFotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MFotos  $MFotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MFotos $MFotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MFotos  $MFotos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mfoto = MFotos::Find($id);
        unlink($mfoto->ruta);
        $mfoto->delete();

        return redirect()->route('mascotas.show', $mfoto->mascota_id)->with('mensaje',  __('deleted'));
    }
}
