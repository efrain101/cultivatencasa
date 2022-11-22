<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MesaSiembra;
use Illuminate\Support\Facades\Auth;
use App\Models\Cultivo;
use App\Models\Ambiente;
use App\Models\TipoSiembra;
use App\Models\PeriodoCrecimiento;
use App\Models\Temporada;
use App\Models\Temperatura;
use App\Models\Humedad;
use App\Models\EstadoSiembra;
use App\Models\Tamaño;
use Illuminate\Support\Facades\DB;
class MesaSiembraController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_mesa_cultivo)
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        $ambientes=Ambiente::all();
        $tipos_siembras=TipoSiembra::all();
        $periodos_crecimientos=PeriodoCrecimiento::all();
        $temporadas=Temporada::all();
        $temperaturas=Temperatura::all();
        $humedades=Humedad::all();

        $estados_siembras=EstadoSiembra::all();
        $tamaños=Tamaño::all();

        $mesas_siembras=DB::select('SELECT mesas_cultivos.nombre as mesanombre, cultivos.imagen as imagencultivo, cultivos.nombre as nombrecultivo,
       ambientes.id_ambiente, tipos_siembras.id_tipo_siembra, periodos_crecimientos.id_periodo, temporadas.id_temporada, temperaturas.id_temperatura, humedades.id_humedad,
       estados_siembras.id_status_siembra, tamaños.id_tamaño, mesas_siembras.id_mesa_siembra, mesas_siembras.fecha_siembra,
       mesas_siembras.fecha_cosecha
        FROM users, mesas_cultivos, mesas_siembras, cultivos, ambientes, tipos_siembras, periodos_crecimientos, temporadas, temperaturas, humedades, estados_siembras, tamaños
        WHERE users.id = '.$id_usuario.'
        AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
	    AND users.id = mesas_cultivos.id_usuario
        AND mesas_cultivos.id_usuario = '.$id_usuario.'
        AND users.id = mesas_cultivos.id_usuario
        AND mesas_siembras.id_cultivo = cultivos.id_cultivo
        AND mesas_siembras.id_mesa_cultivo = mesas_cultivos.id_mesa_cultivo
        AND cultivos.id_ambiente = ambientes.id_ambiente
        AND cultivos.id_tipo_siembra = tipos_siembras.id_tipo_siembra
        AND cultivos.id_periodo = periodos_crecimientos.id_periodo
        AND cultivos.id_temporada = temporadas.id_temporada
        AND cultivos.id_temperatura = temperaturas.id_temperatura
        AND cultivos.id_humedad = humedades.id_humedad
        AND mesas_siembras.id_status_siembra = estados_siembras.id_status_siembra
        AND mesas_siembras.id_tamaño = tamaños.id_tamaño');

        /*$mili=round(microtime(true)*1000);
        dd($mili);*/

        /*$mesas_siembras=DB::select('SELECT mesas_cultivos.nombre as mesanombre, cultivos.imagen as imagencultivo, cultivos.nombre as nombrecultivo,
       ambientes.id_ambiente, tipos_siembras.id_tipo_siembra, periodos_crecimientos.id_periodo, temporadas.id_temporada, temperaturas.id_temperatura, humedades.id_humedad,
       estados_siembras.id_status_siembra, tamaños.id_tamaño, mesas_siembras.id_mesa_siembra, mesas_siembras.fecha_siembra,
       mesas_siembras.fecha_cosecha
        FROM users, mesas_cultivos, mesas_siembras, cultivos, ambientes, tipos_siembras, periodos_crecimientos, temporadas, temperaturas, humedades, estados_siembras, tamaños
        WHERE users.id = '.$id_usuario.'
        AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
	    AND users.id = mesas_cultivos.id_usuario
        AND mesas_cultivos.id_usuario = '.$id_usuario.'
        AND users.id = mesas_cultivos.id_usuario
        AND mesas_siembras.id_cultivo = cultivos.id_cultivo
        AND mesas_siembras.id_mesa_cultivo = mesas_cultivos.id_mesa_cultivo
        AND cultivos.id_ambiente = ambientes.id_ambiente
        AND cultivos.id_tipo_siembra = tipos_siembras.id_tipo_siembra
        AND cultivos.id_periodo = periodos_crecimientos.id_periodo
        AND cultivos.id_temporada = temporadas.id_temporada
        AND cultivos.id_temperatura = temperaturas.id_temperatura
        AND cultivos.id_humedad = humedades.id_humedad
        AND mesas_siembras.id_status_siembra = estados_siembras.id_status_siembra
        AND mesas_siembras.id_tamaño = tamaños.id_tamaño');
        $mili2=round(microtime(true)*1000)-$mili;

        dd($mili2);*/

        /*$mili=round(microtime(true)*1000);
        $a=MesaSiembra::join("cultivos","mesas_siembras.id_cultivo","cultivos.id_cultivo")
            ->join("mesas_cultivos","mesas_siembras.id_mesa_cultivo","mesas_cultivos.id_mesa_cultivo")
            ->join("ambientes","cultivos.id_ambiente","ambientes.id_ambiente")
            ->join("periodos_crecimientos","cultivos.id_periodo","periodos_crecimientos.id_periodo")
            ->join("temporadas","cultivos.id_temporada","temporadas.id_temporada")
            ->join("temperaturas","cultivos.id_temperatura","temperaturas.id_temperatura")
            ->join("humedades","cultivos.id_humedad","humedades.id_humedad")
            ->join("estados_siembras","mesas_siembras.id_status_siembra","estados_siembras.id_status_siembra")
            ->join("tamaños","mesas_siembras.id_tamaño","tamaños.id_tamaño")
            ->join("users","mesas_cultivos.id_usuario","users.id")
            ->select("mesas_cultivos.nombre as mesanombre, cultivos.imagen as imagencultivo, cultivos.nombre as nombrecultivo,
       ambientes.id_ambiente, tipos_siembras.id_tipo_siembra, periodos_crecimientos.id_periodo, temporadas.id_temporada, temperaturas.id_temperatura, humedades.id_humedad,
       estados_siembras.id_status_siembra, tamaños.id_tamaño, mesas_siembras.id_mesa_siembra, mesas_siembras.fecha_siembra,
       mesas_siembras.fecha_cosecha")
            ->where("mesas_cultivos.id_usuario", 2)
            ->where("users.id", 2)
            ->where("mesas_cultivos.id_mesa_cultivo", 1)
            ->first();
        dd($mili);*/

        return view("mesas_siembras.index",compact('mesas_siembras'),compact('ambientes','tipos_siembras',
            'periodos_crecimientos','temporadas','temperaturas','humedades', 'estados_siembras','tamaños','id_mesa_cultivo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_mesa_cultivo)
    {
        //obtener la fecha actual
        $fechaactual = Carbon::now();

        //parsear la fecha para obtener el mes en texto y en español
        $fecha2 = Carbon::parse($fechaactual);
        $mesfinal=$fecha2->monthName;

        //mostrara los cultivos disponibles en la tempoarada actual
        $cultivos_actuales=DB::select('SELECT cultivos.nombre as culnom, cultivos.imagen, ambientes.tipo, tipos_siembras.nombre as tipsi, temperaturas.valor_minimo as tempmin, temperaturas.valor_maximo as tempmax,
humedades.valor_minimo as humin, humedades.valor_maximo as humax, temporadas.fecha_inicio, temporadas.fecha_fin, periodos_crecimientos.rango_menor, periodos_crecimientos.rango_mayor
	FROM cultivos, ambientes, tipos_siembras, temperaturas, humedades, temporadas, periodos_crecimientos
	WHERE cultivos.id_ambiente = ambientes.id_ambiente
	AND cultivos.id_tipo_siembra = tipos_siembras.id_tipo_siembra
	AND cultivos.id_temperatura = temperaturas.id_temperatura
	AND cultivos.id_humedad = humedades.id_humedad
	AND cultivos.id_temporada = temporadas.id_temporada
	AND cultivos.id_periodo = periodos_crecimientos.id_periodo
	AND (temporadas.fecha_inicio LIKE "%'.$mesfinal.'%"
        OR temporadas.fecha_fin LIKE "%'.$mesfinal.'%")');

        $cultivos=Cultivo::all();
        $tamaños=Tamaño::all();
        return view("mesas_siembras.añadircultivomesa",compact('cultivos','tamaños', 'cultivos_actuales','id_mesa_cultivo', /*'fechaactual'*/));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_mesa_cultivo, Request $request)
    {
        //obtener el usuario
        $id_usuario = Auth::user()->id;

        //obtener la fecha actual
        $fechat = Carbon::now();

        //obtener el id del cultivo a insertar
        $cultivoinsertar = $request->id_cultivo;
        //verificar si el cultivo a insertar se ha insertado antes
        $INSINO=DB::select('SELECT count(cultivos.id_cultivo) as cantidad
        FROM users, mesas_cultivos, mesas_siembras, cultivos
        WHERE users.id = mesas_cultivos.id_usuario
        AND users.id = '.$id_usuario.'
        AND mesas_cultivos.id_mesa_cultivo = mesas_siembras.id_mesa_cultivo
        AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
        AND mesas_siembras.id_cultivo = cultivos.id_cultivo
        AND cultivos.id_cultivo = '.$cultivoinsertar.'');
        foreach($INSINO as $IN)
        {
            $Decision = $IN->cantidad;
        }
        //si ya se inserto anteriormente ya no se inserta
        if ($Decision==1)
        {
            //dd('Ya se inserto');
            return redirect()->route('mesas_siembras.index',$id_mesa_cultivo)
                ->with('success', 'El cultivo que quieres agregar ya esta en tu mesa, no puedes agregarlo dos veces');
        }
        //si no se ha insertado se inserta
        else
        {
            //Crear la mesa_siembra
            $newCulMesa = new MesaSiembra();
            $newCulMesa->id_cultivo = $request->id_cultivo;
            $newCulMesa->id_mesa_cultivo = $id_mesa_cultivo;
            $newCulMesa->id_status_siembra = 1;
            $newCulMesa->id_tamaño = $request->id_tamaño;
            $newCulMesa->fecha_siembra = $request->fecha_siembra;
            $newCulMesa->fecha_cosecha = $fechat;
            $newCulMesa->save();

            //obtener el id de la ultima mesa_siembra registrada por el usuarios para crear automaticamente su bitacora
            $mesa_siembra = DB::select('SELECT mesas_siembras.id_mesa_siembra, mesas_siembras.id_cultivo
        FROM mesas_siembras
        WHERE mesas_siembras.id_mesa_siembra = (
            SELECT MAX(mesas_siembras.id_mesa_siembra)
            FROM mesas_siembras, users, mesas_cultivos
            WHERE mesas_cultivos.id_usuario = users.id
            AND mesas_cultivos.id_mesa_cultivo=mesas_siembras.id_mesa_cultivo
            AND users.id = '.$id_usuario.')');
            foreach ($mesa_siembra as $mesa_si)
            {
                $mesass = $mesa_si->id_mesa_siembra;
                $cultivo_insertado = $mesa_si->id_cultivo;
            }
            /*crear la bitacora de la mesa_siembra
            DB::insert('INSERT INTO bitacoras_siembras (id_mesa_siembra)
        VALUES ('.$mesass.')');*/


            /*obtener el tiempo que tarda en crecer el cultivo insertado
            $tiempo_crecimiento=DB::select('SELECT cultivos.id_cultivo, temporadas.fecha_inicio, temporadas.fecha_fin,
               periodos_crecimientos.rango_menor, periodos_crecimientos.rango_mayor,
               periodos_crecimientos.rango_mayor-periodos_crecimientos.rango_menor as tiempocrecimientosemanas
            FROM cultivos, temporadas, periodos_crecimientos
            WHERE cultivos.id_cultivo = '.$cultivo_insertado.'
            AND cultivos.id_temporada = temporadas.id_temporada
            AND cultivos.id_periodo = periodos_crecimientos.id_periodo');
            //obtener el tiempo que tarda en crecer un cultivo en dias
            foreach($tiempo_crecimiento as $tiempo_crecimient)
            {
                $A = $tiempo_crecimient->tiempocrecimientosemanas;
                $tiempodias = $A * 7;
            }
            $diastotales = $fechat->addDays($tiempodias);*/
            //obtener el tiempo que tarda en crecer el cultivo insertado
            $tiempo_crecimiento=DB::select('SELECT cultivos.id_cultivo, mesas_siembras.fecha_siembra,
           periodos_crecimientos.rango_menor, periodos_crecimientos.rango_mayor
        FROM cultivos, periodos_crecimientos, mesas_siembras
        WHERE cultivos.id_cultivo = '.$cultivo_insertado.'
        AND cultivos.id_periodo = periodos_crecimientos.id_periodo
        AND mesas_siembras.id_mesa_siembra = '.$mesass.'');
            //obtener el tiempo que tarda en crecer un cultivo en dias
            foreach($tiempo_crecimiento as $tiempo_crecimient)
            {
                $fecha_siembra1 = $tiempo_crecimient->fecha_siembra;
                $fecha_siembra2 = $tiempo_crecimient->fecha_siembra;
                $A = $tiempo_crecimient->rango_menor;
                $B = $tiempo_crecimient->rango_mayor;
                $tiempomin = $A * 7;
                $tiempomax = $B * 7;
            }
            //parsear la fecha se usan dos por que si es solo una se suman
            $tiempoMI = Carbon::parse($fecha_siembra1);
            $tiempoMI->addDays($tiempomin);
            $tiempoMA = Carbon::parse($fecha_siembra2);
            $tiempoMA->addDays($tiempomax);
            //insertar la fecha de cosescha esperada del cultivo
            DB::update('UPDATE mesas_siembras
        SET fecha_cosecha = "entre el '.$tiempoMI->format('Y-m-d').' al '.$tiempoMA->format('Y-m-d').'"
        WHERE mesas_siembras.id_mesa_siembra = '.$mesass.'
        ');

            return redirect()->route('mesas_siembras.index',$id_mesa_cultivo)
                ->with('success', 'El cultivo se agregó correctamente a la mesa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function show(Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function edit(Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivo2 $cultivos2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cultivo2  $cultivos2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mesa_cultivo, MesaSiembra $mesa_siembra)
    {

        //Eliminar todo lo referente al cultivo
        $id_cultivo_mesa= $mesa_siembra->id_mesa_siembra;
        DB::delete('DELETE mesas_siembras, bitacoras_siembras, estadisticas
          FROM mesas_siembras
          INNER JOIN bitacoras_siembras
          ON mesas_siembras.id_mesa_siembra = bitacoras_siembras.id_mesa_siembra
          INNER JOIN estadisticas
          ON estadisticas.id_mesa_siembra = mesas_siembras.id_mesa_siembra
          where mesas_siembras.id_mesa_siembra = '.$id_cultivo_mesa.'');

        $mesa_siembra->delete();
        return redirect()->route("mesas_siembras.index",compact('id_mesa_cultivo'))->with("success","El cultivo se elimino corectamente de la mesa");
    }
}
