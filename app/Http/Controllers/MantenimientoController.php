<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$mantenimientos=Mantenimiento::all();
        return view("catalogos/mantenimientos.index",compact('mantenimientos'));*/


        $periodicidad = $request->get('buscarper');
        $descripcion = $request->get('buscardes');

        $mantenimientos = Mantenimiento::periodicidad($periodicidad)->descripcion($descripcion)->Paginate(100000000000);

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
        Mantenimiento::create($request->all());
        return redirect()->route('mantenimientos.index')
            ->with('success', 'El mantenimiento se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Mantenimiento $mantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        return view("catalogos/mantenimientos.edit",compact("mantenimiento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route("mantenimientos.index")->with("success","Mantenimiento eliminado corectamente");
    }
}
