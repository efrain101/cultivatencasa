@extends('personalizarcultivos.principalenfermedades')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #ffffff" align="center">Erradicaciones de las enfermedades</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="btn btn-primary" href="{{url("erradicacionesenfermedades/create")}}" title="Registrar prevenciones de las enfermedades">
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
                        <input name="buscarenfe" class="form-control mr-sm-2" type="search" placeholder="Ingresa alguna enfermedad" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>

    <table class="table table-striped table-dark" style="width: 60%; margin: 0 auto">
        @foreach ($enfermedades as $enfermedade)
            <tr>
                <td>
                    <b style="font-size: 25px; color: white">Enfermedad: {{$enfermedade->nombre}}<br></b>
                    <img src="{{asset($enfermedade->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                </td>

                <td>

                    <table>
                        <tr>
                            <th>Erradicación/es</th>
                            @if(Auth::user()->tipo_usuario==1)
                                <th>Opciones</th>
                            @endif
                        </tr>
                        @foreach($enfermedade->erradicaciones as $erradicacione)
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
                                    <form action="{{url("erradicacionesenfermedades", $erradicacione->id_enfermedad_erradicacion)}}" method="POST">
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
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Enfermedad</th>
            <th>Erradicación</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($erradicacionesenfermedades as $erradicacionesenfermedade)
            <tr>

                <td>
                    @foreach($enfermedades as $enfermedad)
                        @if($erradicacionesenfermedade->id_enfermedad==$enfermedad->id_enfermedad)
                            {{$enfermedad->nombre}}
                            <br>
                            <img src="{{asset($enfermedad->imagen)}}" class="img-fluid img-thumbnail" width="200px" height="200px">
                        @endif
                    @endforeach
                </td>


                <td>
                    @foreach($erradicaciones as $erradicacione)
                        @if($erradicacionesenfermedade->id_erradicacion_enfermedad==$erradicacione->id_erradicacion_enfermedad)
                            {{$erradicacione->erradicacion}}
                        @endif
                    @endforeach
                </td>

                @if(Auth::user()->tipo_usuario==1)
                <td>
                    <form action="{{url("erradicacionesenfermedades", $erradicacionesenfermedade->id_enfermedad_erradicacion)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button id="btneliminar" class="btn btn-danger"><b>X</b></button>
                    </form>
                </td>
                @endif
            </tr>
        @endforeach

    </table>
--}}
@endsection
