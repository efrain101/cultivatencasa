@extends('catalogos.catalogo')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a id="btnvolver" class="button" href="{{url("cultivos")}}" title="Regresar"></a>
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
        <title>Cultivos</title>

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
        <h1 id="titulocultivos" style="text-align: center" ><MARQUEE BEHAVIOR="ALTERNATE">Añadir cultivo</MARQUEE></h1>
    </div>


    <div class="container">
        <form id="formucultivos" action="{{url("cultivos")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row" >
                    <div class="col-3" style="color: blue;font-family: 'Arial Black'; margin-left: 12em">
                        <div>
                            <label>Nombre</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Ambiente</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Tipo de siembra</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Temperatura requerida</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Humedad del suelo requerida</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Temporada de producción</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Periodo de crecimiento</label>
                        </div>
                        <div>
                            <label style="margin-top: 3em">Seleccionar una imagen</label>
                        </div>
                    </div>

                    <div class="col-4" style="font-family: 'Arial Black'">
                        <input type="text"  name="nombre" class="form-control" placeholder="nombre">

                        <select name="id_ambiente" class="form-control @error('id_ambiente') is-invalid @enderror" name="id_ambiente"  style="margin-top: 2em">
                            @foreach($ambientes as $ambiente)
                                <option value="{{$ambiente['id_ambiente']}}">{{$ambiente['tipo']}}</option>
                            @endforeach
                        </select>

                        <select name="id_tipo_siembra" class="form-control @error('id_tipo_siembra') is-invalid @enderror" name="id_tipo_siembra"  style="margin-top: 2em">
                            @foreach($tipossiembras as $tiposiembra)
                                <option value="{{$tiposiembra['id_tipo_siembra']}}">{{$tiposiembra['nombre']}}</option>
                            @endforeach
                        </select>

                        <select name="id_temperatura" class="form-control @error('id_temperatura') is-invalid @enderror" name="id_temperatura"  style="margin-top: 2em">
                            @foreach($temperaturas as $temperatura)
                                <option value="{{$temperatura['id_temperatura']}}">{{$temperatura['valor_minimo']}}° - {{$temperatura['valor_maximo']}}°</option>
                            @endforeach
                        </select>

                        <select name="id_humedad" class="form-control @error('id_humedad') is-invalid @enderror" name="id_humedad"  style="margin-top: 2em">
                            @foreach($humedades as $humedad)
                                <option value="{{$humedad['id_humedad']}}">{{$humedad['valor_minimo']}} bares - {{$humedad['valor_maximo']}} bares</option>
                            @endforeach
                        </select>

                        <select name="id_temporada" class="form-control @error('id_temporada') is-invalid @enderror" name="id_temporada"  style="margin-top: 2em">
                            @foreach($temporadas as $temporada)
                                <option value="{{$temporada['id_temporada']}}">{{$temporada['fecha_inicio']}} - {{$temporada['fecha_fin']}}</option>
                            @endforeach
                        </select>

                        <select name="id_periodo" class="form-control @error('id_periodo') is-invalid @enderror" name="id_periodo"  style="margin-top: 2em">
                            @foreach($periodos as $periodo)
                                <option value="{{$periodo['id_periodo']}}">{{$periodo['rango_menor']}} - {{$periodo['rango_mayor']}} semanas </option>
                            @endforeach
                        </select>

                        <input type="file" name="imagen" class="form-control"  style="margin-top: 2.5em"/>


                        <div class="d-grid gap-2 d-md-flex" style="justify-content: center; margin-top: 2em; margin-bottom: 2em">
                            <button type="submit" class="btn btn-info" style="color: darkblue;font-family: 'Apple'"><b>Registrar</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
