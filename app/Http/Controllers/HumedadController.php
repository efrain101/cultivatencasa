<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Humedad;
use Illuminate\Http\Request;

class HumedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$humedades=Humedad::all();
        return view("catalogos/humedades.index",compact('humedades'));*/

        $valorminimo = $request->get('buscarvalorminimo');
        $valormaximo = $request->get('buscarvalormaximo');

        $humedades = Humedad::valor_minimo($valorminimo)->valor_maximo($valormaximo)->Paginate(100000000000);


        return view("catalogos/humedades.index",compact('humedades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/humedades.humedades");
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
            'valor_minimo' => 'required',
            'valor_maximo' => 'required',
        ]);
        Humedad::create($request->all());
        return redirect()->route('humedades.index')
            ->with('success', 'La humedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Humedad $humedade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Humedad $humedade)
    {
        return view("catalogos/humedades.edit",compact("humedade"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Humedad $humedade)
    {
        $request->validate([
            'valor_minimo' => 'required',
            'valor_maximo' => 'required',
        ]);
        $humedade->update($request->all());
        return redirect()->route('humedades.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Humedad $humedade)
    {
        $humedade->delete();
        return redirect()->route("humedades.index")->with("success","Humedad eliminada corectamente");
    }
}
