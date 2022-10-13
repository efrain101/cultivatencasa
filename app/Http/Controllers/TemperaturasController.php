<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Temperaturas;
use Illuminate\Http\Request;

class TemperaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //se le agrega el request para poder hacer busquedas de los datos
    {
        /* Este era el método original de la vista pero se quito para agrgar lo de abajo que sirve para hacer busquedas
        de los datos
        $temperaturas = Temperaturas::all();
        return view("catalogos/temperaturas.index", compact('temperaturas'));*/


        $valorminimo = $request->get('buscarvalorminimo');
        $valormaximo = $request->get('buscarvalormaximo');

        $temperaturas = Temperaturas::valor_minimo($valorminimo)->valor_maximo($valormaximo)->Paginate(100000000000);
        //el paginate sirve para mostrara cieto numero de datos en la página

        return view("catalogos/temperaturas.index", compact('temperaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/temperaturas.temperaturas");
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
        Temperaturas::create($request->all());
        return redirect()->route('temperaturas.index')
            ->with('success', 'La temperatura se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Temperaturas $temperatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Temperaturas $temperatura)
    {
        return view("catalogos/temperaturas.edit",compact("temperatura"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temperaturas $temperatura)
    {
        $request->validate([
            'valor_minimo' => 'required',
            'valor_maximo' => 'required',
        ]);
        $temperatura->update($request->all());
        return redirect()->route('temperaturas.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temperaturas $temperatura)
    {
        $temperatura->delete();
        return redirect()->route("temperaturas.index")->with("success","Temperatura eliminada corectamente");
    }
}
