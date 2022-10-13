<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Mantenimientos;
use Illuminate\Http\Request;

class MantenimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$mantenimientos=Mantenimientos::all();
        return view("catalogos/mantenimientos.index",compact('mantenimientos'));*/


        $periodicidad = $request->get('buscarper');
        $descripcion = $request->get('buscardes');

        $mantenimientos = Mantenimientos::periodicidad($periodicidad)->descripcion($descripcion)->Paginate(100000000000);

        return view("catalogos/mantenimientos.index",compact('mantenimientos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/mantenimientos.mantenimientos");
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
            'periodicidad' => 'required',
            'descripcion' => 'required',
        ]);
        Mantenimientos::create($request->all());
        return redirect()->route('mantenimientos.index')
            ->with('success', 'El mantenimiento se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Mantenimientos $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantenimientos $mantenimiento)
    {
        return view("catalogos/mantenimientos.edit",compact("mantenimiento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimientos $mantenimiento)
    {
        $request->validate([
            'periodicidad' => 'required',
            'descripcion' => 'required',
        ]);
        $mantenimiento->update($request->all());
        return redirect()->route('mantenimientos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimientos $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route("mantenimientos.index")->with("success","Mantenimiento eliminado corectamente");
    }
}
