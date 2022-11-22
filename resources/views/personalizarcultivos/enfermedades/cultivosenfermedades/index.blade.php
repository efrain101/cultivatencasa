@extends('personalizarcultivos.principalenfermedades')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: white" align="center">Enfermedades de los cultivos</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("cultivosenfermedades/create")}}" title="Registrar enfermedades de los cultivos">
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
                            <th>Enfermedad/es</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($cultivo->enfermedades as $enfermedade)
                            <tr>

                                <td>
                                    <ul>
                                        <li>
                                            {{$enfermedade->nombre}}
                                        </li>
                                    </ul>
                                </td>


                                @if(Auth::user()->tipo_usuario==1)
                                <td>
                                    <form action="{{url("cultivosenfermedades", $enfermedade->id_cul_enf)}}" method="POST">
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
        @foreach ($cultivosenfermedades as $cultivosenfermedade)
            <tr>

                <td>
                    @foreach($cultivos as $cultivo)
                        @if($cultivosenfermedade->id_cultivo==$cultivo->id_cultivo)
                            <b style="font-size: 25px; color: white">Cultivo: {{$cultivo->nombre}}<br></b>
                            <img src="{{asset($cultivo->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>
                <td>
                    <table >
                        <tr>
                            <th>Enfermedad</th>
                            @if(Auth::user()->tipo_usuario==1)
                            <th>Opciones</th>
                            @endif
                        </tr>
                        <tr >
                            <td>
                                @foreach($enfermedades as $enfermedad)
                                    @if($cultivosenfermedade->id_enfermedad==$enfermedad->id_enfermedad)
                                        {{$enfermedad->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            @if(Auth::user()->tipo_usuario==1)
                            <td>
                                <form action="{{url("cultivosenfermedades", $cultivosenfermedade->id_cul_enf)}}" method="POST">
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
