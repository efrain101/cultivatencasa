<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\enfermedades_efectos;
use App\Models\Enfermedades;
use App\Models\efectos_enfermedades_c;
use Illuminate\Http\Request;

class EfectosEnfermedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $efectosenfermedades=enfermedades_efectos::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedades::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedades::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $efectos=efectos_enfermedades_c::all();

        //hacer un mapa para los efectos de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->efectos=enfermedades_efectos::join('efectos_enfermedades_c','efectos_enfermedades_c.id_efecto_enfermedad','enfermedades_efectos.id_efecto_enfermedad')
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
        $enfermedades=Enfermedades::all();
        $efectos=efectos_enfermedades_c::all();
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
        enfermedades_efectos::create($request->all());
        return redirect()->route('efectosenfermedades.index')
            ->with('success', 'El efecto de la enfermedad se agregó correctamente');
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
    public function destroy(enfermedades_efectos $efectosenfermedade)
    {
        $efectosenfermedade->delete();
        return redirect()->route("efectosenfermedades.index")->with("success","Efecto de enfermedad eliminado corectamente");
    }
}
