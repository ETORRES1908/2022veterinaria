<?php

namespace App\Http\Controllers\Usuario;

use App\Duelos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movidas;
use App\Suplementos;
use App\Vacunas;

class EditMascotaController extends Controller
{
    public function deleteVCNS($id)
    {
        $vcns = Vacunas::find($id);
        $vcns->delete();
        return redirect()->route('mascotas.show', $vcns->mascota_id)->with('mensaje', __('Successfully deleted'));
    }
    public function creteVCNS(Request $request)
    {
        Vacunas::create([
            'mascota_id' => $request->mascota_id,
            'vcnsf' => $request->vcnsf,
            'vcnst' => $request->vcnst,
            'vcnsm' => $request->vcnsm,
            'vcnsd' => $request->vcnsd,
        ]);
        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully created'));
    }

    public function deleteMVDS($id)
    {
        $mvds = Movidas::find($id);
        $mvds->delete();
        return redirect()->route('mascotas.show', $mvds->mascota_id)->with('mensaje', __('Successfully deleted'));
    }
    public function creteMVDS(Request $request)
    {
        Movidas::create([
            'mascota_id' => $request->mascota_id,
            'mvf' => $request->mvf,
            'mm' => $request->mm,
            'mvtp' => $request->mvtp,
            'mvr' => $request->mvr,
        ]);
        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully created'));
    }

    public function deleteSMPT($id)
    {
        $smpt = Suplementos::find($id);
        $smpt->delete();
        return redirect()->route('mascotas.show', $smpt->mascota_id)->with('mensaje', __('Successfully deleted'));
    }

    public function creteSMPT(Request $request)
    {
        Suplementos::create([
            'mascota_id' => $request->mascota_id,
            'nombre' => $request->spmtname,
            'fecha' => $request->spmtfecha,
            'time' => $request->spmttime,
        ]);
        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully created'));
    }

    public function url1(Request $request)
    {
        $duel = Duelos::find($request->duelo_id);
        $duel->update(['url1' => $request->url1]);

        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully edited'));
    }

    public function url2(Request $request)
    {
        $duel = Duelos::find($request->duelo_id);
        $duel->update(['url2' => $request->url2]);

        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully edited'));
    }
}
