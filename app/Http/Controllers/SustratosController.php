<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Sustratos;
use Illuminate\Http\Request;

class SustratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$sustratos=Sustratos::all();
        return view("catalogos/sustratos.index",compact('sustratos'));*/

        $nombre = $request->get('buscarnombre');
        $sustratos = Sustratos::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/sustratos.index",compact('sustratos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/sustratos.sustratos");
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
            'nombre' => 'required',
            'composicion' => 'required',
        ]);
        Sustratos::create($request->all());
        return redirect()->route('sustratos.index')
            ->with('success', 'El sustrato se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Sustratos $sustrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Sustratos $sustrato)
    {
        return view("catalogos/sustratos.edit",compact("sustrato"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sustratos $sustrato)
    {
        $request->validate([
            'nombre' => 'required',
            'composicion' => 'required',
        ]);
        $sustrato->update($request->all());
        return redirect()->route('sustratos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sustratos $sustrato)
    {
        $sustrato->delete();
        return redirect()->route("sustratos.index")->with("success","Sustrato eliminado corectamente");
    }
}
