<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\enfermedades_erradicaciones;
use App\Models\Enfermedades;
use App\Models\erradicaciones_enfermedades_c;

class EnfermedadesErradicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erradicacionesenfermedades=enfermedades_erradicaciones::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedades::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedades::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $erradicaciones=erradicaciones_enfermedades_c::all();

        //hacer un mapa para las erradicaciones de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->erradicaciones=enfermedades_erradicaciones::join('erradicaciones_enfermedades_c','erradicaciones_enfermedades_c.id_erradicacion_enfermedad','enfermedades_erradicaciones.id_erradicacion_enfermedad')
                ->where('enfermedades_erradicaciones.id_enfermedad',$item->id_enfermedad)->get();
            return $item;
        });


        return view("personalizarcultivos/enfermedades/erradicaciones.index",compact('erradicacionesenfermedades'), compact('enfermedades', 'erradicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedades=Enfermedades::all();
        $erradicaciones=erradicaciones_enfermedades_c::all();
        return view("personalizarcultivos/enfermedades/erradicaciones.erradicacionesenfermedades", compact('enfermedades', 'erradicaciones'));
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
            'id_erradicacion_enfermedad' => 'required',
        ]);
        enfermedades_erradicaciones::create($request->all());
        return redirect()->route('erradicacionesenfermedades.index')
            ->with('success', 'La erradicación de la enfermedad se agregó correctamente');
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
    public function destroy(enfermedades_erradicaciones $erradicacionesenfermedade)
    {
        $erradicacionesenfermedade->delete();
        return redirect()->route("erradicacionesenfermedades.index")->with("success","Erradicación de enfermedad eliminada corectamente");
    }
}
