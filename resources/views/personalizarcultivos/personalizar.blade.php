<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personalizar cultivos</title>
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
                <button id="plagas" ><a id="plagas2" href="{{url("principalplagas")}}" style="text-decoration: none">Plagas</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="enfermedades" ><a id="enfermedades2" href="{{url("principalenfermedades")}}" style="text-decoration: none">Enfermedades</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="complementos" ><a id="complementos2" href="{{url("culcom")}}" style="text-decoration: none">Complementos</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="mantenimientos" ><a id="mantenimientos2" href="{{url("culman")}}" style="text-decoration: none">Mantenimientos</a></button>
            </li>
            <li style="margin-left: 2em; margin-top: 2em; margin-top: 0; margin-bottom: 0">
                <button id="volver" ><a id="volver2" href="{{url("dashboard")}}" style="text-decoration: none">Salir</a></button>
            </li>
        </ul>
    </div>
</nav>

{{----<div>
    <table id="tabla" border="0">
        <tr>
            <td align="center" colspan="2">
                <div id="vacio" ><h1 style="color:#438a43">...</h1></div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="primero"><h1>En esta sección se pueden personalizar los cultivos</h1></div>
            </td>
        </tr>
        <tr>
            <td >
                <div style="text-align: center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/vde88r_Wgrg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 1em; margin-left: 4em"></iframe>
                </div>
            </td>
            <td>
                <img id="imagen" class="im" src="{{asset("img/personalizar.jpg")}}" width="560" height="315">
            </td>
        </tr>
    </table>
</div>--}}

<div>
    <main class="py-4">
        @yield('content')
    </main>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
