<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\EfectoPlagac;
use Illuminate\Http\Request;
use App\Models\Plaga;
use App\Models\plagasEfecto;

class EfectoPlagacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$efectoPlagasc=efectoPlagasc::all();
        return view("catalogos/efectoPlagasc.index",compact('efectoPlagasc'));*/

        $efecto = $request->get('buscarefecto');
        $efectos_plagas_c = EfectoPlagac::where('efecto','like',"%$efecto%")->Paginate(100000000000);

        return view("catalogos/efectos_plagas_c.index",compact('efectos_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/efectos_plagas_c.efectos_plagas_c");
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
            'efecto' => 'required',
        ]);
        EfectoPlagac::create($request->all());
        return redirect()->route('efectos_plagas_c.index')
            ->with('success', 'El efecto de plaga se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(EfectoPlagac $efectos_plagas_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(EfectoPlagac $efectos_plagas_c)
    {
        return view("catalogos/efectos_plagas_c.edit",compact("efectos_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EfectoPlagac $efectos_plagas_c)
    {
        $request->validate([
            'efecto' => 'required',
        ]);
        $efectos_plagas_c->update($request->all());
        return redirect()->route('efectos_plagas_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(EfectoPlagac $efectos_plagas_c)
    {
        $efectos_plagas_c->delete();
        return redirect()->route("efectos_plagas_c.index")->with("success","Efecto de plaga eliminado corectamente");
    }
}
