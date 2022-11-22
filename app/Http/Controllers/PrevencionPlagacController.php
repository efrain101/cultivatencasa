<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\PrevencionPlagac;
use Illuminate\Http\Request;

class PrevencionPlagacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$prevencion_plagas_c=prevencionPlagac::all();
        return view("catalogos/prevencion_plagas_c.index",compact('prevencion_plagas_c'));*/

        $prevencion = $request->get('buscarprevencion');
        $prevencion_plagas_c = PrevencionPlagac::where('prevencion','like',"%$prevencion%")->Paginate(100000000000);

        return view("catalogos/prevencion_plagas_c.index",compact('prevencion_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/prevencion_plagas_c.prevencion_plagas_c");
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
        PrevencionPlagac::create($request->all());
        return redirect()->route('prevencion_plagas_c.index')
            ->with('success', 'La prevención de plaga se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(PrevencionPlagac $prevencion_plagas_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(PrevencionPlagac $prevencion_plagas_c)
    {
        return view("catalogos/prevencion_plagas_c.edit",compact("prevencion_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrevencionPlagac $prevencion_plagas_c)
    {
        $request->validate([
            'prevencion' => 'required',
        ]);
        $prevencion_plagas_c->update($request->all());
        return redirect()->route('prevencion_plagas_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrevencionPlagac $prevencion_plagas_c)
    {
        $prevencion_plagas_c->delete();
        return redirect()->route("prevencion_plagas_c.index")->with("success","Prevención de plaga eliminada corectamente");
    }
}
