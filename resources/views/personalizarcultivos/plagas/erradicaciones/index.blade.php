@extends('personalizarcultivos.principalplagas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #ffffff" align="center">Erradicaciones de las plagas</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("erradicacionesplagas/create")}}" title="Registrar prevenciones de las plagas">
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
                            <th>Erradicación/es</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($plaga->erradicaciones as $erradicacione)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$erradicacione->erradicacion}}
                                        </li>
                                    </ul>
                                </td>

                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("erradicacionesplagas", $erradicacione->id_plaga_erradicacion)}}" method="POST">
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
        @foreach ($erradicacionesplagas as $erradicacionesplaga)
            <tr>

                <td>
                    @foreach($plagas as $plaga)
                        @if($erradicacionesplaga->id_plaga==$plaga->id_plaga)
                            <b style="font-size: 25px; color: white">Plaga: {{$plaga->nombre}}<br></b>
                            <img src="{{asset($plaga->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>

                <td>
                    <table >
                        <tr>
                            <th>Erradicaciones</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($erradicaciones as $erradicacione)
                                    @if($erradicacionesplaga->id_erradicacion_plaga==$erradicacione->id_erradicacion_plaga)
                                        {{$erradicacione->erradicacion}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("erradicacionesplagas", $erradicacionesplaga->id_plaga_erradicacion)}}" method="POST">
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
