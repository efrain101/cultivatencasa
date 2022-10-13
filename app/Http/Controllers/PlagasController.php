<?php

namespace App\Http\Controllers;

use App\Models\Plagas;
use App\Models\tipos_plagas_c;
use App\Models\Cultivos2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlagasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipos_plagas_c=tipos_plagas_c::all();
        $plagas=Plagas::all();
        return view("catalogos/plagas.index",compact('plagas'), compact('tipos_plagas_c'));*/

        $tipos_plagas_c=tipos_plagas_c::all();
        $nombre = $request->get('buscarnombre');
        $plagas = Plagas::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/plagas.index",compact('plagas'), compact('tipos_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_plagas_c=tipos_plagas_c::all();
        return view("catalogos/plagas.plagas", compact('tipos_plagas_c'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'nombre' => 'required',
            'id_tipo_plaga' => 'required',
        ]);
        Plagas::create($request->all());
        return redirect()->route('plagas.index')
            ->with('success', 'La plaga se registro correctamente');*/


        //para guardar la imagen y su ruta ademas de moverla
        $newPlagas = new Plagas();

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/plagas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $newPlagas->imagen = $destinationPath . $filename;
        }

        $newPlagas->nombre = $request->nombre;
        $newPlagas->id_tipo_plaga = $request->id_tipo_plaga;

        $newPlagas->save();

        return redirect()->route('plagas.index')
            ->with('success', 'La plaga se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Plagas $plaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Plagas $plaga)
    {
        $tipos_plagas_c=tipos_plagas_c::all();
        return view("catalogos/plagas.edit",compact("plaga"),compact("tipos_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plagas $plaga)
    {
        /*$request->validate([
            'nombre' => 'required',
            'id_tipo_plaga' => 'required',
        ]);
        $plaga->update($request->all());
        return redirect()->route('plagas.index')
            ->with('success', 'Actualización exitosa!!');*/


        //para guardar la imagen y su ruta ademas de moverla
        if($request->hasFile('imagen')) {
            File::delete($plaga->imagen);
            $file = $request->file('imagen');
            $destinationPath = 'img/plagas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $plaga->imagen = $destinationPath . $filename;
        }

        $plaga->nombre = $request->nombre;
        $plaga->id_tipo_plaga = $request->id_tipo_plaga;

        $plaga->update();

        return redirect()->route('plagas.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plagas $plaga)
    {
        $plaga->delete();
        return redirect()->route("plagas.index")->with("success","Plaga eliminada corectamente");
    }
}
