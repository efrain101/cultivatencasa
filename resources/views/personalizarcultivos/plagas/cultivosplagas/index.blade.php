@extends('personalizarcultivos.principalplagas')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: white" align="center">Plagas de los cultivos</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("cultivosplagas/create")}}" title="Registrar plagas de los cultivos">
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
                        <input name="buscarnombre" class="form-control mr-sm-2" type="search" placeholder="Ingresa nombre de cultivo" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>

    <table class="table table-striped table-dark" style="width: 60%; margin: 0 auto">
        @foreach ($cultivos as $cultivo)
            <tr>
                <td>
                    <b style="font-size: 25px; color: white">Cultivo: {{$cultivo->nombre}}<br></b>
                    <img src="{{asset($cultivo->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                </td>

                <td>

                        <table>
                            <tr>
                                <th>Plaga/s</th>
                                @if(Auth::user()->tipo_usuario==1)
                                    <th>Opciones</th>
                                @endif
                            </tr>
                            @foreach($cultivo->plagas as $plaga)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$plaga->nombre}}
                                        </li>
                                    </ul>
                                </td>

                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("cultivosplagas", $plaga->id_cul_pla)}}" method="POST">
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
            {{--
            <tr>

                <td>
                    @foreach($cultivos as $cultivo)
                        @if($cultivosplaga->id_cultivo==$cultivo->id_cultivo)
                            <b style="font-size: 25px; color: white">Cultivo: {{$cultivo->nombre}}<br></b>
                            <img src="{{asset($cultivo->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>
                <td>
                    <table >
                        <tr>
                            <th>Plagas</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($plagas as $plaga)
                                    @if($cultivosplaga->id_plaga==$plaga->id_plaga)
                                        {{$plaga->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("cultivosplagas", $cultivosplaga->id_cul_pla)}}" method="POST">
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
            --}}
        @endforeach

    </table>

@endsection
