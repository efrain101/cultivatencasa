<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\erradicaciones_plagas_c;
use Illuminate\Http\Request;

class Erradicacion_plagas_cController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$erradicacion_plagas_c=erradicaciones_plagas_c::all();
        return view("catalogos/erradicacion_plagas_c.index",compact('erradicacion_plagas_c'));*/


        $erradicacion = $request->get('buscarerradicacion');
        $erradicacion_plagas_c = erradicaciones_plagas_c::where('erradicacion','like',"%$erradicacion%")->Paginate(100000000000);

        return view("catalogos/erradicacion_plagas_c.index",compact('erradicacion_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/erradicacion_plagas_c.erradicacion_plagas_c");
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
        erradicaciones_plagas_c::create($request->all());
        return redirect()->route('erradicacion_plagas_c.index')
            ->with('success', 'La erradicación de plaga se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(erradicaciones_plagas_c $erradicacion_plagas_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(erradicaciones_plagas_c $erradicacion_plagas_c)
    {
        return view("catalogos/erradicacion_plagas_c.edit",compact("erradicacion_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, erradicaciones_plagas_c $erradicacion_plagas_c)
    {
        $request->validate([
            'erradicacion' => 'required',
        ]);
        $erradicacion_plagas_c->update($request->all());
        return redirect()->route('erradicacion_plagas_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(erradicaciones_plagas_c $erradicacion_plagas_c)
    {
        $erradicacion_plagas_c->delete();
        return redirect()->route("erradicacion_plagas_c.index")->with("success","Erradicación de plaga eliminada corectamente");
    }
}
