<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificaciones</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/notificaciones.css")}}">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li  style="padding:1em 0em 0em 1em">
                <h1 id="nombre">Cultivate en casa</h1>
            </li>
        </ul>
    </div>
</nav>

<h1 id="nombre3" align="center" >Notificaciones de la mesa</h1>

<div>
    @foreach($notificaciones as $notification)
    <table>
        <tr>
            <td>
                <h3 style="color: #6FA8DC; margin-left: 1em">Tus cultivos presentaban poco índice de humedad en la tierra y acaban de <br>ser regados, la humedad actual de la tierra es: {{$notification->humedadsuelo}}</h3>
            </td>
            <td>
                <h3 style="color: yellow; margin-left: 1em">{{$notification->fecha}}</h3>
            </td>
            <td>
                <img class="im" src="{{asset("img/riego.jpg")}}" width="150" height="150" style="margin-right: 1em">
            </td>
        </tr>
    </table>
    @endforeach
</div>



    <a href="{{url("mesas")}}" style="text-decoration: none; color: white; margin-left: 80em">Volver</a>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

