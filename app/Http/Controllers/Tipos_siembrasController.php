<?php

namespace App\Http\Controllers;

use App\Models\Cultivos2;
use App\Models\Tipos_siembras;
use Illuminate\Http\Request;

class Tipos_siembrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//se agrga reques para poder hacer las vusquedas
    {
        /*Código orginal sin hacer búsquedas
        $tipossiembras=Tipos_siembras::all();
        return view("catalogos/tipossiembras.index",compact('tipossiembras'));*/

        $nombre = $request->get('buscarnombre');
        $tipossiembras = Tipos_siembras::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/tipossiembras.index",compact('tipossiembras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("catalogos/tipossiembras.tipossiembras");
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
            'descripcion' => 'required',
        ]);
        Tipos_siembras::create($request->all());
        return redirect()->route('tipossiembras.index')
            ->with('success', 'El tipo de siembra se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Tipos_siembras $tipossiembra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipos_siembras $tipossiembra)
    {
        return view("catalogos/tipossiembras.edit",compact("tipossiembra"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipos_siembras $tipossiembra)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ]);
        $tipossiembra->update($request->all());
        return redirect()->route('tipossiembras.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipos_siembras $tipossiembra)
    {
        $tipossiembra->delete();
        return redirect()->route("tipossiembras.index")->with("success","Tipo de siembra eliminada corectamente");
    }
}
