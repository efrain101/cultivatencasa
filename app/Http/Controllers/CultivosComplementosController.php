<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Cultivos;
use App\Models\Complementos;
use App\Models\cultivos_complementos;

class CultivosComplementosController extends Controller
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
        $complementos=Complementos::all();
        $culcom=cultivos_complementos::all();

        //hacer un mapa para los complementos de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->complementos=cultivos_complementos::join('complementos','complementos.id_complemento','cultivos_complementos.id_complemento')
                ->where('cultivos_complementos.id_cultivo',$item->id_cultivo)->get();
            return $item;
        });
        //

        return view("personalizarcultivos/culcom.index",compact('culcom'), compact('cultivos', 'complementos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cultivos=Cultivos::all();
        $complementos=Complementos::all();
        return view("personalizarcultivos/culcom.cultivoscomplementos",compact('cultivos', 'complementos'));
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
            'id_complemento' => 'required',
        ]);
        cultivos_complementos::create($request->all());
        return redirect()->route('culcom.index')
            ->with('success', 'El complemento del cultivo se registró correctamente');
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
    public function destroy(cultivos_complementos $culcom)
    {
        $culcom->delete();
        return redirect()->route("culcom.index")->with("success","Complemento de cultivo eliminado corectamente");
    }
}
