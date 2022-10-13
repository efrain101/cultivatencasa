<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Complementos;
use App\Models\Tipos_complementos;
use App\Models\Cantidades_complementos;
use Illuminate\Http\Request;

class ComplementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$complementos=Complementos::all();
        $tipos=Tipos_complementos::all();
        $cantidades=Cantidades_complementos::all();
        return view("catalogos/complementos.index",compact('complementos'), compact('tipos', 'cantidades'));*/


        $tipos=Tipos_complementos::all();
        $cantidades=Cantidades_complementos::all();

        $nombre = $request->get('buscarnombre');
        $complementos = Complementos::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/complementos.index",compact('complementos'), compact('tipos', 'cantidades'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=Tipos_complementos::all();
        $cantidades=Cantidades_complementos::all();
        return view("catalogos/complementos.complementos", compact('tipos', 'cantidades'));
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
            'nombre' => 'required',
            'id_tipo' => 'required',
            'descripcion' => 'required',
            'id_cantidad' => 'required',
        ]);
        Complementos::create($request->all());
        return redirect()->route('complementos.index')
            ->with('success', 'El complemento se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Complementos $complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Complementos $complemento)
    {
        $tipos=Tipos_complementos::all();
        $cantidades=Cantidades_complementos::all();
        return view("catalogos/complementos.edit",compact("complemento"), compact('tipos', 'cantidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complementos $complemento)
    {
        $request->validate([
            'nombre' => 'required',
            'id_tipo' => 'required',
            'descripcion' => 'required',
            'id_cantidad' => 'required',
        ]);
        $complemento->update($request->all());
        return redirect()->route('complementos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complementos $complemento)
    {
        $complemento->delete();
        return redirect()->route("complementos.index")->with("success","Complemento eliminado corectamente");
    }
}
