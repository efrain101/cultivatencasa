<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\TipoPlagac;
use Illuminate\Http\Request;

class TipoPlagacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipoPlagasc=tipoPlagasc::all();
        return view("catalogos/tipoPlagasc.index",compact('tipoPlagasc'));*/

        $tipo = $request->get('buscartipo');
        $tipos_plagas_c = TipoPlagac::where('tipo','like',"%$tipo%")->Paginate(100000000000);

        return view("catalogos/tipos_plagas_c.index",compact('tipos_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/tipos_plagas_c.tipos_plagas_c");
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
            'tipo' => 'required',
        ]);
        TipoPlagac::create($request->all());
        return redirect()->route('tipos_plagas_c.index')
            ->with('success', 'El tipo de plaga se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(TipoPlagac $tipos_plagas_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPlagac $tipos_plagas_c)
    {
        return view("catalogos/tipos_plagas_c.edit",compact("tipos_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoPlagac $tipos_plagas_c)
    {
        $request->validate([
            'tipo' => 'required',
        ]);
        $tipos_plagas_c->update($request->all());
        return redirect()->route('tipos_plagas_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoPlagac $tipos_plagas_c)
    {
        $tipos_plagas_c->delete();
        return redirect()->route("tipos_plagas_c.index")->with("success","Tipo de plaga eliminada corectamente");
    }
}
