<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Tipos_complementos;

class TiposComplementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipos_complementos=Tipos_complementos::all();
        return view("catalogos/tipos_complementos.index",compact('tipos_complementos'));*/

        $nombre = $request->get('buscarnombre');
        $tipos_complementos = Tipos_complementos::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/tipos_complementos.index",compact('tipos_complementos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_complementos=Tipos_complementos::all();
        return view("catalogos/tipos_complementos.tipos_complementos", compact('tipos_complementos'));
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
        ]);
        Tipos_complementos::create($request->all());
        return redirect()->route('tipos_complementos.index')
            ->with('success', 'El tipo de complemento se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Tipos_complementos $tipos_complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipos_complementos $tipos_complemento)
    {
        return view("catalogos/tipos_complementos.edit",compact("tipos_complemento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipos_complementos $tipos_complemento)
    {
        $request->validate([
            'nombre' => 'required', 'Unique',
        ]);
        $tipos_complemento->update($request->all());
        return redirect()->route('tipos_complementos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipos_complementos $tipos_complemento)
    {
        $tipos_complemento->delete();
        return redirect()->route("tipos_complementos.index")->with("success","Tipo de complemento eliminado corectamente");
    }
}
