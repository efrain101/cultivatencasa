<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\BitacoraSiembra;
use App\Models\Cultivo;
use App\Models\MesaSiembra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BitacoraSiembraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_mesa_siembra)
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        $mesas_siembras=MesaSiembra::all();
        $cultivos=Cultivo::all();

        //CONSULTA PARA BITÁCORA
        //Obtener la temperatura y humedades que manda el prototipo
        $datosdelprot=DB::select('SELECT cultivos.nombre, cultivos.imagen, estadisticas.id, estadisticas.id_mesa_siembra, estadisticas.fecha, estadisticas.temperatura, estadisticas.humedad, estadisticas.humedadsuelo, mesas_cultivos.id_mesa_cultivo
        FROM estadisticas, mesas_cultivos, mesas_siembras, cultivos
        WHERE estadisticas.id_mesa_siembra=mesas_siembras.id_mesa_siembra
        AND mesas_siembras.id_mesa_cultivo=mesas_cultivos.id_mesa_cultivo
        AND mesas_siembras.id_cultivo=cultivos.id_cultivo
        AND fecha = (
            SELECT MAX(fecha)
            FROM estadisticas
            WHERE estadisticas.id_mesa_siembra = '.$id_mesa_siembra.'
        )
        AND estadisticas.id_mesa_siembra = '.$id_mesa_siembra.'');

        //CONSULTA PARA ANOTACIONES
        //en la tabla de bitacoraSiembra solo se usan los campos fecha_segumimiento, crecimiento y observaciones ademas de los IDs
        $anotaciones=DB::select('Select cultivos.nombre, bitacoras_siembras.id_bitacora, bitacoras_siembras.id_mesa_siembra, bitacoras_siembras.fecha_seguimiento, bitacoras_siembras.crecimiento, bitacoras_siembras.observaciones
        FROM bitacoras_siembras, mesas_cultivos, mesas_siembras, cultivos
        WHERE bitacoras_siembras.id_mesa_siembra=mesas_siembras.id_mesa_siembra
        AND mesas_siembras.id_mesa_cultivo=mesas_cultivos.id_mesa_cultivo
        AND mesas_siembras.id_cultivo=cultivos.id_cultivo
        AND mesas_siembras.id_mesa_siembra = '.$id_mesa_siembra.'');


        return view("bitacoras.index",compact('datosdelprot','mesas_siembras','cultivos','anotaciones','id_mesa_siembra'));
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cultivo2 $cultivos2)
    {
        //
    }
}
