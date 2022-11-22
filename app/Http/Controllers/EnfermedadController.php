<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use App\Models\Enfermedad;
use App\Models\TipoEnfermedadc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EnfermedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$tipoEnfermedadc=tipoEnfermedadc::all();
        $enfermedades=Enfermedad::all();
        return view("catalogos/enfermedades.index",compact('enfermedades'), compact('tipoEnfermedadc'));*/

        $tipos_enfermedades_c=TipoEnfermedadc::all();
        $nombre = $request->get('buscarnombre');
        $enfermedades = Enfermedad::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/enfermedades.index",compact('enfermedades'), compact('tipos_enfermedades_c'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_enfermedades_c=TipoEnfermedadc::all();
        return view("catalogos/enfermedades.enfermedades", compact('tipos_enfermedades_c'));
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
            'id_tipo_enfermedad' => 'required',
            'imagen' => 'required',
        ]);
        Enfermedad::create($request->all());
        return redirect()->route('enfermedades.index')
            ->with('success', 'La enfermedad se registro correctamente');*/

        //para guardar la imagen y su ruta ademas de moverla
        $newEnfermedades = new Enfermedad();

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/enfermedades/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $newEnfermedades->imagen = $destinationPath . $filename;
        }

        $newEnfermedades->nombre = $request->nombre;
        $newEnfermedades->id_tipo_enfermedad = $request->id_tipo_enfermedad;

        $newEnfermedades->save();

        return redirect()->route('enfermedades.index')
            ->with('success', 'La enfermedad se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Enfermedad $enfermedade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Enfermedad $enfermedade)
    {
        $tipos_enfermedades_c=TipoEnfermedadc::all();
        return view("catalogos/enfermedades.edit",compact("enfermedade"),compact("tipos_enfermedades_c"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enfermedad $enfermedade)
    {
        /*$request->validate([
            'nombre' => 'required',
            'id_tipo_enfermedad' => 'required',
        ]);
        $enfermedade->update($request->all());
        return redirect()->route('enfermedades.index')
            ->with('success', 'Actualización exitosa!!');*/


        //para guardar la imagen y su ruta ademas de moverla
        if($request->hasFile('imagen')) {
            File::delete($enfermedade->imagen);
            $file = $request->file('imagen');
            $destinationPath = 'img/enfermedades/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $enfermedade->imagen = $destinationPath . $filename;
        }

        $enfermedade->nombre = $request->nombre;
        $enfermedade->id_tipo_enfermedad = $request->id_tipo_enfermedad;

        $enfermedade->update();

        return redirect()->route('enfermedades.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enfermedad $enfermedade)
    {
        $enfermedade->delete();
        return redirect()->route("enfermedades.index")->with("success","Enfermedad eliminada corectamente");
    }
}
