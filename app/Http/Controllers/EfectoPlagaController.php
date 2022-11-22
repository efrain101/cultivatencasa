<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\PlagaEfecto;
use App\Models\Plaga;
use App\Models\EfectoPlagac;
use Illuminate\Http\Request;

class EfectoPlagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $efectosplagas=PlagaEfecto::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de una plaga en especifico
        //$plagas=Plaga::all();
        $nombre = $request->get('buscarplaga');
        $plagas=Plaga::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $efectos=EfectoPlagac::all();

        //hacer un mapa para los efectos de las plagas
        $plagas = $plagas->map(function ($item){
            $item->efectos=PlagaEfecto::join('efectos_plagas_c','efectos_plagas_c.id_efecto_plaga','plagas_efectos.id_efecto_plaga')
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
        $plagas=Plaga::all();
        $efectos=EfectoPlagac::all();
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
        PlagaEfecto::create($request->all());
        return redirect()->route('efectosplagas.index')
            ->with('success', 'El efecto de la plaga se agregó correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(PlagaEfecto $efectosplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(PlagaEfecto $efectosplaga)
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
    public function update(Request $request, PlagaEfecto $efectosplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlagaEfecto $efectosplaga)
    {
        $efectosplaga->delete();
        return redirect()->route("efectosplagas.index")->with("success","Efecto de plaga eliminado corectamente");
    }
}
