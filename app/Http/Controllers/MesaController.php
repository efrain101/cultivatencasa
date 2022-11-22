<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MesaCultivo;
use App\Models\Sustrato;
use App\Models\Dimension;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        $dimensiones=Dimension::all();
        $sustratos=Sustrato::all();

        //mostrar las mesas del usurio
        $mesas=DB::select('SELECT mesas_cultivos.id_mesa_cultivo, mesas_cultivos.id_usuario, mesas_cultivos.nombre, mesas_cultivos.id_sustrato, mesas_cultivos.id_dimension, mesas_cultivos.imagen
        FROM users, mesas_cultivos
        WHERE users.id = mesas_cultivos.id_usuario
        AND mesas_cultivos.id_usuario ='.$id_usuario.'');


        return view("mesas.index",compact('mesas'), compact('dimensiones', 'sustratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dimensiones=Dimension::all();
        $sustratos=Sustrato::all();
        return view("mesas.registrarmesa", compact('dimensiones', 'sustratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        //para guardar la imagen y su ruta ademas de moverla
        $newMesa = new MesaCultivo();

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/mesas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $newMesa->imagen = $destinationPath . $filename;
        }

        $newMesa->id_usuario = $id_usuario; //checar si sirve asi si no agregarle el request de este
        $newMesa->nombre = $request->nombre;
        $newMesa->id_sustrato = $request->id_sustrato;
        $newMesa->id_dimension = $request->id_dimension;

        $newMesa->save();

        return redirect()->route('mesas.index')
            ->with('success', 'La mesa se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(MesaCultivo $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(MesaCultivo $mesa)
    {
        $sustratos=Sustrato::all();
        $dimensiones=Dimension::all();
        return view("mesas.edit",compact('mesa'), compact('sustratos', 'dimensiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesaCultivo $mesa)
    {
        //para guardar la imagen y su ruta ademas de moverla
        if($request->hasFile('imagen')) {
            File::delete($mesa->imagen);
            $file = $request->file('imagen');
            $destinationPath = 'img/mesas/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $mesa->imagen = $destinationPath . $filename;
        }

        $mesa->nombre = $request->nombre;
        $mesa->id_sustrato = $request->id_sustrato;
        $mesa->id_dimension = $request->id_dimension;

        $mesa->update();

        return redirect()->route('mesas.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesaCultivo $mesa)
    {
        //Eliminar todo lo referente a la mesa
        $id_de_mesa= $mesa->id_mesa_cultivo;
        DB::delete('DELETE mesas_cultivos, mesas_siembras, bitacoraSiembra, estadistica
          FROM mesas_cultivos
          INNER JOIN mesas_siembras
          ON mesas_siembras.id_mesa_cultivo = mesas_cultivos.id_mesa_cultivo
          INNER JOIN bitacoraSiembra
          ON bitacoraSiembra.id_mesa_siembra = mesas_siembras.id_mesa_siembra
          INNER JOIN estadistica
          ON estadistica.id_mesa_siembra = mesas_siembras.id_mesa_siembra
          where mesas_cultivos.id_mesa_cultivo = '.$id_de_mesa.'');

        $mesa->delete();
        return redirect()->route("mesas.index")->with("success","Mesa eliminada corectamente");
    }

}
