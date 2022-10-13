<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enfermedades</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/styletres.css")}}">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="cultivosenf" ><a style="color: black; text-decoration: none" href="{{url("cultivosenfermedades")}}" style="text-decoration: none">Enfermedades de los cultivos</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="efectosenf" ><a style="color: black; text-decoration: none" href="{{url("efectosenfermedades")}}" style="text-decoration: none">Efectos de enfermedades</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="prevencionesenf" ><a style="color: black; text-decoration: none" href="{{url("prevencionesenfermedades")}}" style="text-decoration: none">Prevenciones de enfermedades</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="erradicaenf" ><a style="color: black; text-decoration: none" href="{{url("erradicacionesenfermedades")}}" style="text-decoration: none">Erradicaciones de enfermedades</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="volver4" ><a style="color: black; text-decoration: none" href="{{url("personalizarcultivos")}}" style="text-decoration: none">Salir</a></button>
            </li>
        </ul>
    </div>
</nav>

<div>
    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

