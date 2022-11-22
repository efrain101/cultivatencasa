@extends('personalizarcultivos.personalizar')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: white" align="center">Mantenimientos de los cultivos</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("culman/create")}}" title="Registrar mantenimientos de los cultivos">
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
                            <th>Mantenimiento/s</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($cultivo->mantenimientos as $mantenimiento)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$mantenimiento->descripcion}}
                                        </li>
                                    </ul>
                                </td>

                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("culman", $mantenimiento->id_cul_man)}}" method="POST">
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
    <table class="table table-striped table-dark" style="width: 40%; margin: 0 auto">
        @foreach ($culman as $culman)
            <tr>

                <td>
                    @foreach($cultivos as $cultivo)
                        @if($culman->id_cultivo==$cultivo->id_cultivo)
                            <b style="font-size: 25px; color: white">Cultivo: {{$cultivo->nombre}}<br></b>
                            <img src="{{asset($cultivo->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>
                <td>
                    <table >
                        <tr>
                            <th>Mantenimiento</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($mantenimientos as $mantenimiento)
                                    @if($culman->id_mantenimiento==$mantenimiento->id_mantenimiento)
                                        {{$mantenimiento->descripcion}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("culman", $culman->id_cul_man)}}" method="POST">
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
