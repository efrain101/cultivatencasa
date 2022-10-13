@extends(Auth::user()->tipo_usuario==1?'layouts.app':'layouts.app2')

@section('content')

    <div>
        <table id="tabla" border="0">
            <tr>
                <td align="center" colspan="2">
                    <div id="titulo2" ><h1>Cultivate en casa</h1></div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <div id="vacio" ><h1>...</h1></div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <div id="vaciodos" ><h1>...</h1></div>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div id="bienvenido2"><h1>Bienvenid@</h1></div>
                </td>
                <td rowspan="3">
                    <img class="im" src="{{asset("img/logo.jpg")}}">
                </td>
            </tr>
            <tr>
                <td>
                    <div id="frase2">Ayudando al medio ambiente te ayudas a ti mismo</div>
                </td>
            </tr>
        </table>
    </div>
@endsection
