@extends('personalizarcultivos.principalplagas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #ffffff" align="center">Efectos de las plagas</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("efectosplagas/create")}}" title="Registrar efectos de las plagas">
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
                            <th>Efecto/s</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($plaga->efectos as $efecto)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$efecto->efecto}}
                                        </li>
                                    </ul>
                                </td>

                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("efectosplagas", $efecto->id_plaga_efecto)}}" method="POST">
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
        @foreach ($efectosplagas as $efectoplaga)
            <tr>

                <td>
                    @foreach($plagas as $plaga)
                        @if($efectoplaga->id_plaga==$plaga->id_plaga)
                            <b style="font-size: 25px; color: white">Plaga: {{$plaga->nombre}}<br></b>
                            <img src="{{asset($plaga->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>


                <td>
                    <table >
                        <tr>
                            <th>Efectos</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($efectos as $efecto)
                                    @if($efectoplaga->id_efecto_plaga==$efecto->id_efecto_plaga)
                                        {{$efecto->efecto}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("efectosplagas", $efectoplaga->id_plaga_efecto)}}" method="POST">
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
