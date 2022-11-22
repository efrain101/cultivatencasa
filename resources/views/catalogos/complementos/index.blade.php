@extends('catalogos.catalogo')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #000000" align="center">Lista de Complementos</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a id="btnañadir" class="button" href="{{url("complementos/create")}}" title="Registrar complemento"> <i class="fas fa-plus-circle"></i>
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
                        <input name="buscarnombre" class="form-control mr-sm-3" type="search" placeholder="Buscar por nombre" aria-label="Search">
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
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($complementos as $complemento)
            <tr>
                <td>{{$complemento->nombre}}</td>

                <td>
                    @foreach($tipos as $tipo)
                        @if($complemento->id_tipo==$tipo->id_tipo)
                            {{$tipo->nombre}}
                        @endif
                    @endforeach
                </td>

                <td>{{$complemento->descripcion}}</td>

                <td>
                    @foreach($cantidades as $cantidade)
                        @if($complemento->id_cantidad==$cantidade->id_cantidad)
                            {{$cantidade->cantidad}}
                        @endif
                    @endforeach
                </td>

                @if(Auth::user()->tipo_usuario==1)
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{url("complementos", $complemento->id_complemento)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="button" style=" border-radius: 5px">
                                            <i class="bi-trash-fill" style="font-size: 1.4rem; color: red"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="button" href="{{url("complementos",$complemento->id_complemento)."/edit"}}">
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
