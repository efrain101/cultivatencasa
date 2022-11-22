<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\EfectoEnfermedadc;
use Illuminate\Http\Request;

class EfectoEnfermedadcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$efectoEnfermedadc=efectoEnfermedadc::all();
        return view("catalogos/efectoEnfermedadc.index",compact('efectoEnfermedadc'));*/

        $efecto = $request->get('buscarefecto');
        $efectos_enfermedades_c = EfectoEnfermedadc::where('efecto','like',"%$efecto%")->Paginate(100000000000);

        return view("catalogos/efectos_enfermedades_c.index",compact('efectos_enfermedades_c'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/efectos_enfermedades_c.efectos_enfermedades_c");
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
        EfectoEnfermedadc::create($request->all());
        return redirect()->route('efectos_enfermedades_c.index')
            ->with('success', 'El efecto de enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(EfectoEnfermedadc $efectos_enfermedades_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(EfectoEnfermedadc $efectos_enfermedades_c)
    {
        return view("catalogos/efectos_enfermedades_c.edit",compact("efectos_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EfectoEnfermedadc $efectos_enfermedades_c)
    {
        $request->validate([
            'efecto' => 'required',
        ]);
        $efectos_enfermedades_c->update($request->all());
        return redirect()->route('efectos_enfermedades_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(EfectoEnfermedadc $efectos_enfermedades_c)
    {
        $efectos_enfermedades_c->delete();
        return redirect()->route("efectos_enfermedades_c.index")->with("success","Efecto de enfermedad eliminado corectamente");
    }
}
