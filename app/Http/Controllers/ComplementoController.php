<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Complemento;
use App\Models\TipoComplemento;
use App\Models\CantidadComplemento;
use Illuminate\Http\Request;

class ComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$complementos=Complemento::all();
        $tipos=TipoComplemento::all();
        $cantidades=CantidadComplemento::all();
        return view("catalogos/complementos.index",compact('complementos'), compact('tipos', 'cantidades'));*/


        $tipos=TipoComplemento::all();
        $cantidades=CantidadComplemento::all();

        $nombre = $request->get('buscarnombre');
        $complementos = Complemento::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/complementos.index",compact('complementos'), compact('tipos', 'cantidades'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos=TipoComplemento::all();
        $cantidades=CantidadComplemento::all();
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
        Complemento::create($request->all());
        return redirect()->route('complementos.index')
            ->with('success', 'El complemento se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Complemento $complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Complemento $complemento)
    {
        $tipos=TipoComplemento::all();
        $cantidades=CantidadComplemento::all();
        return view("catalogos/complementos.edit",compact("complemento"), compact('tipos', 'cantidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complemento $complemento)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complemento $complemento)
    {
        $complemento->delete();
        return redirect()->route("complementos.index")->with("success","Complemento eliminado corectamente");
    }
}
