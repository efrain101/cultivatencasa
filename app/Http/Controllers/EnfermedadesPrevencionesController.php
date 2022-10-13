<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\enfermedades_prevenciones;
use App\Models\Enfermedades;
use App\Models\prevenciones_enfermedades_c;

class EnfermedadesPrevencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prevencionesenfermedades=enfermedades_prevenciones::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedades::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedades::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $prevenciones=prevenciones_enfermedades_c::all();

        //hacer un mapa para las prevenciones de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->prevenciones=enfermedades_prevenciones::join('prevenciones_enfermedades_c','prevenciones_enfermedades_c.id_prevencion_enfermedad','enfermedades_prevenciones.id_prevencion_enfermedad')
                ->where('enfermedades_prevenciones.id_enfermedad',$item->id_enfermedad)->get();
            return $item;
        });

        return view("personalizarcultivos/enfermedades/prevenciones.index",compact('prevencionesenfermedades'), compact('enfermedades', 'prevenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedades=Enfermedades::all();
        $prevenciones=prevenciones_enfermedades_c::all();
        return view("personalizarcultivos/enfermedades/prevenciones.prevencionesenfermedades", compact('enfermedades', 'prevenciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_enfermedad' => 'required',
            'id_prevencion_enfermedad' => 'required',
        ]);
        enfermedades_prevenciones::create($request->all());
        return redirect()->route('prevencionesenfermedades.index')
            ->with('success', 'La prevención de la enfermedad se agregó correctamente');
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
    public function destroy(enfermedades_prevenciones $prevencionesenfermedade)
    {
        $prevencionesenfermedade->delete();
        return redirect()->route("prevencionesenfermedades.index")->with("success","Prevención de enfermedad eliminada corectamente");
    }
}
