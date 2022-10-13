@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #FFFFFF" align="center"><b>Cultivos</b></h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <nav class="navbar navbar-light float-left">
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


<div class="container">
    <div class="card-group">

    @foreach ($cultivos as $cultivo)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset($cultivo->imagen)}}" alt="Card image cap" width="200px" height="200px">

            <div class="card-body">

                <h5 class="card-title"><b style="color: #0c63e4">Cultivo: {{$cultivo->nombre}}</b></h5>

                <div>
                    <b style="font-size: 15px; color: darkblue">Ambiente:</b>
                    @foreach($ambientes as $ambiente)
                        @if($cultivo->id_ambiente==$ambiente->id_ambiente)
                            {{$ambiente->tipo}}
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Tipo de siembra:</b>
                    @foreach($tipossiembras as $tipossiembra)
                        @if($cultivo->id_tipo_siembra==$tipossiembra->id_tipo_siembra)
                            {{$tipossiembra->nombre}}
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Temperatura requerida:</b>
                    @foreach($temperaturas as $temperatura)
                        @if($cultivo->id_temperatura==$temperatura->id_temperatura)
                            {{$temperatura->valor_minimo}}° - {{$temperatura->valor_maximo}}°
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Humedad del suelo requerida:</b>
                    <br>
                    @foreach($humedades as $humedad)
                        @if($cultivo->id_humedad==$humedad->id_humedad)
                            {{$humedad->valor_minimo}} bares - {{$humedad->valor_maximo}} bares
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Temporada de producción:</b>
                    <br>
                    @foreach($temporadas as $temporada)
                        @if($cultivo->id_temporada==$temporada->id_temporada)
                            {{$temporada->fecha_inicio}} - {{$temporada->fecha_fin}}
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Periodo de crecimiento:</b>
                    <br>
                    @foreach($periodos as $periodo)
                        @if($cultivo->id_periodo==$periodo->id_periodo)
                            {{$periodo->rango_menor}} - {{$periodo->rango_mayor}} semanas
                        @endif
                    @endforeach
                </div>

                <div>
                    <b style="font-size: 15px; color: darkblue">Plaga/s</b>
                        @foreach($cultivo->plagas as $plaga)
                                    <ul>
                                        <li>
                                            {{$plaga->nombre}}
                                        </li>
                                    </ul>
                        @endforeach
                </div>

                <div>
                   <b style="font-size: 15px; color: darkblue">Enfermedad/es</b>
                        @foreach($cultivo->enfermedades as $enfermedade)
                                    <ul>
                                        <li>
                                            {{$enfermedade->nombre}}
                                        </li>
                                    </ul>
                        @endforeach
                </div>

                <div>
                   <b style="font-size: 15px; color: darkblue">Complemento/s</b>
                        @foreach($cultivo->complementos as $complemento)
                                    <ul>
                                        <li>
                                            {{$complemento->nombre}}
                                        </li>
                                    </ul>
                        @endforeach
                </div>

                <div>
                   <b style="font-size: 15px; color: darkblue">Mantenimiento/s</b>
                        @foreach($cultivo->mantenimientos as $mantenimiento)
                                    <ul>
                                        <li>
                                            {{$mantenimiento->descripcion}}
                                        </li>
                                    </ul>
                        @endforeach
                </div>

            </div>
        </div>
    @endforeach

    </div>
</div>

    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Mostrar información
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>--}}

@endsection

