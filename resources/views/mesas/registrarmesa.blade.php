@extends('layouts.app2')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{url("mesas")}}" style="font-size: large" title="Regresar"> <b><<</b></a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Agregar nueva mesa de cultivo</title>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset("css/open-iconic-bootstrap.css")}}">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
        <script src="path/to/dist/feather.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    </head>

    <div>
        <h1 id="tituloagmesa" style="text-align: center" >Añadir nueva mesa de cultivo</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agregar nueva mesa de cutivo') }}</div>

                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="card-body">
                        <form id="formuagmes" action="{{url("mesas")}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Elige un nombre para tu mesa') }}</label>

                                <div class="col-md-6">
                                    <input type="text"  name="nombre" class="form-control" placeholder="Elige un nombre para tu mesa">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_sustrato" class="col-md-4 col-form-label text-md-end">{{ __('Elige un sustrato para tu mesa') }}</label>

                                <div class="col-md-6">
                                    <select id="id_sustrato" class="form-control @error('id_sustrato') is-invalid @enderror" name="id_sustrato">
                                        @foreach($sustratos as $sustrato)
                                            <option value="{{$sustrato['id_sustrato']}}">{{$sustrato['nombre']}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_cultivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_dimension" class="col-md-4 col-form-label text-md-end">{{ __('Elige una dimensión para tu mesa') }}</label>

                                <div class="col-md-6">
                                    <select id="id_dimension" class="form-control @error('id_dimension') is-invalid @enderror" name="id_dimension">
                                        @foreach($dimensiones as $dimensione)
                                            <option value="{{$dimensione['id_dimension']}}">{{$dimensione['altura']}} X {{$dimensione['ancho']}} X {{$dimensione['largo']}} CM</option>
                                        @endforeach
                                    </select>
                                    @error('id_dimension')
                                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="imagen" class="col-md-4 col-form-label text-md-end">{{ __('Elige una imagen para tu mesa') }}</label>

                                <div class="col-md-6">
                                    <input type="file" id="imagen" name="imagen" class="form-control" />
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Agregar mesa') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
