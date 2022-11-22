<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use HttpException;
use HttpRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use Symfony\Component\Console\Input\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    //con esta función se compactan los modelos que se quieran agrgar para que se puedan mostrar
    public function showRegistrationForm()
    {
        //solo se compacta el modelo de estados ya que es el primero que se muestra y con base en ello se muestran los demas datos
        $estados=Estado::all();
        return view('auth.register',compact('estados'));
    }


    //esta funcion sirve para mostrar los municipios disponibles con base a un estado seleccioado
    public function municipios(Request $request)
    {
        if(isset($request->texto))
        {
            $municipios = Municipio::whereid_estado($request->texto)->get();
            return response()->json(
                [
                    'lista' => $municipios,
                    'success' => true
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }


    //esta funcion sirve para mostrar las localidades disponibles con base a un municipio seleccionado
    public function localidades(Request $request)
    {
        if(isset($request->texto))
        {
            $localidades = Localidad::whereid_municipio($request->texto)->get();
            return response()->json(
                [
                    'lista' => $localidades,
                    'success' => true
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:200'],
            'ap' => ['required', 'string', 'max:200'],
            'am' => ['required', 'string', 'max:200'],
            'curp' => ['required', 'string', 'max:200', 'unique:users'],
            'telefono' => ['required', 'string', 'max:200', 'unique:users'],
            'id_estado' => ['required', 'int'],
            'id_municipio' => ['required', 'int'],
            'id_localidad' => ['required', 'int'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'ap' => $data['ap'],
            'am' => $data['am'],
            'curp' => $data['curp'],
            'telefono' => $data['telefono'],
            'id_estado' => $data['id_estado'] ,
            'id_municipio' => $data['id_municipio'],
            'id_localidad' => $data['id_localidad'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //ese 2 es para que todos los usuarios se les asigne este tipo de usuario
            'tipo_usuario' => 2,
        ]);
    }


    //https://github.com/acrogenesis/API-Codigos-Postales  NO SE UTILIZO PERO AQUI LA DEJE
    //Dado un código postal, regresa un arreglo con las colonia, municipio y estado perteneciente al código postal.
    // Además se pueden realizar búsquedas de códigos postales usando los números iniciales.
    public function codigopostal(Request $request)
    {
        $cp = $request->get('codigo_postal');

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://codigospostales-mexico.p.rapidapi.com/porcp/".$this->$cp,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: codigospostales-mexico.p.rapidapi.com",
                "X-RapidAPI-Key: 255de616f0mshfe2ddb94e33ceb5p1f49bbjsn09e8a1d34ffb"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
