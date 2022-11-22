<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\Cultivo;
use App\Models\CultivoMantenimiento;
use App\Models\Mantenimiento;

class CultivoMantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivo::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivo::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $mantenimientos=Mantenimiento::all();
        $culman=CultivoMantenimiento::all();


        //hacer un mapa para los mantenimientos de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->mantenimientos=CultivoMantenimiento::join('mantenimientos','mantenimientos.id_mantenimiento','cultivos_mantenimientos.id_mantenimiento')
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
        $cultivos=Cultivo::all();
        $mantenimientos=Mantenimiento::all();
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
        CultivoMantenimiento::create($request->all());
        return redirect()->route('culman.index')
            ->with('success', 'El mantenimiento del cultivo se registró correctamente');
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
    public function destroy(CultivoMantenimiento $culman)
    {
        $culman->delete();
        return redirect()->route("culman.index")->with("success","Mantenimiento de cultivo eliminado corectamente");
    }
}
