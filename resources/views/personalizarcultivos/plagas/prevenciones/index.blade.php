@extends('personalizarcultivos.principalplagas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #ffffff" align="center">Prevenciones de las plagas</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("prevencionesplagas/create")}}" title="Registrar prevenciones de las plagas">
                +</a>
            </div>
            @endif
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
                        <input name="buscarplaga" class="form-control mr-sm-2" type="search" placeholder="Ingresa alguna plaga" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>

    <table class="table table-striped table-dark" style="width: 60%; margin: 0 auto">
        @foreach ($plagas as $plaga)
            <tr>
                <td>
                    <b style="font-size: 25px; color: white">Plaga: {{$plaga->nombre}}<br></b>
                    <img src="{{asset($plaga->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                </td>

                <td>

                    <table>
                        <tr>
                            <th>Prevención/es</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($plaga->prevenciones as $prevencione)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$prevencione->prevencion}}
                                        </li>
                                    </ul>
                                </td>

                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("prevencionesplagas", $prevencione->id_plaga_prevencion)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button id="btneliminar" class="btn btn-danger"><b>X</b></button>
                                    </form>
                                </td>
                                @endif

                            </tr>
                        @endforeach
                    </table>

                </td>
        @endforeach

    </table>

    {{--
    <table class="table table-striped table-dark" style="width: 60%; margin: 0 auto">
        @foreach ($prevencionesplagas as $prevencionesplaga)
            <tr>

                <td>
                    @foreach($plagas as $plaga)
                        @if($prevencionesplaga->id_plaga==$plaga->id_plaga)
                            <b style="font-size: 25px; color: white">Plaga: {{$plaga->nombre}}<br></b>
                            <img src="{{asset($plaga->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>

                <td>
                    <table >
                        <tr>
                            <th>Prevenciones</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($prevenciones as $prevencione)
                                    @if($prevencionesplaga->id_prevencion_plaga==$prevencione->id_prevencion_plaga)
                                        {{$prevencione->prevencion}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("prevencionesplagas", $prevencionesplaga->id_plaga_prevencion)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button id="btneliminar" class="btn btn-danger"><b>X</b></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    </table>
                </td>
            </tr>
        @endforeach

    </table>
--}}
@endsection
