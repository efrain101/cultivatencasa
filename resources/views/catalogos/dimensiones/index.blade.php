@extends('catalogos.catalogo')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #000000" align="center">Lista de dimensiones de las mesas de cultivo</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a class="button" href="{{url("dimensiones/create")}}" title="Registrar dimensones de las mesas"> <i class="fas fa-plus-circle"></i>
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
                        <input name="buscaraltura" class="form-control mr-sm-2" type="search" placeholder="Buscar altura" aria-label="Search">
                    </td>

                    <td>
                        <input name="buscarancho" class="form-control mr-sm-2" type="search" placeholder="Buscar ancho" aria-label="Search">
                    </td>

                    <td>
                        <input name="buscarlargo" class="form-control mr-sm-2" type="search" placeholder="Buscar largo" aria-label="Search">
                    </td>

                    <td>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                    </td>
                </tr>
            </table>
        </form>
    </nav>


    <table class="table table-bordered table-responsive-lg" style="margin-top: 1em" >
        <tr>
            <th>Altura</th>
            <th>Ancho</th>
            <th>Largo</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($dimensiones as $dimensione)
            <tr>
                <td>{{$dimensione->altura}}</td>
                <td>{{$dimensione->ancho}}</td>
                <td>{{$dimensione->largo}}</td>
                @if(Auth::user()->tipo_usuario==1)
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{url("dimensiones", $dimensione->id_dimension)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="button" style="border-radius: 5px">
                                            <i class="bi-trash-fill" style="font-size: 1.4rem; color: red"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="button" href="{{url("dimensiones",$dimensione->id_dimension)."/edit"}}">
                                        <i class="bi-pencil-fill" style="font-size: 1.7rem; color: yellow; border-radius: 5px"></i>
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
