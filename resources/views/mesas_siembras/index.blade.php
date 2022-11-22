<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cultivos en la mesa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/mesas_siembras.css")}}">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li  >
                <button id="añadircultivo" ><a id="añadircultivo2" href="{{url("mesas_siembras/".$id_mesa_cultivo."/create")}}" style="text-decoration: none">Añadir cultivo</a></button>
            </li>
            <li >
                <button id="volverad" ><a id="volverad2" href="{{url("mesas")}}" style="text-decoration: none">Volver</a></button>
            </li>
        </ul>
    </div>
</nav>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif

<div class="container">
    <h1 id="nombre3" align="center" >Administrar cultivos en la mesa de cultivo {{--"{{$mesas_siembras->mesanombre}}"--}}</h1>
    <div class="card-group">
        @foreach ($mesas_siembras as $mesas_siembra)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset($mesas_siembra->imagencultivo)}}" alt="Card image cap" width="150px" height="150px">
                <div class="card-body">

                    <h5 class="card-title"><b style="color: #0c63e4">{{$mesas_siembra->nombrecultivo}}</b></h5>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Ambiente:</b>
                        @foreach($ambientes as $ambiente)
                            @if($mesas_siembra->id_ambiente==$ambiente->id_ambiente)
                                {{$ambiente->tipo}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Tipo de siembra:</b>
                        @foreach($tipos_siembras as $tipos_siembra)
                            @if($mesas_siembra->id_tipo_siembra==$tipos_siembra->id_tipo_siembra)
                                {{$tipos_siembra->nombre}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Periodo de crecimiento:</b>
                        @foreach($periodos_crecimientos as $periodos_crecimiento)
                            @if($mesas_siembra->id_periodo==$periodos_crecimiento->id_periodo)
                                {{$periodos_crecimiento->rango_menor}} a {{$periodos_crecimiento->rango_mayor}} semanas
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Temporada de producción:</b>
                        @foreach($temporadas as $temporada)
                            @if($mesas_siembra->id_temporada==$temporada->id_temporada)
                                {{$temporada->fecha_inicio}} - {{$temporada->fecha_fin}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Rango de temperatura:</b>
                        @foreach($temperaturas as $temperatura)
                            @if($mesas_siembra->id_temperatura==$temperatura->id_temperatura)
                                {{$temperatura->valor_minimo}}° - {{$temperatura->valor_maximo}}° C
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Rango de humedad del suelo:</b>
                        @foreach($humedades as $humedade)
                            @if($mesas_siembra->id_humedad==$humedade->id_humedad)
                                {{$humedade->valor_minimo}} - {{$humedade->valor_maximo}} bares
                            @endif
                        @endforeach
                    </div>
        {{--
                    <div>
                        <b style="font-size: 15px; color: darkblue">Plaga:</b>
                        @foreach($plagas as $plaga)
                            @if($mesas_siembra->id_plaga==$plaga->id_plaga)
                                {{$plaga->nombre}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Enfermedad:</b>
                        @foreach($enfermedades as $enfermedade)
                            @if($mesas_siembra->id_enfermedad==$enfermedade->id_enfermedad)
                                {{$enfermedad->nombre}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Complemento:</b>
                        @foreach($complementos as $complemento)
                            @if($mesas_siembra->id_complemento==$complemento->id_complemento)
                                {{$plaga->nombre}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Complemento:</b>
                        @foreach($mantenimientos as $mantenimiento)
                            @if($mesas_siembra->id_mantenimiento==$mantenimiento->id_mantenimiento)
                                {{$mantenimiento->descripcion}}
                            @endif
                        @endforeach
                    </div>
        --}}
                    <div>
                        <b style="font-size: 15px; color: darkblue">Estado de siembra:</b>
                        @foreach($estados_siembras as $estados_siembra)
                            @if($mesas_siembra->id_status_siembra==$estados_siembra->id_status_siembra)
                                {{$estados_siembra->estado}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Tamaño del cultivo:</b>
                        @foreach($tamaños as $tamaño)
                            @if($mesas_siembra->id_tamaño==$tamaño->id_tamaño)
                                {{$tamaño->tamaño}}
                            @endif
                        @endforeach
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Fecha de siembra:</b>
                            {{$mesas_siembra->fecha_siembra}}
                    </div>

                    <div>
                        <b style="font-size: 15px; color: darkblue">Fecha esperada de cosecha:</b>
                        {{$mesas_siembra->fecha_cosecha}}
                    </div>


                    <div>
                        <table>
                            <tr>
                                <td style="float: left">
                                    <button class="btn btn-warning">
                                    <a href="{{url("bitacoras",$mesas_siembra->id_mesa_siembra)}}" style="text-decoration: none; color: white">Bitácora</a>
                                    </button>
                                </td>

                                <td style="float: right">
                                    <form action="{{route("mesas_siembras.destroy",[$id_mesa_cultivo,$mesas_siembra->id_mesa_siembra])}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button id="btneliminar" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>

{{---<div>
    <table>
        <tr>
            <td>
                <div>
                    <table style="margin-left: 1em">
                        <tr>
                            <td colspan="2">
                                <div style="text-align: center">
                                    <img class="im" src="{{asset("img/espinaca.jpg")}}" width="150" height="150" >
                                    <h3 style="color: white">Espinaca.</h3>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8">
                                    <table>
                                        <b>
                                            <tr>
                                                <td>
                                                    <a>Ambiente: templado</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Tipos de siembra: directa</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Periodo de crecimiento: 2 a 6 semana</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Temporada de producción: enero-abril</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Temperatura: 18°</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Humedad: 12 habs</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Plaga:</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Enfermedad:</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Complemento:</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Mantenimiento:</a>
                                                </td>
                                            </tr>
                                        </b>
                                    </table>
                                </div>
                            </td>
                            <td>
                                <div style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8">
                                    <table>
                                        <b>
                                            <tr>
                                                <td>
                                                    <a>Estatus de siembra: sembrado</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Tamaño: mediano</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Fecha de siembra: 2022-03-21</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>Fecha de cosecha:</a>
                                                </td>
                                            </tr>
                                        </b>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="button" class="btn btn-warning" style="margin-top: 1em; margin-bottom: 1em; margin-left: 1em"><a  style="text-decoration: none; color: black" href="{{url("bitacora")}}">Bitácora</a></button>
                                <button type="button" class="btn btn-danger" style="margin-top: 1em; margin-bottom: 1em; margin-right: 1em"><a style="text-decoration: none; color: white">Eliminar</a></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>



            <td>
                <div>
                            <table style="margin-left: 4em">
                                <tr>
                                    <td colspan="2">
                                        <div style="text-align: center">
                                            <img class="im" src="{{asset("img/lechuga.jpg")}}" width="150" height="150" >
                                            <h3 style="color: white">Lechuga.</h3>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8">
                                            <table>
                                                <b>
                                                    <tr>
                                                        <td>
                                                            <a>Ambiente: templado</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Tipos de siembra: directa</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Periodo de crecimiento: 2 a 6 semana</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Temporada de producción: enero-abril</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Temperatura: 18°</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Humedad: 12 habs</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Plaga:</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Enfermedad:</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Complemento:</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Mantenimiento:</a>
                                                        </td>
                                                    </tr>
                                                </b>
                                            </table>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8">
                                            <table>
                                                <b>
                                                    <tr>
                                                        <td>
                                                            <a>Estatus de siembra: sembrado</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Tamaño: mediano</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Fecha de siembra: 2022-03-21</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a>Fecha de cosecha:</a>
                                                        </td>
                                                    </tr>
                                                </b>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" class="btn btn-warning" style="margin-top: 1em; margin-bottom: 1em; margin-left: 1em"><a  style="text-decoration: none">Bitácora</a></button>
                                        <button type="button" class="btn btn-danger" style="margin-top: 1em; margin-bottom: 1em; margin-right: 1em"><a style="text-decoration: none; color: white">Eliminar</a></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
            </td>
        </tr>
    </table>
</div>--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
