<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anotaciones</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/anotaciones.css")}}">
</head>
<body>

{{---
@if($registros==0)
    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
        <div class="container-fluid" id="navbarNavD2">
            <ul class="navbar-nav">
                <li  >
                    <h1 id="nombre">Anotaciones del cultivo</h1>
                </li>
                <li>
                    <button id="volver" ><a id="volver2" href="{{url("bitacoras")}}" style="text-decoration: none">Volver</a></button>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: white" align="center"><b>Aún no hay anotaciones del cultivo</b></h2>
            </div>
            <div class="pull-right">
                <a style="text-decoration: none; color: orange; font-size: 20px" id="btnañadir" class="button" href="{{url("anotaciones/create")}}" title="Registrar mesa"> Añadir anotaciones +
                </a>
            </div>
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

@elseif($registros==1)
        <nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
            <div class="container-fluid" id="navbarNavD2">
                <ul class="navbar-nav">
                    <li  >
                        <h1 id="nombre">Anotaciones del cultivo</h1>
                    </li>
                    <li>
                        <button id="volver" ><a id="volver2" href="{{url("bitacoras")}}" style="text-decoration: none">Volver</a></button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 style="color: white" align="center"><b>Ya hay anotaciones del cultivo</b></h2>
                </div>
                <div class="pull-right">
                    <a style="text-decoration: none; color: orange; font-size: 20px" id="btnañadir" class="button" href="{{url("anotaciones/create")}}" title="Registrar mesa"> Añadir anotaciones +
                    </a>
                </div>
            </div>
        </div>
@endif--}}

{{--Si no hay comentarios mostrar la interfaz de agregar uno nuevo--}}
@if($registros==0)
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li  >
                <h1 id="nombre">Anotaciones del cultivo</h1>
            </li>
            {{--
            <li >
                <button id="Anotarobservaciones" ><a id="observaciones2" href="{{url("anotaciones")}}" style="text-decoration: none">Anotar observaciones</a></button>
            </li>
            <li>
                <button id="volver" ><a id="volver2" href="{{url("bitacoras")}}" style="text-decoration: none">Volver</a></button>
            </li>--}}
        </ul>
    </div>
</nav>

<div style="text-align: center">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/FR_m0koD3r4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 1em"></iframe>
</div>

<div class="container" style="margin-top: 2em">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{url("anotaciones/".$id_mesa_siembra)}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="crecimiento" class="col-form-label text-md-start">{{ __('Crecimiento') }}</label>
                            <div class="col-md-6">
                                <input id="crecimiento" name="crecimiento" type="text" class="form-control" placeholder="Ingresa el crecimiento de tu cultivo, si lo deseas" style="width : 40em; heigth : 3em;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="observaciones" class="col-form-label text-md-start">{{ __('Observaciones') }}</label>
                            <div class="col-md-6">
                                <textarea id="observaciones" name="observaciones" class="form-control" rows="6" placeholder="Ingresa tus observaciones, si lo deseas" style="width : 40em; heigth : 20em" ></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha_seguimiento" class="col-form-label text-md-start">{{ __('Fecha de seguimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_seguimiento" type="date" class="form-control " name="fecha_seguimiento" {{--value="{{$fechaactual->format('Y-m-d')}}" readonly--}}>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{--<button type="submit" class="btn btn-warning">
                                    <a style="text-decoration: none; color: black">Guardar observaciones</a>
                                </button>--}}
                                <button type="submit" class="btn btn-success" >
                                    {{ __('Guardar observaciones') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {{---<button type="submit" class="btn btn-danger">
                                    <a id="regresarbita" href="{{url("bitacoras/".$id_mesa_siembra)}}" style="text-decoration: none; color: black">Cancelar</a>
                                </button>--}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Si ya hay comentarios mostrar la interfaz de editar--}}
@elseif($registros==1)
@foreach($bitacoras as $bitacora)
<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 pb-0 " id="barra">
    <div class="container-fluid" id="navbarNavD2">
        <ul class="navbar-nav">
            <li>
                <h1 id="nombre">Anotaciones del cultivo {{$bitacora->nombre}}</h1>
            </li>
            {{--
            <li >
                <button id="Anotarobservaciones" ><a id="observaciones2" href="{{url("anotaciones")}}" style="text-decoration: none">Anotar observaciones</a></button>
            </li>
            <li>
                <button id="volver" ><a id="volver2" href="{{url("bitacoras")}}" style="text-decoration: none">Volver</a></button>
            </li>--}}
        </ul>
    </div>
</nav>

<div style="text-align: center">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/FR_m0koD3r4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin-top: 1em"></iframe>
</div>

<div class="container" style="margin-top: 2em">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                   <form action="{{route("anotaciones.update",[$id_mesa_siembra,$bitacora->id_bitacora])}}" method="POST">
                     @csrf
                     <div class="container">
                       @method("PUT")
                        <div class="row mb-3">
                            <label for="crecimiento" class="col-form-label text-md-start">{{ __('Crecimiento') }}</label>
                            <div class="col-md-6">
                                <input id="crecimiento" name="crecimiento" type="text" class="form-control" placeholder="Ingresa el crecimiento de tu cultivo, si lo deseas" value="{{$bitacora->crecimiento}}" style="width : 40em; heigth : 3em;">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="observaciones" class="col-form-label text-md-start">{{ __('Observaciones') }}</label>
                            <div class="col-md-6">
                                <textarea id="observaciones" name="observaciones" class="form-control" rows="6" placeholder="Ingresa tus observaciones, si lo deseas" style="width : 40em; heigth : 20em">{{$bitacora->observaciones}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fecha" class="col-form-label text-md-start">{{ __('Fecha de seguimiento') }}</label>
                            <div class="col-md-6">
                                <input id="fecha_segumiento" type="date" class="form-control " name="fecha_seguimiento" value="{{$bitacora->fecha_seguimiento}}" >
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2 d-md-flex" style="justify-content: center; margin-top: 2em; margin-bottom: 2em">
                                <button type="submit" class="btn btn-warning" style="text-decoration: none; color: black">Actualizar observaciones</button>
                            </div>
                        </div>
                    </div>
                   </form>
                    {{--<div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-danger">
                                <a id="regresarbita" href="{{url("bitacoras","$bitacora->id_bitacora")}}" style="text-decoration: none; color: black">Cancelar</a>
                            </button>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

