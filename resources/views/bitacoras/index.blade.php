<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitácora</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/bitacoras.css")}}">

</head>
<body>
@foreach($datosdelprot as $datosdelpro)
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li >
                <h1 id="nombre">Bitácora de {{$datosdelpro->nombre}} </h1>
            </li>
            <li >
                <button id="observaciones" ><a id="observaciones2" href="{{url("anotaciones")}}" style="text-decoration: none">Anotar observaciones</a></button>
            </li>
            <li>
                <button id="volver" ><a id="volver2" href="{{url("mesas_siembras")}}" style="text-decoration: none">Volver</a></button>
            </li>
        </ul>
    </div>
</nav>

<div style="text-align: center">
    <img class="img" src="{{asset($datosdelpro->imagen)}}" width="250" height="200" style="margin-top: 1em; -moz-border-radius: 10px; -webkit-border-radius: 10px">
    <h3 style="color: white">{{$datosdelpro->nombre}}</h3>
</div>

<div >
    @foreach($anotaciones as $anotacion)
    <table style="background: #9FC5F8;">
        <tr>
            <td>
                <a style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">Anotaciones de crecimiento:</a>
                <a style="color: #192302; font-family: 'Baskerville Old Face'; font-size: 20px; background: #e6ff00; margin: 0 auto">{{$anotacion->crecimiento}}</a>
            </td>
        </tr>
        <tr>
            <td>
                <a style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">Anotaciones de observaciones: </a>
                <a style="color: #192302; font-family: 'Baskerville Old Face'; font-size: 20px; background: #e6ff00; margin: 0 auto">{{$anotacion->observaciones}}</a>
            </td>
        </tr>
        <tr>
            <td>
                <a style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">Fecha de seguimiento: </a>
                <a style="color: #192302; font-family: 'Baskerville Old Face'; font-size: 20px; background: #e6ff00; margin: 0 auto">{{$anotacion->fecha_seguimiento}}</a>
            </td>
        </tr>
    </table>
    @endforeach
</div>

    <style type="text/css">
        #contenedor {width: 100%;height: 100%; margin-top:1em}
        #col_der, #col_izq, #col_cen {height: 100%;padding: 0.5em}
        #col_der {float: right; width: 37%;padding: 0.5em}
        #col_izq {float: left; width: 26%;padding: 0.5em}
    </style>

<div id="contenedor" style="margin-left: 8em">

    <div id="col_der">
        <table>
            <tr>
                <td>
                    <img class="img" src="{{asset("img/tensiometro.jpg")}}" style=" width: 200px; height: 200px; display: block; margin: auto; -moz-border-radius: 10px; -webkit-border-radius: 10px">
                </td>
            </tr>
            <tr>
                <td style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">
                    <a>Humedad de la tierra actual: {{$datosdelpro->humedadsuelo}} bares</a>
                </td>
            </tr>
        </table>
    </div>

    <div id="col_izq">
        <table>
            <tr>
                <td>
                    <img class="im" src="{{asset("img/termometro.png")}}" style=" width: 200px; height: 200px; display: block; margin: auto; -moz-border-radius: 10px; -webkit-border-radius: 10px">
                </td>
            </tr>
            <tr>
                <td style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">
                    <a>Temperatura actual: {{$datosdelpro->temperatura}}° C</a>
                </td>
            </tr>
        </table>
    </div>

    <div id="col_cen">
        <table>
            <tr>
                <td>
                    <img class="im" src="{{asset("img/Termohigrometro.png")}}" style=" width: 200px; height: 200px; display: block; margin: auto; -moz-border-radius: 10px; -webkit-border-radius: 10px">
                </td>
            </tr>
            <tr>
                <td style="color: black; font-family: 'Baskerville Old Face'; font-size: 20px; background: #9FC5F8; margin: 0 auto">
                    <a>Humedad del ambiente actual: {{$datosdelpro->humedad}} habs</a>
                </td>
            </tr>
        </table>
    </div>

</div>

@endforeach
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
