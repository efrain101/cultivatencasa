<?php

namespace App\Http\Controllers;

use App\Models\Plaga;
use App\Models\TipoPlagac;
use App\Models\Cultivo2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipoPlagasc=tipoPlagasc::all();
        $plagas=Plaga::all();
        return view("catalogos/plagas.index",compact('plagas'), compact('tipoPlagasc'));*/

        $tipos_plagas_c=TipoPlagac::all();
        $nombre = $request->get('buscarnombre');
        $plagas = Plaga::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/plagas.index",compact('plagas'), compact('tipos_plagas_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_plagas_c=TipoPlagac::all();
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
            'imagen' => 'required',
        ]);
        Plaga::create($request->all());
        return redirect()->route('plagas.index')
            ->with('success', 'La plaga se registro correctamente');*/


        //para guardar la imagen y su ruta ademas de moverla
        $newPlagas = new Plaga();

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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Plaga $plaga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Plaga $plaga)
    {
        $tipos_plagas_c=TipoPlagac::all();
        return view("catalogos/plagas.edit",compact("plaga"),compact("tipos_plagas_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plaga $plaga)
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
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plaga $plaga)
    {
        $plaga->delete();
        return redirect()->route("plagas.index")->with("success","Plaga eliminada corectamente");
    }
}
