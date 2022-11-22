<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Cultivo;
use App\Models\CultivoPlaga;
use App\Models\Plaga;
use Illuminate\Http\Request;

class CultivoPlagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cultivosplagas=CultivoPlaga::all();
        //esta parte la modifique para que se pueda hacer la vusqueda de un cultivo en especifico
        //$cultivos=Cultivo::all();
        $nombre = $request->get('buscarnombre');
        $cultivos=Cultivo::where('nombre','like',"%$nombre%")->Paginate(100000000000);
        //
        $plagas=Plaga::all();

        //hacer un mapa para las plagas de los cultivos
        $cultivos = $cultivos->map(function ($item){
             $item->plagas=CultivoPlaga::join('plagas','plagas.id_plaga','cultivos_plagas.id_plaga')
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
        $cultivos=Cultivo::all();
        $plagas=Plaga::all();
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
        CultivoPlaga::create($request->all());
        return redirect()->route('cultivosplagas.index')
            ->with('success', 'La plaga se agrego correctamente al cultivo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(CultivoPlaga $cultivosplaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(CultivoPlaga $cultivosplaga)
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
    public function update(Request $request, CultivoPlaga $cultivosplaga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(CultivoPlaga $cultivosplaga)
    {
        $cultivosplaga->delete();
        return redirect()->route("cultivosplagas.index")->with("success","Plaga eliminada corectamente");
    }
}
