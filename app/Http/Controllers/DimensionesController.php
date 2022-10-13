<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use Illuminate\Http\Request;
use App\Models\Dimensiones;

class DimensionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$dimensiones=Dimensiones::all();
        return view("catalogos/dimensiones.index",compact('dimensiones'));*/

        $altura = $request->get('buscaraltura');
        $ancho = $request->get('buscarancho');
        $largo = $request->get('buscarlargo');

        $dimensiones = Dimensiones::altura($altura)->ancho($ancho)->largo($largo)->Paginate(100000000000);

        return view("catalogos/dimensiones.index",compact('dimensiones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/dimensiones.dimensiones");
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
            'altura' => 'required',
            'ancho' => 'required',
            'largo' => 'required',
        ]);
        Dimensiones::create($request->all());
        return redirect()->route('dimensiones.index')
            ->with('success', 'La dimensión se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Dimensiones $dimensione)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Dimensiones $dimensione)
    {
        return view("catalogos/dimensiones.edit",compact("dimensione"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dimensiones $dimensione)
    {
        $request->validate([
            'altura' => 'required',
            'ancho' => 'required',
            'largo' => 'required',
        ]);
        $dimensione->update($request->all());
        return redirect()->route('dimensiones.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dimensiones $dimensione)
    {
        $dimensione->delete();
        return redirect()->route("dimensiones.index")->with("success","Dimensión eliminada corectamente");
    }
}
