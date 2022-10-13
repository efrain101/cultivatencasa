@extends('catalogos.catalogo')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #000000" align="center">Lista de Cultivos</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="button" href="{{url("cultivos/create")}}" title="Registrar cultivo"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
            @endif
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <nav class="navbar navbar-light float-left" style="margin-top: 2em">
        <form class="form-inline" style="display: block; mairgn: auto">
            <table>
                <tr>
                    <td>
                        <input name="buscarnombre" class="form-control mr-sm-2" type="search" placeholder="Ingresa el nombre" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Nombre</th>
            <th>Ambiente</th>
            <th>Tipo de siembra</th>
            <th>Temperatura requerida</th>
            <th>Humedad del suelo requerida</th>
            <th>Temporada de producción</th>
            <th>Periodo de crecimiento</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($cultivos as $cultivo)
            <tr>
                <td>
                    {{$cultivo->nombre}}
                    <br>
                    <img src="{{asset($cultivo->imagen)}}" class="img-fluid img-thumbnail" width="100px" height="100px">
                </td>

                <td>
                    @foreach($ambientes as $ambiente)
                        @if($cultivo->id_ambiente==$ambiente->id_ambiente)
                            {{$ambiente->tipo}}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($tipossiembras as $tipossiembra)
                        @if($cultivo->id_tipo_siembra==$tipossiembra->id_tipo_siembra)
                            {{$tipossiembra->nombre}}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($temperaturas as $temperatura)
                        @if($cultivo->id_temperatura==$temperatura->id_temperatura)
                            {{$temperatura->valor_minimo}}° - {{$temperatura->valor_maximo}}°
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($humedades as $humedad)
                        @if($cultivo->id_humedad==$humedad->id_humedad)
                            {{$humedad->valor_minimo}} bares - {{$humedad->valor_maximo}} bares
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($temporadas as $temporada)
                        @if($cultivo->id_temporada==$temporada->id_temporada)
                            {{$temporada->fecha_inicio}} - {{$temporada->fecha_fin}}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($periodos as $periodo)
                        @if($cultivo->id_periodo==$periodo->id_periodo)
                            {{$periodo->rango_menor}} - {{$periodo->rango_mayor}} semanas
                        @endif
                    @endforeach
                </td>

                @if(Auth::user()->tipo_usuario==1)
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{url("cultivos", $cultivo->id_cultivo)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="button" style="background: black; border-radius: 5px">
                                            <i class="bi-trash-fill" style="font-size: 1.4rem; color: red"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="button" href="{{url("cultivos",$cultivo->id_cultivo)."/edit"}}">
                                        <i class="bi-pencil-fill" style="font-size: 1.7rem; color: yellow; background: black; border-radius: 5px"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>

@endsection
