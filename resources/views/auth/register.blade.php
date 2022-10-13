@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrarse') }}</div>

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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ap" class="col-md-4 col-form-label text-md-end">{{ __('Apellido paterno') }}</label>

                                <div class="col-md-6">
                                    <input id="ap" type="text" class="form-control @error('ap') is-invalid @enderror" name="ap" value="{{ old('ap') }}" required autocomplete="ap" autofocus>

                                    @error('ap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="am" class="col-md-4 col-form-label text-md-end">{{ __('Apellido materno') }}</label>

                                <div class="col-md-6">
                                    <input id="am" type="text" class="form-control @error('am') is-invalid @enderror" name="am" value="{{ old('am') }}" required autocomplete="am" autofocus>

                                    @error('am')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="curp" class="col-md-4 col-form-label text-md-end">{{ __('CURP') }}</label>

                                <div class="col-md-6">
                                    <input id="curp" type="text" class="form-control @error('curp') is-invalid @enderror" name="curp" value="{{ old('curp') }}" required autocomplete="curp" autofocus>

                                    @error('curp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                                <div class="col-md-6">
                                    <select id="id_estado" class="form-control @error('id_estado') is-invalid @enderror" name="id_estado">
                                        @foreach($estados as $estado)
                                            <option value="{{$estado['id_estado']}}">{{$estado['estado']}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--el combo de municipios y localidades los deje vacio para que se llenen automaticamente con el script--}}
                            <div class="row mb-3">
                                <label for="id_municipio" class="col-md-4 col-form-label text-md-end">{{ __('Municipio') }}</label>

                                <div class="col-md-6">
                                    <select id="id_municipio" class="form-control @error('id_municipio') is-invalid @enderror" name="id_municipio" required autocomplete="id_municipio" autofocus>

                                    </select>
                                    @error('id_municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_localidad" class="col-md-4 col-form-label text-md-end">{{ __('Localidad') }}</label>

                                <div class="col-md-6">
                                    <select id="id_localidad" class="form-control @error('id_localidad') is-invalid @enderror" name="id_localidad" required autocomplete="id_localidad" autofocus>

                                    </select>
                                    @error('id_localidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <script>
                                //Todo este script sirve para que cuando ya se eligio un estado muestre los municipios pertenecientes a ese estado
                                //posterior a ello ya elegido un municipio ahora muestra las localidades disponibles de ese municipio
                                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                                document.getElementById('id_estado').addEventListener('change',(e)=>{
                                    fetch('municipios',{
                                        method : 'POST',
                                        body: JSON.stringify({texto : e.target.value}),
                                        headers:{
                                            'Content-Type': 'application/json',
                                            "X-CSRF-Token": csrfToken
                                        }
                                    }).then(response =>{
                                        return response.json()
                                    }).then(data =>{
                                        var opciones = "<option value=''>Elige una opción</option>";
                                        for(let i in data.lista)
                                        {
                                            opciones+= '<option value="'+data.lista[i].id_municipio+'">'+data.lista[i].municipio+'</option>';
                                        }
                                        document.getElementById("id_municipio").innerHTML = opciones;
                                    }).catch(error=>console.error(error));
                                })

                                document.getElementById('id_municipio').addEventListener('change',(e)=>{
                                    fetch('localidades',{
                                        method : 'POST',
                                        body: JSON.stringify({texto : e.target.value}),
                                        headers:{
                                            'Content-Type': 'application/json',
                                            "X-CSRF-Token": csrfToken
                                        }
                                    }).then(response =>{
                                        return response.json()
                                    }).then(data =>{
                                        var opciones = "<option value=''>Elige una opción</option>";
                                        for(let i in data.lista)
                                        {
                                            opciones+='<option value="'+data.lista[i].id_localidad+'">'+data.lista[i].localidad+'</option>';
                                        }
                                        document.getElementById("id_localidad").innerHTML = opciones;
                                    }).catch(error=>console.error(error));
                                })
                            </script>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrarse') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





























