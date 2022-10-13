<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\plagas_prevenciones;
use App\Models\Plagas;
use App\Models\prevenciones_plagas_c;


class PlagasPrevencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prevencionesplagas=plagas_prevenciones::all();
        //esta parte la modifique para que se pueda hacer la busqueda de una plaga en especifico
        //$plagas=Plagas::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plagas::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $prevenciones=prevenciones_plagas_c::all();


        //hacer un mapa para las prevenciones de las plagas
        $plagas = $plagas->map(function ($item){
            $item->prevenciones=plagas_prevenciones::join('prevenciones_plagas_c','prevenciones_plagas_c.id_prevencion_plaga','plagas_prevenciones.id_prevencion_plaga')
                ->where('plagas_prevenciones.id_plaga',$item->id_plaga)->get();
            return $item;
        });


        return view("personalizarcultivos/plagas/prevenciones.index",compact('prevencionesplagas'), compact('plagas', 'prevenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plagas=Plagas::all();
        $prevenciones=prevenciones_plagas_c::all();
        return view("personalizarcultivos/plagas/prevenciones.prevencionesplagas", compact('plagas', 'prevenciones'));
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
            'id_plaga' => 'required',
            'id_prevencion_plaga' => 'required',
        ]);
        plagas_prevenciones::create($request->all());
        return redirect()->route('prevencionesplagas.index')
            ->with('success', 'La prevención de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(plagas_prevenciones $prevencionesplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(plagas_prevenciones $prevencionesplaga)
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
    public function update(Request $request, plagas_prevenciones $prevencionesplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(plagas_prevenciones $prevencionesplaga)
    {
        $prevencionesplaga->delete();
        return redirect()->route("prevencionesplagas.index")->with("success","Prevención de plaga eliminada corectamente");
    }
}
