<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\ErradicacionEnfermedadc;
use Illuminate\Http\Request;

class ErradicacionEnfermedadcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$erradicacion_enfermedades_c=erradicacionesEnfermedadesc::all();
        return view("catalogos/erradicacion_enfermedades_c.index",compact('erradicacion_enfermedades_c'));*/

        $erradicacion = $request->get('buscarerradicacion');
        $erradicacion_enfermedades_c = ErradicacionEnfermedadc::where('erradicacion','like',"%$erradicacion%")->Paginate(100000000000);

        return view("catalogos/erradicacion_enfermedades_c.index",compact('erradicacion_enfermedades_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/erradicacion_enfermedades_c.erradicacion_enfermedades_c");
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
            'erradicacion' => 'required',
        ]);
        ErradicacionEnfermedadc::create($request->all());
        return redirect()->route('erradicacion_enfermedades_c.index')
            ->with('success', 'La erradicación de enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(ErradicacionEnfermedadc $erradicacion_enfermedades_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(ErradicacionEnfermedadc $erradicacion_enfermedades_c)
    {
        return view("catalogos/erradicacion_enfermedades_c.edit",compact("erradicacion_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErradicacionEnfermedadc $erradicacion_enfermedades_c)
    {
        $request->validate([
            'erradicacion' => 'required',
        ]);
        $erradicacion_enfermedades_c->update($request->all());
        return redirect()->route('erradicacion_enfermedades_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErradicacionEnfermedadc $erradicacion_enfermedades_c)
    {
        $erradicacion_enfermedades_c->delete();
        return redirect()->route("erradicacion_enfermedades_c.index")->with("success","Erradicación de enfermedad eliminada corectamente");
    }
}
