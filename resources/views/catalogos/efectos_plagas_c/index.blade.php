@extends('catalogos.catalogo')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #000000" align="center">Lista de efectos de las plagas</h2>
            </div>
            @if(Auth::user()->tipo_usuario==1)
            <div class="pull-right">
                <a class="button" href="{{url("efectos_plagas_c/create")}}" title="Registrar efecto de plaga"> <i class="fas fa-plus-circle"></i>
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

    <nav class="navbar navbar-light float-left" style="margin-top: 2em">
        <form class="form-inline" style="display: block; mairgn: auto">
            <table>
                <tr>
                    <td>
                        <input name="buscarefecto" class="form-control mr-sm-2" type="search" placeholder="Ingresa el efecto" aria-label="Search">
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
            {{--<th>Plaga</th>--}}
            <th>Efecto</th>
            @if(Auth::user()->tipo_usuario==1)
            <th>Acciones</th>
            @endif
        </tr>
        @foreach ($efectos_plagas_c as $efectos_plagas_c)
            <tr>

                {{--<td>
                    @foreach($efectosplagas as $efectosplaga)
                        @if($efectosplaga->id_plaga_efecto==$efectoPlagasc->id_efecto_plaga)
                            @foreach($plagas as $plaga)
                                @if($plaga->id_plaga==$efectosplaga->id_plaga)
                                    {{$plaga->nombre}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>--}}

                <td>{{$efectos_plagas_c->efecto}}</td>

                @if(Auth::user()->tipo_usuario==1)
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{url("efectos_plagas_c", $efectos_plagas_c->id_efecto_plaga)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="button" style="background: black; border-radius: 5px">
                                            <i class="bi-trash-fill" style="font-size: 1.4rem; color: red"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="button" href="{{url("efectos_plagas_c",$efectos_plagas_c->id_efecto_plaga)."/edit"}}">
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
