<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fechainicio = $request->get('buscarfechaini');
        $fechafin = $request->get('buscarfechafin');

        $temporadas = Temporada::fecha_inicio($fechainicio)->fecha_fin($fechafin)->Paginate(100000000000);

        return view("catalogos/temporadas.index",compact('temporadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/temporadas.temporadas");
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
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        Temporada::create($request->all());
        return redirect()->route('temporadas.index')
            ->with('success', 'La temporada se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Temporada $temporada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporada $temporada)
    {
        return view("catalogos/temporadas.edit",compact("temporada"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporada $temporada)
    {
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $temporada->update($request->all());
        return redirect()->route('temporadas.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporada $temporada)
    {
        $temporada->delete();
        return redirect()->route("temporadas.index")->with("success","Temporada eliminada corectamente");
    }
}
