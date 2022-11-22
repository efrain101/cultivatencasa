<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\EnfermedadEfecto;
use App\Models\Enfermedad;
use App\Models\EfectoEnfermedadc;
use Illuminate\Http\Request;

class EfectoEnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $efectosenfermedades=EnfermedadEfecto::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedad::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedad::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $efectos=EfectoEnfermedadc::all();

        //hacer un mapa para los efectos de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->efectos=EnfermedadEfecto::join('efectos_enfermedades_c','efectos_enfermedades_c.id_efecto_enfermedad','enfermedades_efectos.id_efecto_enfermedad')
                ->where('enfermedades_efectos.id_enfermedad',$item->id_enfermedad)->get();
            return $item;
        });


        return view("personalizarcultivos/enfermedades/efectos.index",compact('efectosenfermedades'), compact('enfermedades', 'efectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedades=Enfermedad::all();
        $efectos=EfectoEnfermedadc::all();
        return view("personalizarcultivos/enfermedades/efectos.efectosenfermedades",compact('enfermedades', 'efectos'));
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
            'id_efecto_enfermedad' => 'required',
        ]);
        EnfermedadEfecto::create($request->all());
        return redirect()->route('efectosenfermedades.index')
            ->with('success', 'El efecto de la enfermedad se agregó correctamente');
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
    public function destroy(EnfermedadEfecto $efectosenfermedade)
    {
        $efectosenfermedade->delete();
        return redirect()->route("efectosenfermedades.index")->with("success","Efecto de enfermedad eliminado corectamente");
    }
}
