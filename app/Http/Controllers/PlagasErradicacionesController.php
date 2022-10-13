<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\plagas_erradicaciones;
use App\Models\Plagas;
use App\Models\erradicaciones_plagas_c;

class PlagasErradicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erradicacionesplagas=plagas_erradicaciones::all();
        //esta parte la modifique para que se pueda hacer la busqueda de una plaga en especifico
        //$plagas=Plagas::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plagas::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $erradicaciones=erradicaciones_plagas_c::all();

        //hacer un mapa para las erradicaciones de las plagas
        $plagas = $plagas->map(function ($item){
            $item->erradicaciones=plagas_erradicaciones::join('erradicaciones_plagas_c','erradicaciones_plagas_c.id_erradicacion_plaga','plagas_erradicaciones.id_erradicacion_plaga')
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
        $plagas=Plagas::all();
        $erradicaciones=erradicaciones_plagas_c::all();
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
        plagas_erradicaciones::create($request->all());
        return redirect()->route('erradicacionesplagas.index')
            ->with('success', 'La erradicación de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(plagas_erradicaciones $erradicacionesplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(plagas_erradicaciones $erradicacionesplaga)
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
    public function update(Request $request, plagas_erradicaciones $erradicacionesplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(plagas_erradicaciones $erradicacionesplaga)
    {
        $erradicacionesplaga->delete();
        return redirect()->route("erradicacionesplagas.index")->with("success","Erradicación de plaga eliminada corectamente");
    }
}
