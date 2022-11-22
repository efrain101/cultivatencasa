<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Illuminate\Http\Request;
use App\Models\CantidadComplemento;

class CantidadComplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$cantidades_complementos=CantidadComplemento::all();
        return view("catalogos/cantidades_complementos.index",compact('cantidades_complementos'));*/

        $cantidad = $request->get('buscarcantidad');
        $cantidades_complementos = CantidadComplemento::where('cantidad','like',"%$cantidad%")->Paginate(100000000000);

        return view("catalogos/cantidades_complementos.index",compact('cantidades_complementos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantidades_complementos=CantidadComplemento::all();
        return view("catalogos/cantidades_complementos.cantidades_complementos", compact('cantidades_complementos'));
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
            'cantidad' => 'required',
        ]);
        CantidadComplemento::create($request->all());
        return redirect()->route('cantidades_complementos.index')
            ->with('success', 'La cantidad del complemento se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(CantidadComplemento $cantidades_complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(CantidadComplemento $cantidades_complemento)
    {
        return view("catalogos/cantidades_complementos.edit",compact("cantidades_complemento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CantidadComplemento $cantidades_complemento)
    {
        $request->validate([
            'cantidad' => 'required',
        ]);
        $cantidades_complemento->update($request->all());
        return redirect()->route('cantidades_complementos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(CantidadComplemento $cantidades_complemento)
    {
        $cantidades_complemento->delete();
        return redirect()->route("cantidades_complementos.index")->with("success","Cantidad de complemento eliminada corectamente");
    }
}
