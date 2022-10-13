@extends('catalogos.catalogo')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a id="btnvolver" class="button" href="{{url("complementos")}}" title="Regresar"> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Complementos</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="path/to/dist/feather.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="stylesheet" href="{{asset("css/stylecomplementos.css")}}">

    </head>

    <div>
        <h1 id="titulocomplementos" style="text-align: center" ><MARQUEE BEHAVIOR="ALTERNATE">Añadir complemento</MARQUEE></h1>
    </div>


    <div class="container">
        <form id="formucomplementos" action="{{url("complementos")}}" method="post" >
            @csrf
            <div class="container">
                <div class="row" >
                    <div class="col-3" style="color: blue;font-family: 'Arial Black'">
                        <div>
                            <label style="margin-top: 2em">Nombre</label>
                        </div>
                        <div>
                            <label style="margin-top: 1.5em">Tipo</label>
                        </div>
                        <div>
                            <label style="margin-top: 1.5em">Descripción</label>
                        </div>
                        <div>
                            <label style="margin-top: 9em">Cantidad</label>
                        </div>
                    </div>

                    <div class="col-4" style="font-family: 'Arial Black'">
                        <input type="text"  name="nombre" class="form-control" placeholder="nombre" style="margin-top: 1em">

                        <select name="id_tipo" class="form-control @error('id_tipo') is-invalid @enderror" name="id_tipo"  style="margin-top: 1em">
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo['id_tipo']}}">{{$tipo['nombre']}}</option>
                            @endforeach
                        </select>

                        <textarea name="descripcion"  placeholder="descripcion" style="WIDTH: 500px; HEIGHT: 150px; margin-top: 1em"></textarea>


                        <select name="id_cantidad" class="form-control @error('id_cantidad') is-invalid @enderror" name="id_cantidad"  style="margin-top: 1em">
                            @foreach($cantidades as $cantidades)
                                <option value="{{$cantidades['id_cantidad']}}">{{$cantidades['cantidad']}}</option>
                            @endforeach
                        </select>

                        <div class="d-grid gap-2 d-md-flex" style="justify-content: center; margin-top: 2em; margin-bottom: 2em">
                            <button type="submit" class="btn btn-info" style="color: darkblue;font-family: 'Apple'"><b>Registrar</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
