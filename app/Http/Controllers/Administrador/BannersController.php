<?php

namespace App\Http\Controllers\Administrador;

use App\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class BannersController extends Controller
{
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
        $banners = Banners::all();
        return view('Administrador.MBanners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.MBanners.create');
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
            'type' => 'required',
            'number' => 'required',
            'url' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|max:3000',
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            //NAME PHOTO
            $nombre =
                $request->type .
                $request->number .
                '.jpeg';

            $ruta = 'storage/images/banners/' . $nombre;
            Image::make($file->getRealPath())->resize(1280, 720)->save($ruta, 80, 'jpeg');
            if (Banners::where('name', $nombre)->first()) {
                return redirect()->route('mbanners.index',)->with('error', __('Already exists'));
            } else {
                Banners::Create([
                    'type' => $request->type,
                    'name' => $nombre,
                    'url' => $request->url,
                    'ruta' => $ruta
                ]);
                return redirect()->route('mbanners.index',)->with('mensaje', __('Successfully created'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $banner = Banners::Find($id);
        unlink($banner->ruta);

        $this->validate($request, [
            'url' => 'required',
            'foto' => 'required|image',
        ]);

        $file = $request->file('foto');
        $ruta = 'storage/images/banners/' . $banner->nombre;
        Image::make($file->getRealPath())->resize(1280, 720)->save($ruta, 80);
        $banner->update([
            'url' => $request->url,
            'ruta' => $ruta
        ]);
        return redirect()->route('mbanners.index')->with('mensaje', __('Successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banners::Find($id);
        unlink($banner->ruta);
        $banner->delete();

        return redirect()->route('mbanners.index')->with('mensaje', __('Successfully deleted'));
    }
}
