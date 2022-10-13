<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Cultivos;
use App\Models\Cultivos_mantenimientos;
use App\Models\Mantenimientos;

class CultivosMantenimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivos::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivos::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $mantenimientos=Mantenimientos::all();
        $culman=Cultivos_mantenimientos::all();


        //hacer un mapa para los mantenimientos de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->mantenimientos=Cultivos_mantenimientos::join('mantenimientos','mantenimientos.id_mantenimiento','cultivos_mantenimientos.id_mantenimiento')
                ->where('cultivos_mantenimientos.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });
        //


        return view("personalizarcultivos/culman.index",compact('culman'), compact('cultivos', 'mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivos=Cultivos::all();
        $mantenimientos=Mantenimientos::all();
        return view("personalizarcultivos/culman.cultivosmantenimientos",compact('cultivos', 'mantenimientos'));
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
            'id_mantenimiento' => 'required',
        ]);
        Cultivos_mantenimientos::create($request->all());
        return redirect()->route('culman.index')
            ->with('success', 'El mantenimiento del cultivo se registró correctamente');
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
    public function destroy(Cultivos_mantenimientos $culman)
    {
        $culman->delete();
        return redirect()->route("culman.index")->with("success","Mantenimiento de cultivo eliminado corectamente");
    }
}
