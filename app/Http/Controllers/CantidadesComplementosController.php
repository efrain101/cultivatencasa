<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Cantidades_complementos;

class CantidadesComplementosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$cantidades_complementos=Cantidades_complementos::all();
        return view("catalogos/cantidades_complementos.index",compact('cantidades_complementos'));*/

        $cantidad = $request->get('buscarcantidad');
        $cantidades_complementos = Cantidades_complementos::where('cantidad','like',"%$cantidad%")->Paginate(100000000000);

        return view("catalogos/cantidades_complementos.index",compact('cantidades_complementos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantidades_complementos=Cantidades_complementos::all();
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
        Cantidades_complementos::create($request->all());
        return redirect()->route('cantidades_complementos.index')
            ->with('success', 'La cantidad del complemento se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cantidades_complementos $cantidades_complemento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cantidades_complementos $cantidades_complemento)
    {
        return view("catalogos/cantidades_complementos.edit",compact("cantidades_complemento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cantidades_complementos $cantidades_complemento)
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
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cantidades_complementos $cantidades_complemento)
    {
        $cantidades_complemento->delete();
        return redirect()->route("cantidades_complementos.index")->with("success","Cantidad de complemento eliminada corectamente");
    }
}
