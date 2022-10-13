<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\plagas_efectos;
use App\Models\Plagas;
use App\Models\efectos_plagas_c;
use Illuminate\Http\Request;

class EfectosPlagasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $efectosplagas=plagas_efectos::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$plagas=Plagas::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plagas::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $efectos=efectos_plagas_c::all();

        //hacer un mapa para los efectos de las plagas
        $plagas = $plagas->map(function ($item){
            $item->efectos=plagas_efectos::join('efectos_plagas_c','efectos_plagas_c.id_efecto_plaga','plagas_efectos.id_efecto_plaga')
                ->where('plagas_efectos.id_plaga',$item->id_plaga)->get();
            return $item;
        });

        return view("personalizarcultivos/plagas/efectos.index",compact('efectosplagas'), compact('plagas', 'efectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plagas=Plagas::all();
        $efectos=efectos_plagas_c::all();
        return view("personalizarcultivos/plagas/efectos.efectosplagas",compact('plagas', 'efectos'));
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
            'id_efecto_plaga' => 'required',
        ]);
        plagas_efectos::create($request->all());
        return redirect()->route('efectosplagas.index')
            ->with('success', 'El efecto de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(plagas_efectos $efectosplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(plagas_efectos $efectosplaga)
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
    public function update(Request $request, plagas_efectos $efectosplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(plagas_efectos $efectosplaga)
    {
        $efectosplaga->delete();
        return redirect()->route("efectosplagas.index")->with("success","Efecto de plaga eliminado corectamente");
    }
}
