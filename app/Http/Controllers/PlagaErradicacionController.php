<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\PlagaErradicacion;
use App\Models\Plaga;
use App\Models\erradicacionPlagac;

class PlagaErradicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erradicacionesplagas=PlagaErradicacion::all();
        //esta parte la modifique para que se pueda hacer la busqueda de una plaga en especifico
        //$plagas=Plaga::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plaga::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $erradicaciones=erradicacionPlagac::all();

        //hacer un mapa para las erradicaciones de las plagas
        $plagas = $plagas->map(function ($item){
            $item->erradicaciones=PlagaErradicacion::join('erradicaciones_plagas_c','erradicaciones_plagas_c.id_erradicacion_plaga','plagas_erradicaciones.id_erradicacion_plaga')
                ->where('plagas_erradicaciones.id_plaga',$item->id_plaga)->get();
            return $item;
        });


        return view("personalizarcultivos/plagas/erradicaciones.index",compact('erradicacionesplagas'), compact('plagas', 'erradicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plagas=Plaga::all();
        $erradicaciones=ErradicacionPlagac::all();
        return view("personalizarcultivos/plagas/erradicaciones.erradicacionesplagas", compact('plagas', 'erradicaciones'));
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
            'id_erradicacion_plaga' => 'required',
        ]);
        PlagaErradicacion::create($request->all());
        return redirect()->route('erradicacionesplagas.index')
            ->with('success', 'La erradicación de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(PlagaErradicacion $erradicacionesplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(PlagaErradicacion $erradicacionesplaga)
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
    public function update(Request $request, PlagaErradicacion $erradicacionesplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlagaErradicacion $erradicacionesplaga)
    {
        $erradicacionesplaga->delete();
        return redirect()->route("erradicacionesplagas.index")->with("success","Erradicación de plaga eliminada corectamente");
    }
}
