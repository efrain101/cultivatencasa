<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Cultivos;
use App\Models\cultivos_plagas;
use App\Models\Plagas;
use Illuminate\Http\Request;

class CultivosPlagasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cultivosplagas=cultivos_plagas::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivos::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivos::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $plagas=Plagas::all();

        //hacer un mapa para las plagas de los cultivos
        $cultivos = $cultivos->map(function ($item){
             $item->plagas=cultivos_plagas::join('plagas','plagas.id_plaga','cultivos_plagas.id_plaga')
             ->where('cultivos_plagas.id_cultivo',$item->id_cultivo)->get();
             return $item;
        });
        //

        return view("personalizarcultivos/plagas/cultivosplagas.index",compact('cultivosplagas'), compact('cultivos', 'plagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivos=Cultivos::all();
        $plagas=Plagas::all();
        return view("personalizarcultivos/plagas/cultivosplagas.cultivosplagas",compact('cultivos'), compact('plagas'));
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
            'id_plaga' => 'required',
        ]);
        cultivos_plagas::create($request->all());
        return redirect()->route('cultivosplagas.index')
            ->with('success', 'La plaga se agrego correctamente al cultivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(cultivos_plagas $cultivosplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(cultivos_plagas $cultivosplaga)
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
    public function update(Request $request, cultivos_plagas $cultivosplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(cultivos_plagas $cultivosplaga)
    {
        $cultivosplaga->delete();
        return redirect()->route("cultivosplagas.index")->with("success","Plaga eliminada corectamente");
    }
}
