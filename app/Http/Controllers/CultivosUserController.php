<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Cultivos;
use App\Models\Ambientes;
use App\Models\Tipos_siembras;
use App\Models\Temperaturas;
use App\Models\Humedades;
use App\Models\Temporadas;
use App\Models\Periodos_crecimientos;

use App\Models\cultivos_plagas;
use App\Models\Plagas;

use App\Models\enfermedades;
use App\Models\cultivos_enfermedades;

use App\Models\Complementos;
use App\Models\cultivos_complementos;

use App\Models\Cultivos_mantenimientos;
use App\Models\Mantenimientos;


class CultivosUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$cultivos=Cultivos::all();
        //para realizar la busqueda de un cultivo
        $nombre = $request->get('buscarnombre');
        $cultivos = Cultivos::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $ambientes=Ambientes::all();
        $tipossiembras=Tipos_siembras::all();
        $temperaturas=Temperaturas::all();
        $humedades=Humedades::all();
        $temporadas=Temporadas::all();
        $periodos=Periodos_crecimientos::all();

        $cultivosplagas=cultivos_plagas::all();
        $plagas=Plagas::all();

        $cultivosenfermedades=cultivos_enfermedades::all();
        $enfermedades=Enfermedades::all();

        $complementos=Complementos::all();
        $culcom=cultivos_complementos::all();

        $mantenimientos=Mantenimientos::all();
        $culman=Cultivos_mantenimientos::all();

        //mostrar las plagas
        $cultivos = $cultivos->map(function ($item){
            $item->plagas=cultivos_plagas::join('plagas','plagas.id_plaga','cultivos_plagas.id_plaga')
                ->where('cultivos_plagas.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //mostrar enfermedades
        $cultivos = $cultivos->map(function ($item){
            $item->enfermedades=cultivos_enfermedades::join('enfermedades','enfermedades.id_enfermedad','cultivos_enfermedades.id_enfermedad')
                ->where('cultivos_enfermedades.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //mostrar complementos
        $cultivos = $cultivos->map(function ($item){
            $item->complementos=cultivos_complementos::join('complementos','complementos.id_complemento','cultivos_complementos.id_complemento')
                ->where('cultivos_complementos.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });

        //para mostrar mantenimientos
        $cultivos = $cultivos->map(function ($item){
            $item->mantenimientos=Cultivos_mantenimientos::join('mantenimientos','mantenimientos.id_mantenimiento','cultivos_mantenimientos.id_mantenimiento')
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
    public function edit(Cultivos2 $cultivos2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivos2 $cultivos2)
    {
        //
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
