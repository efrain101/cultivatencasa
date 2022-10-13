@extends('catalogos.catalogo')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #000000" align="center">Lista de Humedades</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="button" href="{{url("humedades/create")}}" title="Registrar temperatura"> <i class="fas fa-plus-circle"></i>
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


    <nav class="navbar navbar-light float-right" style="margin-top: 2em">
        <form class="form-inline" style="display: block; mairgn: auto">
            <table>
                <tr>
                    <td>
                        <input name="buscarvalorminimo" class="form-control mr-sm-2" type="search" placeholder="Buscar por valor mínimo" aria-label="Search">
                    </td>

                    <td>
                        <input name="buscarvalormaximo" class="form-control mr-sm-2" type="search" placeholder="Buscar por valor máximo" aria-label="Search">
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
            <th>Valor mínimo</th>
            <th>Valor máximo</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($humedades as $humedades)
            <tr>
                <td>{{$humedades->valor_minimo}}</td>
                <td>{{$humedades->valor_maximo}}</td>
                @if(Auth::user()->tipo_usuario==1)
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{url("humedades", $humedades->id_humedad)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="button" style="background: black; border-radius: 5px">
                                            <i class="bi-trash-fill" style="font-size: 1.4rem; color: red"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="button" href="{{url("humedades",$humedades->id_humedad)."/edit"}}">
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
