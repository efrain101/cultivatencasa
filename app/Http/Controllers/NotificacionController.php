<?php

namespace App\Http\Controllers;

use App\Models\Cultivo2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notificacion;
use function GuzzleHttp\Promise\all;

class NotificacionController extends Controller
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

        //obtener la fecha actual
        $fechaactual = Carbon::now();

        //obtener el ultimo id de la humedad de cultivos insertada en esa mesa especifica
        $ultimoid=DB::select('SELECT MAX(estadisticas.id) as id
        FROM users, mesas_cultivos, mesas_siembras, estadisticas
        WHERE users.id = mesas_cultivos.id_usuario
        AND mesas_cultivos.id_usuario = '.$id_usuario.'
        AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
        AND mesas_cultivos.id_mesa_cultivo = mesas_siembras.id_mesa_cultivo
        AND estadisticas.id_mesa_siembra = mesas_siembras.id_mesa_siembra');
        //convertir el id
        foreach ($ultimoid as $ultimo)
        {
            $u = $ultimo->id;
        }
        //obtener la humedad de ese id
        $humedad=DB::select('SELECT estadisticas.humedadsuelo
        FROM estadisticas
        WHERE estadisticas.id = '.$u.'');
        //convertir humedad
        foreach ($humedad as $hum)
        {
            $h = $hum->humedadsuelo;
        }

        //Si la humedad es mayor o igual a 50 quiere decir que los cultivos se regaron entonces comienza proceso para notificacion
        if ($h>=50)
        {
            //Ver si hay notificaciones
            $contarnot=DB::select('SELECT count(id_notificacion) as cantidad
            FROM notificaciones
            WHERE notificaciones.id_mesa_cultivo = '.$id_mesa_cultivo.'
            AND notificaciones.id_usuario='.$id_usuario.'');
            //convertir cantidad
            foreach ($contarnot as $contar)
            {
                $co = $contar->cantidad;
            }
                //Si hay notificaciones
                if($co>0)
                {
                    //se busca la ultima notificacion
                    $maxid=DB::select('SELECT MAX(notificaciones.id_notificacion) as idn
                    FROM users, mesas_cultivos, notificaciones
                    WHERE users.id = notificaciones.id_usuario
                    AND notificaciones.id_usuario = '.$id_usuario.'
                    AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
                    AND mesas_cultivos.id_mesa_cultivo = notificaciones.id_mesa_cultivo');
                    //convertir el id
                    foreach ($maxid as $maxi)
                    {
                        $m = $maxi->idn;
                    }
                    //se busca la humedad de la ultima notificacion
                    $huum=DB::select('SELECT notificaciones.humedadsuelo as husuelo, notificaciones.fecha as fechanoti
                    FROM users, mesas_cultivos, notificaciones
                    WHERE users.id = notificaciones.id_usuario
                    AND notificaciones.id_usuario = '.$id_usuario.'
                    AND mesas_cultivos.id_mesa_cultivo = '.$id_mesa_cultivo.'
                    AND mesas_cultivos.id_mesa_cultivo = notificaciones.id_mesa_cultivo
                    AND notificaciones.id_notificacion='.$m.'');
                    //convertir la humedad
                    foreach ($huum as $huu)
                    {
                        $hd = $huu->husuelo;
                        $fn = $huu->fechanoti;
                    }
                    //tiempos para las fechas para evitar que se inserte a cada rato
                    $fecha1 = Carbon::parse($fn);
                    $f1=$fecha1->addDays(1);
                    $fecha2 = Carbon::parse($fn);
                    $f2=$fecha2->addDays(2);
                    $fecha3 = Carbon::parse($fn);
                    $f3=$fecha3->addDays(3);
                    $fecha4 = Carbon::parse($fn);
                    $f4=$fecha4->addDays(4);
                    $fecha5 = Carbon::parse($fn);
                    $f5=$fecha5->addDays(5);
                    $fecha6 = Carbon::parse($fn);
                    $f6=$fecha6->addDays(6);
                    $fecha7 = Carbon::parse($fn);
                    $f7=$fecha7->addDays(7);

                    //Si la humedad y la fecha actuales son igual a la ultima notificacion, no se inserta (se manadara de nuevo en un lapso de 7 dias)
                    if($h==$hd && ($fn==$fechaactual->format('Y-m-d') || $f1->format('Y-m-d')==$fechaactual->format('Y-m-d') || $f2->format('Y-m-d')==$fechaactual->format('Y-m-d') || $f3->format('Y-m-d')==$fechaactual->format('Y-m-d')
                            || $f4->format('Y-m-d')==$fechaactual->format('Y-m-d') || $f5->format('Y-m-d')==$fechaactual->format('Y-m-d') || $f6->format('Y-m-d')==$fechaactual->format('Y-m-d') || $f7->format('Y-m-d')==$fechaactual->format('Y-m-d')))
                    {

                    }
                    //Si la fecha es direrente a la fecha de la ultima notificacion se inserta
                    else
                    {
                        DB::insert('INSERT INTO Notificaciones (id_usuario, id_mesa_cultivo, fecha, humedadsuelo)
                        VALUES ('.$id_usuario.','.$id_mesa_cultivo.',"'.$fechaactual.'",'.$h.')');
                    }
                }
                //Si no hay notificaciones
                else
                {
                    //se inserta la notificacion
                    DB::insert('INSERT INTO Notificaciones (id_usuario, id_mesa_cultivo, fecha, humedadsuelo)
                    VALUES ('.$id_usuario.','.$id_mesa_cultivo.',"'.$fechaactual.'",'.$h.')');
                }
        }

        //mostrara las notificaciones de cada mesa y que tengan estado 0 es decir que no se hayan visto (0 es no visto, 1 es eliminado que en si no se elimina solo se oculta)
        $notificaciones=DB::select('SELECT *
        FROM notificaciones
        WHERE notificaciones.id_mesa_cultivo = '.$id_mesa_cultivo.'
        AND notificaciones.id_usuario='.$id_usuario.'');

        return view("notificaciones.index", compact('notificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Cultivo2 $cultivos2)
    {
        //
    }
}
