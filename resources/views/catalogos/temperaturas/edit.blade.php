@extends('catalogos.catalogo')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a id="btnvolver" class="button" href="{{url("temperaturas")}}" title="Regresar"> </a>
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
        <title>Temperaturas</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="path/to/dist/feather.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <link rel="stylesheet" href="{{asset("css/styletemperaturas.css")}}">
    </head>

    <div>
        <h1 id="titulotemperaturas" style="text-align: center" ><MARQUEE BEHAVIOR="ALTERNATE">Editar temperatura</MARQUEE></h1>
    </div>

    <div class="container">
        <form action="{{url("temperaturas",$temperatura->id_temperatura)}}" method="POST">
            @csrf
            <div class="container">
                @method("PUT")
                <div class="row" >
                    <div class="col-3" style="color: blue;font-family: 'Arial Black'">
                        <div>
                            <label style="margin-top: 2em">Valor mínimo</label>
                        </div>
                        <div>
                            <label style="margin-top: 2em">Valor máximo</label>
                        </div>
                    </div>

                    <div class="col-4" style="font-family: 'Arial Black'">

                        <input type="range" min="1" max="100" step="1" name="valor_minimo" style="margin-top: 2em" value="{{$temperatura->valor_minimo}}" oninput="this.nextElementSibling.value = this.value">
                        <output>{{$temperatura->valor_minimo}}</output>

                        <br>

                        <input type="range" min="1" max="100" step="1" name="valor_maximo" style="margin-top: 2.5em" value="{{$temperatura->valor_maximo}}" oninput="this.nextElementSibling.value = this.value">
                        <output>{{$temperatura->valor_maximo}}</output>

                        <div class="d-grid gap-2 d-md-flex" style="justify-content: center; margin-top: 2em; margin-bottom: 2em">
                            <button type="submit" class="btn btn-info" style="color: darkblue;font-family: 'Apple'"><b>Actualizar</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
