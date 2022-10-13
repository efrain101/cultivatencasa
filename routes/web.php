<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ambienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//control de acceso para los dos tipos de usuario
Route::resource('ambientes', \App\Http\Controllers\ambienteController::class
)->only(['index']);

Route::resource('periodoscrecimiento', \App\Http\Controllers\Periodos_crecimientosController::class
)->only(['index']);

Route::resource('temporadas', \App\Http\Controllers\TemporadasController::class
)->only(['index']);

Route::resource('temperaturas', \App\Http\Controllers\TemperaturasController::class
)->only(['index']);

Route::resource('humedades', \App\Http\Controllers\HumedadesController::class
)->only(['index']);

Route::resource('tipossiembras', \App\Http\Controllers\Tipos_siembrasController::class
)->only(['index']);

Route::resource('sustratos', \App\Http\Controllers\SustratosController::class
)->only(['index']);

Route::resource('dimensiones', \App\Http\Controllers\DimensionesController::class
)->only(['index']);

Route::resource('cantidades_complementos', \App\Http\Controllers\CantidadesComplementosController::class
)->only(['index']);

Route::resource('tipos_complementos', \App\Http\Controllers\TiposComplementosController::class
)->only(['index']);

Route::resource('complementos', \App\Http\Controllers\ComplementosController::class
)->only(['index']);

Route::resource('mantenimientos', \App\Http\Controllers\MantenimientosController::class
)->only(['index']);

Route::resource('tipos_enfermedades_c', \App\Http\Controllers\tipos_enfermedades_cController::class
)->only(['index']);

Route::resource('enfermedades', \App\Http\Controllers\EnfermedadesController::class
)->only(['index']);

Route::resource('efectos_enfermedades_c', \App\Http\Controllers\Efectos_enfermedades_cController::class
)->only(['index']);

Route::resource('prevencion_enfermedades_c', \App\Http\Controllers\Prevencion_enfermedades_cController::class
)->only(['index']);

Route::resource('erradicacion_enfermedades_c', \App\Http\Controllers\Erradicacion_enfermedades_cController::class
)->only(['index']);

Route::resource('tipos_plagas_c', \App\Http\Controllers\tipos_plagas_cController::class
)->only(['index']);

Route::resource('plagas', \App\Http\Controllers\PlagasController::class
)->only(['index']);

Route::resource('efectos_plagas_c', \App\Http\Controllers\Efectos_plagas_cController::class
)->only(['index']);

Route::resource('prevencion_plagas_c', \App\Http\Controllers\Prevencion_plagas_cController::class
)->only(['index']);

Route::resource('erradicacion_plagas_c', \App\Http\Controllers\Erradicacion_plagas_cController::class
)->only(['index']);

Route::resource('cultivos', \App\Http\Controllers\CultivosController::class
)->only(['index']);

Route::resource('cultivosplagas', \App\Http\Controllers\CultivosPlagasController::class
)->only(['index']);

Route::resource('efectosplagas', \App\Http\Controllers\EfectosPlagasController::class
)->only(['index']);

Route::resource('prevencionesplagas', \App\Http\Controllers\PlagasPrevencionesController::class
)->only(['index']);

Route::resource('erradicacionesplagas', \App\Http\Controllers\PlagasErradicacionesController::class
)->only(['index']);


Route::resource('cultivosenfermedades', \App\Http\Controllers\CultivosEnfermedadesController::class
)->only(['index']);

Route::resource('efectosenfermedades', \App\Http\Controllers\EfectosEnfermedadesController::class
)->only(['index']);

Route::resource('prevencionesenfermedades', \App\Http\Controllers\EnfermedadesPrevencionesController::class
)->only(['index']);

Route::resource('erradicacionesenfermedades', \App\Http\Controllers\EnfermedadesErradicacionesController::class
)->only(['index']);

Route::resource('culcom', \App\Http\Controllers\CultivosComplementosController::class
)->only(['index']);

Route::resource('culman', \App\Http\Controllers\CultivosMantenimientosController::class
)->only(['index']);

//para mostras cultivos a usuarios
Route::resource('cultivosusers', \App\Http\Controllers\CultivosUserController::class
)->only(['index']);

//Middleware de control de acceso
Route::middleware(['canAccess'])->group(function () {
    //rutas agregadas dentro del middleware

//catalogos (el administrador puede hacer las acciones de CRUD y el usuario normal solo puede ver)
    Route::resource('ambientes', \App\Http\Controllers\ambienteController::class
    )->except(['index']);

    Route::resource('periodoscrecimiento', \App\Http\Controllers\Periodos_crecimientosController::class
    )->except(['index']);

    Route::resource('temporadas', \App\Http\Controllers\TemporadasController::class
    )->except(['index']);

    Route::resource('temperaturas', \App\Http\Controllers\TemperaturasController::class
    )->except(['index']);

    Route::resource('humedades', \App\Http\Controllers\HumedadesController::class
    )->except(['index']);

    Route::resource('tipossiembras', \App\Http\Controllers\Tipos_siembrasController::class
    )->except(['index']);

    Route::resource('sustratos', \App\Http\Controllers\SustratosController::class
    )->except(['index']);

    Route::resource('dimensiones', \App\Http\Controllers\DimensionesController::class
    )->except(['index']);

    Route::resource('cantidades_complementos', \App\Http\Controllers\CantidadesComplementosController::class
    )->except(['index']);

    Route::resource('tipos_complementos', \App\Http\Controllers\TiposComplementosController::class
    )->except(['index']);

    Route::resource('complementos', \App\Http\Controllers\ComplementosController::class
    )->except(['index']);

    Route::resource('mantenimientos', \App\Http\Controllers\MantenimientosController::class
    )->except(['index']);

    Route::resource('tipos_enfermedades_c', \App\Http\Controllers\tipos_enfermedades_cController::class
    )->except(['index']);

    Route::resource('enfermedades', \App\Http\Controllers\EnfermedadesController::class
    )->except(['index']);

    Route::resource('efectos_enfermedades_c', \App\Http\Controllers\Efectos_enfermedades_cController::class
    )->except(['index']);

    Route::resource('prevencion_enfermedades_c', \App\Http\Controllers\Prevencion_enfermedades_cController::class
    )->except(['index']);

    Route::resource('erradicacion_enfermedades_c', \App\Http\Controllers\Erradicacion_enfermedades_cController::class
    )->except(['index']);

    Route::resource('tipos_plagas_c', \App\Http\Controllers\tipos_plagas_cController::class
    )->except(['index']);

    Route::resource('plagas', \App\Http\Controllers\PlagasController::class
    )->except(['index']);

    Route::resource('efectos_plagas_c', \App\Http\Controllers\Efectos_plagas_cController::class
    )->except(['index']);

    Route::resource('prevencion_plagas_c', \App\Http\Controllers\Prevencion_plagas_cController::class
    )->except(['index']);

    Route::resource('erradicacion_plagas_c', \App\Http\Controllers\Erradicacion_plagas_cController::class
    )->except(['index']);

    Route::resource('cultivos', \App\Http\Controllers\CultivosController::class
    )->except(['index']);

    //para mostras cultivos a usuarios
    Route::resource('cultivosusers', \App\Http\Controllers\CultivosUserController::class
    )->except(['index']);


//lista de usuarios (esta solo la ve el administrador)
    Route::resource('listausuarios', \App\Http\Controllers\listaUsuariosController::class, ['names' => [
        'index' => 'listausuarios.index',]
    ]);


//personalizar cultivos (el administrador puede agregar y eliminar y el usuario normal solo puede ver)
    Route::resource('cultivosplagas', \App\Http\Controllers\CultivosPlagasController::class
    )->except(['index']);

    Route::resource('efectosplagas', \App\Http\Controllers\EfectosPlagasController::class
    )->except(['index']);

    Route::resource('prevencionesplagas', \App\Http\Controllers\PlagasPrevencionesController::class
    )->except(['index']);

    Route::resource('erradicacionesplagas', \App\Http\Controllers\PlagasErradicacionesController::class
    )->except(['index']);


    Route::resource('cultivosenfermedades', \App\Http\Controllers\CultivosEnfermedadesController::class
    )->except(['index']);

    Route::resource('efectosenfermedades', \App\Http\Controllers\EfectosEnfermedadesController::class
    )->except(['index']);

    Route::resource('prevencionesenfermedades', \App\Http\Controllers\EnfermedadesPrevencionesController::class
    )->except(['index']);

    Route::resource('erradicacionesenfermedades', \App\Http\Controllers\EnfermedadesErradicacionesController::class
    )->except(['index']);


    Route::resource('culcom', \App\Http\Controllers\CultivosComplementosController::class
    )->except(['index']);

    Route::resource('culman', \App\Http\Controllers\CultivosMantenimientosController::class
    )->except(['index']);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//personalizacion de catalogos paginas principales
Route::get( "/principalcatalogos", function(){
    return view("catalogos.catalogo");
});

Route::get( "/personalizarcultivos", function(){
    return view("personalizarcultivos.personalizar");
});

Route::get( "/principalplagas", function(){
    return view("personalizarcultivos.principalplagas");
});

Route::get( "/principalenfermedades", function(){
    return view("personalizarcultivos.principalenfermedades");
});

Route::get( "/principalcomplementos", function(){
    return view("personalizarcultivos.principalcomplementos");
});

Route::get( "/principalmantenimientos", function(){
    return view("personalizarcultivos.principalmantenimientos");
});

//página hecha para mostrara error en caso de querer acceder a una vista no permitida
Route::get( "/error", function(){
    return view('error');
});

//Rutas para el llenado de los combos de municipios y las localidades de la ventana de registro
Route::post('/municipios', [App\Http\Controllers\Auth\RegisterController::class, 'municipios']);
Route::post('/localidades', [App\Http\Controllers\Auth\RegisterController::class, 'localidades']);

//para mostrarle al usuario sus mesas de cultivo
Route::resource('mesas', \App\Http\Controllers\MesasController::class, ['names' => [
    'index' => 'mesas.index',
    'store' => 'mesas.new',]
]);

//para mostrarle al usuario la bitacora de cada cultivo
Route::resource('bitacoras', \App\Http\Controllers\Bitacoras_SiembrasController::class, ['names' => [
    'index' => 'bitacoras.index',
    'store' => 'bitacoras.new',]
]);

//para mostrarle al usuario las anotaciones de cada cultivo
Route::resource('anotaciones', \App\Http\Controllers\AnotacionesController::class, ['names' => [
    'index' => 'anotaciones.index',
    'store' => 'anotaciones.new',]
]);

//para mostrarle al usuario sus cultivos en cada mesa
//asignarle un nombre en caso de que se ocupen las otras rutas
Route::resource('mesas_siembras/{id_mesa_cultivo}', \App\Http\Controllers\Mesas_siembrasController::class, ['names' => [
    'index' => 'mesas_siembras.index',
    'store' => 'mesas_siembras.new',
    'destroy'=>'mesas_siembras.destroy'],'only'=>['index', 'create', 'store', 'destroy'],'parameters'
=> ['{id_mesa_cultivo}' => 'mesa_siembra'
]]);

//para mostrarle al usuario las notificaciones de la mesa
Route::get('notificaciones/{id}',[\App\Http\Controllers\NotificacionesController::class,'index'])->name('notificacion');


//para mostrarle al usuario las notificaciones de la mesa
/*Route::resource('notificaciones/{id_mesa_cul}', \App\Http\Controllers\NotificacionesController::class, ['names' => [
    'index' => 'notificaciones.index',
    'store' => 'notificaciones.new',]
]);*/









