@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: white" align="center"><b>Estas son las mesas de cultivo con que cuentas</b></h2>
            </div>
            <div class="pull-right">
                <a style="text-decoration: none; color: orange; font-size: 20px" id="btnañadir" class="button" href="{{url("mesas/create")}}" title="Registrar mesa"> Añadir mesa +
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="container">
        <div class="card-group">

            @foreach ($mesas as $mesa)
                <div class="card" style="width: 18rem;">
                    {{--Mostrara el enlace de notificaciones de las mesas--}}
                    {{---<form action="{{url("notificaciones/{$mesa->id_mesa_cultivo}")}}" method="get">
                        @csrf
                        <button class="button" style="background: white; float: right">
                            <i class="bi-chat-dots-fill" style="font-size: 1.2rem; color: red"></i>
                        </button>
                    </form>--}}

                    <a href="{{route('notificacion',$mesa->id_mesa_cultivo)}}"><i class="bi-chat-dots-fill" style="font-size: 1.2rem; color: red; float: right"></i></a>

                    {{--Mostrara las mesas--}}
                    <img class="card-img-top" src="{{asset($mesa->imagen)}}" alt="Card image cap" width="200px" height="200px">
                    <div class="card-body">

                        <h5 class="card-title"><b style="color: #0c63e4">{{$mesa->nombre}}</b></h5>

                        <div>
                            <b style="font-size: 15px; color: darkblue">Sustrato:</b>
                            @foreach($sustratos as $sustrato)
                                @if($mesa->id_sustrato==$sustrato->id_sustrato)
                                    {{$sustrato->nombre}}
                                @endif
                            @endforeach
                        </div>

                        <div>
                            <b style="font-size: 15px; color: darkblue">Dimensión:</b>
                            @foreach($dimensiones as $dimension)
                                @if($mesa->id_dimension==$dimension->id_dimension)
                                    {{$dimension->altura}} x {{$dimension->ancho}} X {{$dimension->largo}} CM
                                @endif
                            @endforeach
                        </div>

                        <div>
                            <table>
                                <tr>
                                    <td style="float: left">
                                        <form action="{{url("mesas", $mesa->id_mesa_cultivo)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button id="btneliminar" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>

                                    <td style="float: right">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        <a id="btnactualizar" class="btn btn-warning" href="{{url("mesas",$mesa->id_mesa_cultivo)."/edit"}}">
                                            Editar</a>
                                    </td>
                                </tr>
                            </table>

                                <a href="{{url("mesas_siembras/{$mesa->id_mesa_cultivo}")}}" id="administrarmesas" class="btn btn-primary">Administrar</a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
