<?php

namespace App\Http\Controllers;

use App\Models\Cultivo;
use App\Models\Cultivo2;
use App\Models\BitacoraSiembra;
use App\Models\MesaSiembra;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnotacionController extends Controller
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

        //obtener la fecha actual
        $fechaactual = Carbon::now();

        //verifica que hay o no comentarios del cultivo
        $count = DB::table('bitacoras_siembras')
            ->join('mesas_siembras', 'mesas_siembras.id_mesa_siembra', '=', 'bitacoras_siembras.id_mesa_siembra')
            ->where('mesas_siembras.id_mesa_siembra', '=', $id_mesa_siembra)
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
        $bitacoras=DB::select('Select cultivos.nombre, bitacoras_siembras.id_bitacora, bitacoras_siembras.id_mesa_siembra, bitacoras_siembras.fecha_seguimiento, bitacoras_siembras.crecimiento, bitacoras_siembras.observaciones
            FROM bitacoras_siembras, mesas_cultivos, mesas_siembras, cultivos, users
            WHERE bitacoras_siembras.id_mesa_siembra=mesas_siembras.id_mesa_siembra
            AND mesas_siembras.id_mesa_cultivo=mesas_cultivos.id_mesa_cultivo
            AND mesas_siembras.id_cultivo=cultivos.id_cultivo
            AND mesas_siembras.id_mesa_siembra = '.$id_mesa_siembra.'
            AND users.id = '.$id_usuario.'');

        return view("anotaciones.index",compact('bitacoras', 'registros', 'fechaactual', 'id_mesa_siembra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_mesa_siembra)
    {
        return view("bitacoras.index",compact('id_mesa_siembra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_mesa_siembra, Request $request)
    {
        //obtener la fecha actual
        $fechaactual = Carbon::now();

        $newAnotacion = new BitacoraSiembra();

        $newAnotacion->id_mesa_siembra = $id_mesa_siembra; //Falta obtener automaticamnete
        $newAnotacion->fecha_seguimiento = $fechaactual;
        $newAnotacion->crecimiento = $request->crecimiento;
        $newAnotacion->observaciones = $request->observaciones;

        $newAnotacion->save();

        return redirect()->route('bitacoras.index',$id_mesa_siembra);
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
    public function edit($id_mesa_siembra, BitacoraSiembra $mesiem)
    {
        $registros = 1;
        return view("anotaciones.index",compact("mesiem",'registros','id_mesa_siembra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update($id_mesa_siembra, Request $request, BitacoraSiembra $mesiem)
    {
        $mesiem->fecha_seguimiento = $request->fecha_seguimiento;
        $mesiem->crecimiento = $request->crecimiento;
        $mesiem->observaciones = $request->observaciones;

        $mesiem->update();

        return redirect()->route('bitacoras.index',compact('id_mesa_siembra'))->with('success', 'Actualización exitosa!!');
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
