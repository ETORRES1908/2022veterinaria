<?php

namespace App\Http\Controllers\Usuario;

use App\MVideos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class MVideosController extends Controller
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
            'video' => 'required|file|mimes:mp4|max:20000',
        ]);

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            //NAME Video
            $nombre =
                $request->REGGAL .
                $request->nvideo .
                '.' .
                $file->guessExtension();

            $ruta = 'storage/videos/mascotas/' . $nombre;
            copy($file, $ruta);
            $nmvideos = MVideos::Create([
                'nvideo' => $request->nvideo,
                'ruta' => $ruta,
                'texto' => $request->text,
                'mascota_id' => $request->mascota_id,
            ]);

            return redirect()
                ->route('mascotas.show', $nmvideos->mascota_id)
                ->with('mensaje',  __('Successfully edited'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MVideos  $mVideos
     * @return \Illuminate\Http\Response
     */
    public function show(MVideos $mVideos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MVideos  $mVideos
     * @return \Illuminate\Http\Response
     */
    public function edit(MVideos $mVideos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MVideos  $mVideos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MVideos $mVideos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MVideos  $mVideos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mvideo = MVideos::Find($id);
        /* $url = str_replace('storage', 'public', $mvideo->ruta);
        Storage::delete($url); */
        unlink($mvideo->ruta);

        $mvideo->delete();

        return redirect()->route('mascotas.show', $mvideo->mascota_id)->with('mensaje',  __('Successfully deleted'));
    }
}
