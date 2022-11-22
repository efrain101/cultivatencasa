<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\PlagaPrevencion;
use App\Models\Plaga;
use App\Models\PrevencionPlagac;


class PlagaPrevencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prevencionesplagas=PlagaPrevencion::all();
        //esta parte la modifique para que se pueda hacer la busqueda de una plaga en especifico
        //$plagas=Plaga::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plaga::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $prevenciones=PrevencionPlagac::all();


        //hacer un mapa para las prevenciones de las plagas
        $plagas = $plagas->map(function ($item){
            $item->prevenciones=PlagaPrevencion::join('prevenciones_plagas_c','prevenciones_plagas_c.id_prevencion_plaga','plagas_prevenciones.id_prevencion_plaga')
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
        $plagas=Plaga::all();
        $prevenciones=PrevencionPlagac::all();
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
        PlagaPrevencion::create($request->all());
        return redirect()->route('prevencionesplagas.index')
            ->with('success', 'La prevención de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(PlagaPrevencion $prevencionesplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(PlagaPrevencion $prevencionesplaga)
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
    public function update(Request $request, PlagaPrevencion $prevencionesplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlagaPrevencion $prevencionesplaga)
    {
        $prevencionesplaga->delete();
        return redirect()->route("prevencionesplagas.index")->with("success","Prevención de plaga eliminada corectamente");
    }
}
