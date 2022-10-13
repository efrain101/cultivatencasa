<?php

namespace App\Http\Controllers;
use App\Models\Cultivos;
use App\Models\Cultivos2;
use App\Models\Ambientes;
use App\Models\Tipos_siembras;
use App\Models\Temperaturas;
use App\Models\Humedades;
use App\Models\Temporadas;
use App\Models\Periodos_crecimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CultivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$cultivos=Cultivos::all();
        $ambientes=Ambientes::all();
        $tipossiembras=Tipos_siembras::all();
        $temperaturas=Temperaturas::all();
        $humedades=Humedades::all();
        $temporadas=Temporadas::all();
        $periodos=Periodos_crecimientos::all();
        return view("catalogos/cultivos.index",compact('cultivos'), compact('ambientes', 'tipossiembras', 'temperaturas', 'humedades', 'temporadas', 'periodos'));*/


        $ambientes=Ambientes::all();
        $tipossiembras=Tipos_siembras::all();
        $temperaturas=Temperaturas::all();
        $humedades=Humedades::all();
        $temporadas=Temporadas::all();
        $periodos=Periodos_crecimientos::all();
        $nombre = $request->get('buscarnombre');
        $cultivos = Cultivos::where('nombre','like',"%$nombre%")->Paginate(100000000000);

        return view("catalogos/cultivos.index",compact('cultivos'), compact('ambientes', 'tipossiembras', 'temperaturas', 'humedades', 'temporadas', 'periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ambientes=Ambientes::all();
        $tipossiembras=Tipos_siembras::all();
        $temperaturas=Temperaturas::all();
        $humedades=Humedades::all();
        $temporadas=Temporadas::all();
        $periodos=Periodos_crecimientos::all();
        return view("catalogos/cultivos.cultivos", compact('ambientes', 'tipossiembras', 'temperaturas', 'humedades', 'temporadas', 'periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //para guardar la imagen y su ruta ademas de moverla
        $newCultivo = new Cultivos();

        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/cultivos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $newCultivo->imagen = $destinationPath . $filename;
        }

        $newCultivo->nombre = $request->nombre;
        $newCultivo->id_ambiente = $request->id_ambiente;
        $newCultivo->id_tipo_siembra = $request->id_tipo_siembra;
        $newCultivo->id_temperatura = $request->id_temperatura;
        $newCultivo->id_humedad = $request->id_humedad;
        $newCultivo->id_temporada = $request->id_temporada;
        $newCultivo->id_periodo = $request->id_periodo;

        $newCultivo->save();

        /*
         Con este codigo no funciona lo de la imagen
         $request->validate([
            'nombre' => 'required',
            'id_ambiente' => 'required',
            'id_tipo_siembra' => 'required',
            'id_temperatura' => 'required',
            'id_humedad' => 'required',
            'id_temporada' => 'required',
            'id_periodo' => 'required',
        ]);
        Cultivos::create($request->all());
        */
        return redirect()->route('cultivos.index')
            ->with('success', 'El cultivo se registro correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivos $cultivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cultivos $cultivo)
    {
        $ambientes=Ambientes::all();
        $tipossiembras=Tipos_siembras::all();
        $temperaturas=Temperaturas::all();
        $humedades=Humedades::all();
        $temporadas=Temporadas::all();
        $periodos=Periodos_crecimientos::all();
        return view("catalogos/cultivos.edit",compact('cultivo'), compact('ambientes', 'tipossiembras', 'temperaturas', 'humedades', 'temporadas', 'periodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivos $cultivo)
    {
        /*$request->validate([
            'nombre' => 'required',
            'id_ambiente' => 'required',
            'id_tipo_siembra' => 'required',
            'id_temperatura' => 'required',
            'id_humedad' => 'required',
            'id_temporada' => 'required',
            'id_periodo' => 'required',
        ]);
        $cultivo->update($request->all());*/


        //para guardar la imagen y su ruta ademas de moverla
        if($request->hasFile('imagen')) {
            File::delete($cultivo->imagen);
            $file = $request->file('imagen');
            $destinationPath = 'img/cultivos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $cultivo->imagen = $destinationPath . $filename;
        }

        $cultivo->nombre = $request->nombre;
        $cultivo->id_ambiente = $request->id_ambiente;
        $cultivo->id_tipo_siembra = $request->id_tipo_siembra;
        $cultivo->id_temperatura = $request->id_temperatura;
        $cultivo->id_humedad = $request->id_humedad;
        $cultivo->id_temporada = $request->id_temporada;
        $cultivo->id_periodo = $request->id_periodo;


        $cultivo->update();

        return redirect()->route('cultivos.index')
            ->with('success', 'Actualización exitosa!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivos2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cultivos $cultivo)
    {
        $cultivo->delete();
        return redirect()->route("cultivos.index")->with("success","Cultivo eliminado corectamente");
    }
}
