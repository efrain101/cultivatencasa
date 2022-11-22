<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Cultivo;
use App\Models\Enfermedad;
use App\Models\CultivoEnfermedad;
use Illuminate\Http\Request;

class CultivoEnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cultivosenfermedades=CultivoEnfermedad::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivo::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivo::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $enfermedades=Enfermedad::all();

        //hacer un mapa para las enfermedades de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->enfermedades=cultivoEnfermedad::join('enfermedades','enfermedades.id_enfermedad','cultivos_enfermedades.id_enfermedad')
                ->where('cultivos_enfermedades.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });
        //

        return view("personalizarcultivos/enfermedades/cultivosenfermedades.index",compact('cultivosenfermedades'), compact('cultivos', 'enfermedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivos=Cultivo::all();
        $enfermedades=Enfermedad::all();
        return view("personalizarcultivos/enfermedades/cultivosenfermedades.cultivosenfermedades",compact('cultivos'), compact('enfermedades'));
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
            'id_cultivo' => 'required',
            'id_enfermedad' => 'required',
        ]);
        CultivoEnfermedad::create($request->all());
        return redirect()->route('cultivosenfermedades.index')
            ->with('success', 'La enfermedad se agregó correctamente al cultivo');
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
    public function destroy(CultivoEnfermedad $cultivosenfermedade)
    {
        $cultivosenfermedade->delete();
        return redirect()->route("cultivosenfermedades.index")->with("success","Enfermedad eliminada corectamente");
    }
}
