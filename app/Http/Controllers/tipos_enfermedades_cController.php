<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\tipos_enfermedades_c;
use Illuminate\Http\Request;

class tipos_enfermedades_cController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipos_enfermedades_c=tipos_enfermedades_c::all();
        return view("catalogos/tipos_enfermedades_c.index",compact('tipos_enfermedades_c'));*/

        $tipo = $request->get('buscartipo');
        $tipos_enfermedades_c = tipos_enfermedades_c::where('tipo','like',"%$tipo%")->Paginate(100000000000);

        return view("catalogos/tipos_enfermedades_c.index",compact('tipos_enfermedades_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/tipos_enfermedades_c.tipos_enfermedades_c");
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
        ]);
        tipos_enfermedades_c::create($request->all());
        return redirect()->route('tipos_enfermedades_c.index')
            ->with('success', 'El tipo de enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(tipos_enfermedades_c $tipos_enfermedades_c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(tipos_enfermedades_c $tipos_enfermedades_c)
    {
        return view("catalogos/tipos_enfermedades_c.edit",compact("tipos_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipos_enfermedades_c $tipos_enfermedades_c)
    {
        $request->validate([
            'tipo' => 'required',
        ]);
        $tipos_enfermedades_c->update($request->all());
        return redirect()->route('tipos_enfermedades_c.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipos_enfermedades_c $tipos_enfermedades_c)
    {
        $tipos_enfermedades_c->delete();
        return redirect()->route("tipos_enfermedades_c.index")->with("success","Tipo de enfermedad eliminado corectamente");
    }
}
