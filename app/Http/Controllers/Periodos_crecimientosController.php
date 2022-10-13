<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Periodos_crecimientos;
use Illuminate\Http\Request;

class Periodos_crecimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rangomenor = $request->get('buscarrangomenor');
        $rangomayor = $request->get('buscarrangomayor');

        $periodoscrecimiento = Periodos_crecimientos::rango_menor($rangomenor)->rango_mayor($rangomayor)->Paginate(100000000000);

        return view("catalogos/periodoscrecimiento.index",compact('periodoscrecimiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/periodoscrecimiento.periodoscrecimiento");
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
            'rango_menor' => 'required',
            'rango_mayor' => 'required',
        ]);
        Periodos_crecimientos::create($request->all());
        return redirect()->route('periodoscrecimiento.index')
            ->with('success', 'El periodo se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Periodos_crecimientos $periodoscrecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodos_crecimientos $periodoscrecimiento)
    {
        return view("catalogos/periodoscrecimiento.edit",compact("periodoscrecimiento"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periodos_crecimientos $periodoscrecimiento)
    {
        $request->validate([
            'rango_menor' => 'required',
            'rango_mayor' => 'required',
        ]);
        $periodoscrecimiento->update($request->all());
        return redirect()->route('periodoscrecimiento.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periodos_crecimientos $periodoscrecimiento)
    {
        $periodoscrecimiento->delete();
        return redirect()->route("periodoscrecimiento.index")->with("success","Periodo eliminado corectamente");
    }
}
