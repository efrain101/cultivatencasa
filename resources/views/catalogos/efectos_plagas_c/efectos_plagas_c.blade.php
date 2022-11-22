@extends('catalogos.catalogo')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a id="btnvolver" class="button" href="{{url("efectos_plagas_c")}}" title="Regresar"> </a>
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
        <title>Efectos de plagas</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="path/to/dist/feather.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    </head>

    <div>
        <h1 id="tituloefectospla" style="text-align: center" ><MARQUEE BEHAVIOR="ALTERNATE">Añadir efecto de plagas</MARQUEE></h1>
    </div>

    <nav class="navbar navbar-light float-left">
        <form class="form-inline">
            <table>
                <tr>
                    <td>
                        <input name="buscarefecto" class="form-control mr-sm-2" type="search" placeholder="Ingresa el efecto" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>


    <div class="container">
        <form id="formuefectospla" action="{{url("efectos_plagas_c")}}" method="post" >
            @csrf
            <div class="container">
                <div class="row" >
                    <div class="col-3" style="color: blue;font-family: 'Arial Black'; margin-top: 1em">
                        <div>
                            <label>Efecto</label>
                        </div>
                    </div>

                    <div style="font-family: 'Arial Black'">
                        <input type="text"  name="efecto" class="form-control" placeholder="efecto">
                        <div class="d-grid gap-2 d-md-flex" style="justify-content: center; margin-top: 2em; margin-bottom: 2em; width: 100%; height: 30%">
                            <button type="submit" class="btn btn-info" style="color: darkblue;font-family: 'Apple'"><b>Registrar</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
