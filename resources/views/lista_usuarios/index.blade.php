@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #FFFFFF" align="center">Lista de Usuarios</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <nav class="navbar navbar-light float-right" style="margin-top: 2em">
        <form class="form-inline" style="display: block; mairgn: auto">
            <table>
                <tr>
                    <td>
                        <input name="buscarnombre" class="form-control mr-sm-3" type="search" placeholder="Ingresa nombre" aria-label="Search">
                    </td>

                    <td>
                        <input name="buscarapellidop" class="form-control mr-sm-3" type="search" placeholder="Ingresa apellido paterno" aria-label="Search">
                    </td>

                    <td>
                        <input name="buscarapellidom" class="form-control mr-sm-3" type="search" placeholder="Ingresa apellido materno" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>

    <table class="table table-bordered table-responsive-lg">
        <tr style="color: #FFFFFF">
            <th>Nombre/s</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>CURP</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Localidad</th>
            <th>Correo</th>

        </tr>
        @foreach ($users as $user)
            <tr style="color: #FFFFFF">
                <td>{{$user->name}}</td>
                <td>{{$user->ap}}</td>
                <td>{{$user->am}}</td>
                <td>{{$user->curp}}</td>
                <td>{{$user->telefono}}</td>
                <td>
                    @foreach($estados as $estado)
                        @if($user->id_estado==$estado->id_estado)
                            {{$estado->estado}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($municipios as $municipio)
                        @if($user->id_municipio==$municipio->id_municipio)
                            {{$municipio->municipio}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($localidades as $localidade)
                        @if($user->id_localidad==$localidade->id_localidad)
                            {{$localidade->localidad}}
                        @endif
                    @endforeach
                </td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>

@endsection
