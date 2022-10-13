<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Temporadas;
use Illuminate\Http\Request;

class TemporadasController extends Controller
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

        $temporadas = Temporadas::fecha_inicio($fechainicio)->fecha_fin($fechafin)->Paginate(100000000000);

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
        Temporadas::create($request->all());
        return redirect()->route('temporadas.index')
            ->with('success', 'La temporada se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Temporadas $temporada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporadas $temporada)
    {
        return view("catalogos/temporadas.edit",compact("temporada"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporadas $temporada)
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
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporadas $temporada)
    {
        $temporada->delete();
        return redirect()->route("temporadas.index")->with("success","Temporada eliminada corectamente");
    }
}
