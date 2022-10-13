<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir cultivo a la mesa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/cultivosenmesas.css")}}">

</head>
<body>

<h1 id="nombre" align="center" >Añadir cultivo a la mesa</h1>

<div style="float: left; width: 50%">
    <table id="tabla">
        <tr>
            <td>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Añadir cultivo a la mesa') }}</div>

                                <div class="card-body">
                                    <form action="{{url("mesas_siembras/".$id_mesa_cultivo)}}" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="id_cultivo" class="col-md-4 col-form-label text-md-end">{{ __('Elige un cultivo para añadirlo a tu mesa') }}</label>
                                            <div class="col-md-6">
                                                <select id="id_cultivo" class="form-control @error('id_cultivo') is-invalid @enderror" name="id_cultivo" {{--onchange="ShowSelected();"--}}>
                                                    @foreach($cultivos as $cultivo)
                                                        <option value="{{$cultivo['id_cultivo']}}">{{$cultivo['nombre']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
 {{---                                      <script type="text/javascript">
                                            function ShowSelected() {
                                                /* Para obtener el valor */
                                                var cod = document.getElementById("id_cultivo").value;
                                                alert(cod);
                                                document.getElementById("prueba").value = cod;

                                                /* Para obtener el texto
                                                var combo = document.getElementById("id_cultivo");
                                                var selected = combo.options[combo.selectedIndex].text;
                                                alert(selected);
                                                document.getElementById("prueba2").value = selected;*/

                                                document.getElementById("botona").onclick = doFunction;
                                            }
                                        </script>

                                        <input type="text"  id="prueba" class="form-control" placeholder="El valor es">
--}}

                                        <div class="row mb-3">
                                            <label for="tamaño" class="col-md-4 col-form-label text-md-end">{{ __('Tamaño') }}</label>
                                            <div class="col-md-6">
                                                <select id="id_tamaño" class="form-control @error('id_tamaño') is-invalid @enderror" name="id_tamaño">
                                                    @foreach($tamaños as $tamaño)
                                                        <option value="{{$tamaño['id_tamaño']}}">{{$tamaño['tamaño']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fecha_siembra" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de siembra') }}</label>
                                            <div class="col-md-6">
                                                <input id="fecha_siembra" type="date" class="form-control " name="fecha_siembra" {{--value="{{$fechaactual->format('Y-m-d')}}" readonly--}}>
                                            </div>
                                        </div>

                                        {{--<div class="row mb-3">

                                            <div class="col-md-6" style="float: left; width: 60%">
                                                <label for="fecha_cosecha" class=" col-form-label text-md-end">{{ __('Fecha de cosecha esperada') }}</label>
                                                <input id="fecha_cosecha" type="date" class="form-control " name="fecha_cosecha" value="{{$diastotales->format('Y-m-d')}}" readonly>
                                            </div>

                                            <div style="float: right; width: 40%; margin-top: 20px">
                                                <form action="{{url("mesas_siembras")}}" method="post">
                                                    @csrf
                                                        <div >
                                                            <button type="submit" class="btn btn-warning">
                                                                {{ __('Calcular fecha de cosecha') }}
                                                            </button>
                                                        </div>
                                                </form>
                                            </div>

                                        </div>---}}


                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-success" >
                                                    {{ __('Añadir cultivo') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                    {{--
                                    <a href="{{url("mesas_siembras)}}" style="text-decoration: none; color: #0c63e4"><b><<</b></a>
                                    --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<div style="float: right; width: 50%">
    <h6 style="color: white" align="center; font-family: 'Baskerville Old Face';">Estos son algunas sugerencias de cultivos que puedes sembrar en la temporada actual</h6>
    <table style="color: black; font-family: 'Baskerville Old Face'; font-size: 15px; background: #FFD966; width: 90%">
        <tr >
            <th>Cultivo:</th>
            <th>Ambiente:</th>
            <th>Tipo de siembra:</th>
            <th>Rango de temperatura:</th>
            <th>Rango de humedad:</th>
            <th>Temporada de producción:</th>
            <th>Peridodo de crecimiento:</th>
        </tr>
        @foreach($cultivos_actuales as $cultivos_actuale)
            <tr>
                <td>
                    {{$cultivos_actuale->culnom}}
                    <img src="{{asset($cultivos_actuale->imagen)}}" style=" width: 70px; height: 70px; display: block; mairgn: auto">
                </td>
                <td>
                    {{$cultivos_actuale->tipo}}
                </td>
                <td>
                    {{$cultivos_actuale->tipsi}}
                </td>
                <td>
                    {{$cultivos_actuale->tempmin}}° - {{$cultivos_actuale->tempmax}}° C
                </td>
                <td>
                    {{$cultivos_actuale->humin}} - {{$cultivos_actuale->humax}} habs
                </td>
                <td>
                    {{$cultivos_actuale->fecha_inicio}} - {{$cultivos_actuale->fecha_fin}}
                </td>
                <td>
                    {{$cultivos_actuale->rango_menor}} - {{$cultivos_actuale->rango_mayor}} semanas
                </td>
            </tr>
        @endforeach
    </table>
</div>



<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
