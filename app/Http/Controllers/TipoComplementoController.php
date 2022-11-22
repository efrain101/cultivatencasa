<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\TipoComplemento;

class TipoComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipos_complementos=TipoComplemento::all();
        return view("catalogos/tipos_complementos.index",compact('tipos_complementos'));*/

        $nombre = $request->get('buscarnombre');
        $tipos_complementos = TipoComplemento::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/tipos_complementos.index",compact('tipos_complementos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_complementos=TipoComplemento::all();
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
        TipoComplemento::create($request->all());
        return redirect()->route('tipos_complementos.index')
            ->with('success', 'El tipo de complemento se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(TipoComplemento $tipos_complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoComplemento $tipos_complemento)
    {
        return view("catalogos/tipos_complementos.edit",compact("tipos_complemento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoComplemento $tipos_complemento)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoComplemento $tipos_complemento)
    {
        $tipos_complemento->delete();
        return redirect()->route("tipos_complementos.index")->with("success","Tipo de complemento eliminado corectamente");
    }
}
