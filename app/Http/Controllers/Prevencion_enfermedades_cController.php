<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\prevenciones_enfermedades_c;
use Illuminate\Http\Request;

class Prevencion_enfermedades_cController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$prevencion_enfermedades_c=prevenciones_enfermedades_c::all();
        return view("catalogos/prevencion_enfermedades_c.index",compact('prevencion_enfermedades_c'));*/

        $prevencion = $request->get('buscarprevencion');
        $prevencion_enfermedades_c = prevenciones_enfermedades_c::where('prevencion','like',"%$prevencion%")->Paginate(100000000000);

        return view("catalogos/prevencion_enfermedades_c.index",compact('prevencion_enfermedades_c'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/prevencion_enfermedades_c.prevencion_enfermedades_c");
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
            'prevencion' => 'required',
        ]);
        prevenciones_enfermedades_c::create($request->all());
        return redirect()->route('prevencion_enfermedades_c.index')
            ->with('success', 'La prevención de enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(prevenciones_enfermedades_c $prevencion_enfermedades_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(prevenciones_enfermedades_c $prevencion_enfermedades_c)
    {
        return view("catalogos/prevencion_enfermedades_c.edit",compact("prevencion_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prevenciones_enfermedades_c $prevencion_enfermedades_c)
    {
        $request->validate([
            'prevencion' => 'required',
        ]);
        $prevencion_enfermedades_c->update($request->all());
        return redirect()->route('prevencion_enfermedades_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(prevenciones_enfermedades_c $prevencion_enfermedades_c)
    {
        $prevencion_enfermedades_c->delete();
        return redirect()->route("prevencion_enfermedades_c.index")->with("success","Prevención de enfermedad eliminada corectamente");
    }
}
