<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\Cultivo;
use App\Models\Complemento;
use App\Models\cultivoComplemento;

class CultivoComplementoController extends Controller
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
        $complementos=Complemento::all();
        $culcom=cultivoComplemento::all();

        //hacer un mapa para los complementos de los cultivos
        $cultivos = $cultivos->map(function ($item){
            $item->complementos=cultivoComplemento::join('complementos','complementos.id_complemento','cultivos_complementos.id_complemento')
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
        $cultivos=Cultivo::all();
        $complementos=Complemento::all();
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
        cultivoComplemento::create($request->all());
        return redirect()->route('culcom.index')
            ->with('success', 'El complemento del cultivo se registró correctamente');
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
    public function destroy(cultivoComplemento $culcom)
    {
        $culcom->delete();
        return redirect()->route("culcom.index")->with("success","Complemento de cultivo eliminado corectamente");
    }
}
