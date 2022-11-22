<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\EnfermedadErradicacion;
use App\Models\Enfermedad;
use App\Models\ErradicacionEnfermedadc;

class EnfermedadErradicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erradicacionesenfermedades=EnfermedadErradicacion::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedad::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedad::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $erradicaciones=ErradicacionEnfermedadc::all();

        //hacer un mapa para las erradicaciones de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->erradicaciones=EnfermedadErradicacion::join('erradicaciones_enfermedades_c','erradicaciones_enfermedades_c.id_erradicacion_enfermedad','enfermedades_erradicaciones.id_erradicacion_enfermedad')
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
        $enfermedades=Enfermedad::all();
        $erradicaciones=ErradicacionEnfermedadc::all();
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
        EnfermedadErradicacion::create($request->all());
        return redirect()->route('erradicacionesenfermedades.index')
            ->with('success', 'La erradicación de la enfermedad se agregó correctamente');
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
    public function destroy(EnfermedadErradicacion $erradicacionesenfermedade)
    {
        $erradicacionesenfermedade->delete();
        return redirect()->route("erradicacionesenfermedades.index")->with("success","Erradicación de enfermedad eliminada corectamente");
    }
}
