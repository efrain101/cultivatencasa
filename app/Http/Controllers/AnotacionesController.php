<?php

namespace App\Http\Controllers;

use App\Models\Cultivos;
use App\Models\Cultivos2;
use App\Models\bitacoras_siembras;
use App\Models\Mesas_siembras;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnotacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        //obtener la fecha actual
        $fechaactual = Carbon::now();

        //verifica que hay o no comentarios del cultivo
        $count = DB::table('bitacoras_siembras')
            ->join('mesas_siembras', 'mesas_siembras.id_mesa_siembra', '=', 'bitacoras_siembras.id_mesa_siembra')
            ->where('mesas_siembras.id_mesa_siembra', '=', 2)
            ->select(DB::raw('count(bitacoras_siembras.id_bitacora) as total'))
            ->get();
        if($count[0]->total == 0)
        {
            $registros = 0;
        }
        else
        {
            $registros = 1;
        }

        //CONSULTA PARA ANOTACIONES
        $bitacoras=DB::select('Select cultivos.nombre, bitacoras_siembras.id_bitacora, bitacoras_siembras.id_mesa_siembra, bitacoras_siembras.fecha_seguimiento, bitacoras_siembras.crecimiento, bitacoras_siembras.observaciones, bitacoras_siembras.temperatura_actual, bitacoras_siembras.humedad_actual
            FROM bitacoras_siembras, mesas_cultivos, mesas_siembras, cultivos
            WHERE bitacoras_siembras.id_mesa_siembra=mesas_siembras.id_mesa_siembra
            AND mesas_siembras.id_mesa_cultivo=mesas_cultivos.id_mesa_cultivo
            AND mesas_siembras.id_cultivo=cultivos.id_cultivo
            AND mesas_siembras.id_mesa_siembra = 2');

        return view("anotaciones.index",compact('bitacoras', 'registros', 'fechaactual'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bitacoras.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtener la fecha actual
        $fechaactual = Carbon::now();

        $newAnotacion = new bitacoras_siembras();

        $newAnotacion->id_mesa_siembra = 2; //Falta obtener automaticamnete
        $newAnotacion->fecha_seguimiento = $fechaactual;
        $newAnotacion->crecimiento = $request->crecimiento;
        $newAnotacion->observaciones = $request->observaciones;
        $newAnotacion->temperatura_actual = 0;
        $newAnotacion->humedad_actual = 0;

        $newAnotacion->save();

        return redirect()->route('bitacoras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivos2 $cultivos2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(bitacoras_siembras $anotacione)
    {
        $registros = 1;
        return view("anotaciones.index",compact("anotacione",'registros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bitacoras_siembras $anotacione)
    {
        $anotacione->fecha_seguimiento = $request->fecha_seguimiento;
        $anotacione->crecimiento = $request->crecimiento;
        $anotacione->observaciones = $request->observaciones;

        $anotacione->update();

        return redirect()->route('bitacoras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cultivos2 $cultivos2)
    {
        //
    }
}
