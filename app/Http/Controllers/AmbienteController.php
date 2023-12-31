<?php

namespace App\Http\Controllers;

use App\Models\Ambiente;
use App\Models\Cultivo2;
use Illuminate\Http\Request;

class ambienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo = $request->get('buscarpor');
        $ambientes = Ambiente::where('tipo','like',"%$tipo%")->Paginate(100000000000);

        return view("catalogos/ambientes.index",compact('ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/ambientes.ambientes");
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
            'especificacion' => 'required',
        ]);
        Ambiente::create($request->all());
        return redirect()->route('ambientes.index')
            ->with('success', 'El ambiente se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivos
     * @return \Illuminate\Http\Response
     */
    public function show(Ambiente $ambiente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo  $cultivos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ambiente $ambiente)
    {
        return view("catalogos/ambientes.edit",compact("ambiente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo  $cultivos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ambiente $ambiente)
    {
        $request->validate([
            'tipo' => 'required',
            'especificacion' => 'required',
        ]);
        $ambiente->update($request->all());
        return redirect()->route('ambientes.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo  $cultivos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambiente $ambiente)
    {
        $ambiente->delete();
        return redirect()->route("ambientes.index")->with("success","Ambiente eliminado corectamente");
    }
}
