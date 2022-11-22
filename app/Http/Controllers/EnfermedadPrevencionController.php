<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\EnfermedadPrevencion;
use App\Models\Enfermedad;
use App\Models\prevencionEnfermedadc;

class EnfermedadPrevencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prevencionesenfermedades=EnfermedadPrevencion::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$enfermedades=Enfermedad::all();
        $nombre = $request->get('buscarenfe');
        $enfermedades=Enfermedad::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $prevenciones=PrevencionEnfermedadc::all();

        //hacer un mapa para las prevenciones de las enfermedades
        $enfermedades = $enfermedades->map(function ($item){
            $item->prevenciones=EnfermedadPrevencion::join('prevenciones_enfermedades_c','prevenciones_enfermedades_c.id_prevencion_enfermedad','enfermedades_prevenciones.id_prevencion_enfermedad')
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
        $enfermedades=Enfermedad::all();
        $prevenciones=PrevencionEnfermedadc::all();
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
        EnfermedadPrevencion::create($request->all());
        return redirect()->route('prevencionesenfermedades.index')
            ->with('success', 'La prevención de la enfermedad se agregó correctamente');
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
    public function destroy(EnfermedadPrevencion $prevencionesenfermedade)
    {
        $prevencionesenfermedade->delete();
        return redirect()->route("prevencionesenfermedades.index")->with("success","Prevención de enfermedad eliminada corectamente");
    }
}
