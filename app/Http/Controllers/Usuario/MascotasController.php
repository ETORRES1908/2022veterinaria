<?php

namespace App\Http\Controllers\Usuario;

use App\Duelos;
use App\Mascota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\MFotos;
use App\Movidas;
use App\Suplementos;
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
        $mascotas = Mascota::where('user_id', $user->id)->get();
        return view('Usuario.Mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $mascotas = Mascota::where('user_id',  $user->id)->get();
        $pads = $mascotas->where('gender', 'male');
        $mads = $mascotas->where('gender', 'female');
        return view('Usuario.Mascotas.create', compact('pads', 'mads'));
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
            'plc' => $request->plc,
            'plu' => $request->plu,
            'pad' => $request->pad,
            'mad' => $request->mad,
            'des' => $request->des,
            'obs' => $request->obs,
        ]);

        $user = User::Find($request->user_id);
        $REGANI =
            str_replace('-', '', Carbon::now()->format('Y-m-d')) .
            $user->country .
            $user->state .
            '000' .
            $user->id .
            '00' .
            $nmascota->id;
        $nmascota->update(['REGANI' => $REGANI]);

        if ($request->vcnsf) {
            foreach ($request->vcnsf as $key => $value) {
                $nvacuna = Vacunas::Create([
                    'mascota_id' => $nmascota->id,
                    'vcnsf' => $request->vcnsf[$key],
                    'vcnst' => $request->vcnst[$key],
                    'vcnsm' => $request->vcnsm[$key],
                    'vcnsd' => $request->vcnsd[$key]
                ]);
            }
        }

        if ($request->mvf) {
            foreach ($request->mvf as $key => $value) {
                $nmovidas = Movidas::Create([
                    'mascota_id' => $nmascota->id,
                    'mvf' => $request->mvf[$key],
                    'mm' => $request->mm[$key],
                    'mvtp' => $request->mvtp[$key],
                    'mvr' => $request->mvr[$key]
                ]);
            }
        }

        if ($request->spmtname) {
            foreach ($request->spmtname as $key => $value) {
                $nspmt = Suplementos::Create([
                    'mascota_id' => $nmascota->id,
                    'nombre' => $request->spmtname[$key],
                    'fecha' => $request->spmtfecha[$key],
                    'time' => $request->spmttime[$key],
                ]);
            }
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nombre = $REGANI . '1.jpg';
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
        $duelos = Duelos::orWhere(['pmascota_id' => $id, 'smascota_id' => $id])->latest()->take(20)->get();
        return view('Usuario.Mascotas.show', compact('mascota', 'duelos', 'pad', 'mad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        return response()->json(array('success' => true, 'mascota' => $mascota));
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
        $mascota = Mascota::find($id);
        $mascota->update(['sena' => $request->sena, 'obs' => $request->obs]);
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
