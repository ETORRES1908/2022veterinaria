<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mascota;
use App\Suplementos;

class EditMascotaController extends Controller
{
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
        return redirect()->route('mascotas.show', $request->mascota_id)->with('mensaje', __('Successfully deleted'));
    }
}
