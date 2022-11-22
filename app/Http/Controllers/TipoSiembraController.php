<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\TipoSiembra;
use Illuminate\Http\Request;

class TipoSiembraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//se agrga reques para poder hacer las vusquedas
    {
        /*Código orginal sin hacer búsquedas
        $tipossiembras=TipoSiembra::all();
        return view("catalogos/tipossiembras.index",compact('tipossiembras'));*/

        $nombre = $request->get('buscarnombre');
        $tipossiembras = TipoSiembra::where('nombre','like',"%$nombre%")->Paginate(100000000000);

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
        TipoSiembra::create($request->all());
        return redirect()->route('tipossiembras.index')
            ->with('success', 'El tipo de siembra se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(TipoSiembra $tipossiembra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoSiembra $tipossiembra)
    {
        return view("catalogos/tipossiembras.edit",compact("tipossiembra"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoSiembra $tipossiembra)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoSiembra $tipossiembra)
    {
        $tipossiembra->delete();
        return redirect()->route("tipossiembras.index")->with("success","Tipo de siembra eliminada corectamente");
    }
}
