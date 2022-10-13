<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\erradicaciones_enfermedades_c;
use Illuminate\Http\Request;

class Erradicacion_enfermedades_cController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$erradicacion_enfermedades_c=erradicaciones_enfermedades_c::all();
        return view("catalogos/erradicacion_enfermedades_c.index",compact('erradicacion_enfermedades_c'));*/

        $erradicacion = $request->get('buscarerradicacion');
        $erradicacion_enfermedades_c = erradicaciones_enfermedades_c::where('erradicacion','like',"%$erradicacion%")->Paginate(100000000000);

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
        erradicaciones_enfermedades_c::create($request->all());
        return redirect()->route('erradicacion_enfermedades_c.index')
            ->with('success', 'La erradicación de enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(erradicaciones_enfermedades_c $erradicacion_enfermedades_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(erradicaciones_enfermedades_c $erradicacion_enfermedades_c)
    {
        return view("catalogos/erradicacion_enfermedades_c.edit",compact("erradicacion_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, erradicaciones_enfermedades_c $erradicacion_enfermedades_c)
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
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(erradicaciones_enfermedades_c $erradicacion_enfermedades_c)
    {
        $erradicacion_enfermedades_c->delete();
        return redirect()->route("erradicacion_enfermedades_c.index")->with("success","Erradicación de enfermedad eliminada corectamente");
    }
}
