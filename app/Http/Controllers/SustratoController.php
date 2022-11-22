<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Sustrato;
use Illuminate\Http\Request;

class SustratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$sustratos=Sustrato::all();
        return view("catalogos/sustratos.index",compact('sustratos'));*/

        $nombre = $request->get('buscarnombre');
        $sustratos = Sustrato::where('nombre','like',"%$nombre%")->Paginate(100000000000);

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
        Sustrato::create($request->all());
        return redirect()->route('sustratos.index')
            ->with('success', 'El sustrato se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Sustrato $sustrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Sustrato $sustrato)
    {
        return view("catalogos/sustratos.edit",compact("sustrato"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sustrato $sustrato)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sustrato $sustrato)
    {
        $sustrato->delete();
        return redirect()->route("sustratos.index")->with("success","Sustrato eliminado corectamente");
    }
}
