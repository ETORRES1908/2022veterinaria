<?php

namespace App\Http\Controllers\Usuario;

use App\Duelos;
use App\Mascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\MFotos;
use App\Movidas;
use App\User;
use App\Vacunas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MascotasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:addanimal')->only('index', 'show', 'create', 'store', 'edit', 'update', 'delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $mascotas = Mascota::where('user_id', '=', $user->id)->get();
        return view('Usuario.Mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascotas = Mascota::where('user_id', Auth::user()->id)->get();
        return view('Usuario.Mascotas.create', compact('mascotas'));
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
            'foto' => 'required|image|max:3000',
        ]);

        $nmascota = Mascota::Create([
            'user_id' => $request->user_id,
            'fnac' => $request->fnac,
            'nombre' => $request->nombre,
            'gender' => $request->gender,
            'size' => $request->size,
            'lck' => $request->lck,
            'icbc' => $request->icbc,
            'hvs' => $request->hvs,
            'ncr' => $request->ncr,
            'sena' => $request->sena,
            'spmt' => $request->spmt,
            'plc' => $request->plc,
            'plu' => $request->plu,
            'pad' => $request->pad,
            'mad' => $request->mad,
            'des' => $request->des,
            'obs' => $request->obs,
        ]);

        $user = User::Find($request->user_id);
        $REGGAL =
            str_replace('-', '', Carbon::now()->format('Y-m-d')) .
            $user->country .
            $user->state .
            '000' .
            $user->id .
            '0' .
            $nmascota->id;
        $nmascota->update(['REGGAL' => $REGGAL]);

        foreach ($request->vcnsf as $key => $value) {
            $nvacuna = Vacunas::Create([
                'mascota_id' => $nmascota->id,
                'vcnsf' => $request->vcnsf[$key],
                'vcnst' => $request->vcnst[$key],
                'vcnsm' => $request->vcnsm[$key],
                'vcnsd' => $request->vcnsd[$key]
            ]);
        }
        foreach ($request->mvf as $key => $value) {
            $nmovidas = Movidas::Create([
                'mascota_id' => $nmascota->id,
                'mvf' => $request->mvf[$key],
                'mm' => $request->mm[$key],
                /* 'ms' => $request->ms[$key], */
                'mvtp' => $request->mvtp[$key],
                'mvr' => $request->mvr[$key]
            ]);
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nombre = $REGGAL . '1.' . $file->guessExtension();
            $ruta = 'storage/images/mascotas/' . $nombre;
            Image::make($file->getRealPath())->resize(1280, 720)->save($ruta, 72, 'jpeg');
            $nMFotos = MFotos::Create([
                'nfoto' => 1,
                'ruta' => $ruta,
                'texto' => $nmascota->nombre,
                'mascota_id' => $nmascota->id,
            ]);

            return redirect()
                ->route('mascotas.show', $nmascota->id)
                ->with('mensaje', __('Successfully created'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);
        $pad = Mascota::find($mascota->pad);
        $mad = Mascota::find($mascota->mad);
        $duelos = Duelos::orWhere(['pmascota_id' => $id, 'smascota_id' => $id])->paginate(10);
        return view('Usuario.Mascotas.show', compact('mascota', 'duelos', 'pad', 'mad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mascota::find($id)->update(['sena' => $request->sena, 'obs' => $request->obs, 'spmt' => $request->spmt]);
        return redirect()->route('mascotas.show', $id)->with('mensaje', __('Successfully edited'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        //
    }
}
