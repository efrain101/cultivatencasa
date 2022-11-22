<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--
    <title>{{ config('app.name', 'Cultivate en Casa') }}</title>
    -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <title>Cultivate en casa</title>
    <link href="{{ asset('css/stylesprincipalcatalogos.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body>

<div class="wrapper" >
    <div class="sidebar" style="overflow-y:scroll;"  class="list-unstyled components">
        <h4 id="titulo">Catálogos</h4>
        <ul id="menu" >
            <li><a style="text-decoration: none" href="{{url("ambientes")}}"><i ></i>Ambientes</a></li>
            @if(Auth::user()->tipo_usuario==1)
            <li><a style="text-decoration: none" href="{{url("periodoscrecimiento")}}"><i ></i>Periodos de crecimiento</a></li>
            <li><a style="text-decoration: none" href="{{url("temporadas")}}"><i ></i>Temporadas de siembra</a></li>
            <li><a style="text-decoration: none" href="{{url("temperaturas")}}"><i ></i>Temperaturas</a></li>
            <li><a style="text-decoration: none" href="{{url("humedades")}}"><i ></i>Humedades</a></li>
            @endif
            <li><a style="text-decoration: none" href="{{url("tipossiembras")}}"><i ></i>Tipos de siembra</a></li>
            <li><a style="text-decoration: none" href="{{url("sustratos")}}"><i ></i>Sustratos</a></li>
            @if(Auth::user()->tipo_usuario==1)
            <li><a style="text-decoration: none" href="{{url("dimensiones")}}"><i ></i>Dimensiones de mesas de cultivo</a></li>
            <li><a style="text-decoration: none" href="{{url("cantidades_complementos")}}"><i ></i>Cantidades de complementos</a></li>
            <li><a style="text-decoration: none" href="{{url("tipos_complementos")}}"><i ></i>Tipos de complementos</a></li>
            @endif
            <li><a style="text-decoration: none" href="{{url("complementos")}}"><i ></i>Complementos</a></li>
            <li><a style="text-decoration: none" href="{{url("mantenimientos")}}"><i ></i>Mantenimientos</a></li>
            <li><a style="text-decoration: none" href="{{url("tipoEnfermedadc")}}"><i ></i>Tipos de enfermedades</a></li>
            <li><a style="text-decoration: none" href="{{url("enfermedades")}}"><i ></i>Enfermedades</a></li>
            <li><a style="text-decoration: none" href="{{url("efectos_enfermedades_c")}}"><i ></i>Efectos de enfermedades</a></li>
            <li><a style="text-decoration: none" href="{{url("prevencion_enfermedades_c")}}"><i ></i>Prevención de enfermedades</a></li>
            <li><a style="text-decoration: none" href="{{url("erradicacion_enfermedades_c")}}"><i ></i>Erradicación de enfermedades</a></li>
            <li><a style="text-decoration: none" href="{{url("tipos_plagas_c")}}"><i ></i>Tipos de plagas</a></li>
            <li><a style="text-decoration: none" href="{{url("plagas")}}"><i ></i>Plagas</a></li>
            <li><a style="text-decoration: none" href="{{url("efectos_plagas_c")}}"><i ></i>Efectos de plagas</a></li>
            <li><a style="text-decoration: none" href="{{url("prevencion_plagas_c")}}"><i ></i>Prevención de plagas</a></li>
            <li><a style="text-decoration: none" href="{{url("erradicacion_plagas_c")}}"><i ></i>Erradicación de plagas</a></li>
            @if(Auth::user()->tipo_usuario==1)
            <li><a style="text-decoration: none" href="{{url("cultivos")}}"><i ></i>Cultivos</a></li>
            @endif
            @if(Auth::user()->tipo_usuario==2)
                <li><a style="text-decoration: none" href="{{url("personalizarcultivos")}}"><i ></i>Información personalizada</a></li>
            @endif
            <li><a style="text-decoration: none" href="{{url("dashboard")}}"><i ></i>Salir</a></li>
        </ul>
        <div class="social_media">
            <a href="https://www.facebook.com/FcoChavez77128/"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/iamjavierchavez/?fbclid=IwAR1gNjKxlxgriTd2JwVTiuQwqwAjFZec1DsdyE6B9z9xyDBhNzZ04TsE3-Q"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="main_content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
