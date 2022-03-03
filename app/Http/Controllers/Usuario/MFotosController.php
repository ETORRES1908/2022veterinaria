<?php

namespace App\Http\Controllers\Usuario;

use App\Mfotos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MFotosController extends Controller
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
        $this->validate($request, [
            'foto' => 'required|image|max:5120',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            //NAME PHOTO
            $nombre =
                $request->REGGAL .
                $request->nfoto .
                '.' .
                $file->guessExtension();

            $ruta = 'images/mascotas/' . $nombre;
            Image::make($file->getRealPath())
                ->resize(null, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($ruta, 40);
            $nmfotos = MFotos::Create([
                'nfoto' => $request->nfoto,
                'ruta' => $ruta,
                'texto' => $request->text,
                'mascota_id' => $request->mascota_id,
            ]);

            return redirect()
                ->route('mascotas.show', $nmfotos->mascota_id)
                ->with('mensaje', 'ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mfotos  $Mfotos
     * @return \Illuminate\Http\Response
     */
    public function show(Mfotos $Mfotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mfotos  $Mfotos
     * @return \Illuminate\Http\Response
     */
    public function edit(Mfotos $Mfotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mfotos  $Mfotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mfotos $Mfotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mfotos  $Mfotos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mfoto = MFotos::Find($id);
        /*  $url = str_replace('storage', 'public', $mfoto->ruta);
        Storage::delete($url); */
        unlink($mfoto->ruta);
        $mfoto->delete();

        return redirect()->route('mascotas.show', $mfoto->mascota_id);
    }
}
