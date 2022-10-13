<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Humedades;
use Illuminate\Http\Request;

class HumedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$humedades=Humedades::all();
        return view("catalogos/humedades.index",compact('humedades'));*/

        $valorminimo = $request->get('buscarvalorminimo');
        $valormaximo = $request->get('buscarvalormaximo');

        $humedades = Humedades::valor_minimo($valorminimo)->valor_maximo($valormaximo)->Paginate(100000000000);


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
        Humedades::create($request->all());
        return redirect()->route('humedades.index')
            ->with('success', 'La humedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Humedades $humedade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Humedades $humedade)
    {
        return view("catalogos/humedades.edit",compact("humedade"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Humedades $humedade)
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
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Humedades $humedade)
    {
        $humedade->delete();
        return redirect()->route("humedades.index")->with("success","Humedad eliminada corectamente");
    }
}
