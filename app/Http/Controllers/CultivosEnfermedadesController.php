<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Cultivos;
use App\Models\enfermedades;
use App\Models\cultivos_enfermedades;
use Illuminate\Http\Request;

class CultivosEnfermedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cultivosenfermedades=cultivos_enfermedades::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivos::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivos::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $enfermedades=Enfermedades::all();

        //hacer un mapa para las enfermedades de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->enfermedades=cultivos_enfermedades::join('enfermedades','enfermedades.id_enfermedad','cultivos_enfermedades.id_enfermedad')
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
        $cultivos=Cultivos::all();
        $enfermedades=Enfermedades::all();
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
        cultivos_enfermedades::create($request->all());
        return redirect()->route('cultivosenfermedades.index')
            ->with('success', 'La enfermedad se agregó correctamente al cultivo');
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
    public function destroy(cultivos_enfermedades $cultivosenfermedade)
    {
        $cultivosenfermedade->delete();
        return redirect()->route("cultivosenfermedades.index")->with("success","Enfermedad eliminada corectamente");
    }
}
