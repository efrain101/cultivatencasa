<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\Cultivo;
use App\Models\Ambiente;
use App\Models\TipoSiembra;
use App\Models\Temperatura;
use App\Models\Humedad;
use App\Models\Temporada;
use App\Models\PeriodoCrecimiento;

use App\Models\cultivoPlaga;
use App\Models\Plaga;

use App\Models\Enfermedad;
use App\Models\cultivoEnfermedad;

use App\Models\Complemento;
use App\Models\cultivoComplemento;

use App\Models\CultivoMantenimiento;
use App\Models\Mantenimiento;


class CultivoUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$cultivos=Cultivo::all();
        //para realizar la busqueda de un cultivo
        $nombre = $request->get('buscarnombre');
        $cultivos = Cultivo::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $ambientes=Ambiente::all();
        $tipossiembras=TipoSiembra::all();
        $temperaturas=Temperatura::all();
        $humedades=Humedad::all();
        $temporadas=Temporada::all();
        $periodos=PeriodoCrecimiento::all();

        $cultivosplagas=cultivoPlaga::all();
        $plagas=Plaga::all();

        $cultivosenfermedades=cultivoEnfermedad::all();
        $enfermedades=Enfermedad::all();

        $complementos=Complemento::all();
        $culcom=cultivoComplemento::all();

        $mantenimientos=Mantenimiento::all();
        $culman=CultivoMantenimiento::all();

        //mostrar las plagas
        $cultivos = $cultivos->map(function ($item){
            $item->plagas=cultivoPlaga::join('plagas','plagas.id_plaga','cultivos_plagas.id_plaga')
                ->where('cultivos_plagas.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //mostrar enfermedades
        $cultivos = $cultivos->map(function ($item){
            $item->enfermedades=cultivoEnfermedad::join('enfermedades','enfermedades.id_enfermedad','cultivos_enfermedades.id_enfermedad')
                ->where('cultivos_enfermedades.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //mostrar complementos
        $cultivos = $cultivos->map(function ($item){
            $item->complementos=cultivoComplemento::join('complementos','complementos.id_complemento','cultivos_complementos.id_complemento')
                ->where('cultivos_complementos.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //para mostrar mantenimientos
        $cultivos = $cultivos->map(function ($item){
            $item->mantenimientos=CultivoMantenimiento::join('mantenimientos','mantenimientos.id_mantenimiento','cultivos_mantenimientos.id_mantenimiento')
                ->where('cultivos_mantenimientos.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });


        return view("cultivos_usuarios.index",compact('cultivos'), compact('ambientes', 'tipossiembras', 'temperaturas', 'humedades', 'temporadas', 'periodos'));
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
