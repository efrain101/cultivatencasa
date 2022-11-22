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

Route::resource('periodoscrecimiento', \App\Http\Controllers\PeriodoCrecimientoController::class
)->only(['index']);

Route::resource('temporadas', \App\Http\Controllers\TemporadaController::class
)->only(['index']);

Route::resource('temperaturas', \App\Http\Controllers\TemperaturaController::class
)->only(['index']);

Route::resource('humedades', \App\Http\Controllers\HumedadController::class
)->only(['index']);

Route::resource('tipossiembras', \App\Http\Controllers\TipoSiembraController::class
)->only(['index']);

Route::resource('sustratos', \App\Http\Controllers\SustratoController::class
)->only(['index']);

Route::resource('dimensiones', \App\Http\Controllers\DimensionController::class
)->only(['index']);

Route::resource('cantidades_complementos', \App\Http\Controllers\CantidadComplementoController::class
)->only(['index']);

Route::resource('tipos_complementos', \App\Http\Controllers\TipoComplementoController::class
)->only(['index']);

Route::resource('complementos', \App\Http\Controllers\ComplementoController::class
)->only(['index']);

Route::resource('mantenimientos', \App\Http\Controllers\MantenimientoController::class
)->only(['index']);

Route::resource('tipoEnfermedadc', \App\Http\Controllers\TipoEnfermedadcController::class
)->only(['index']);

Route::resource('enfermedades', \App\Http\Controllers\EnfermedadController::class
)->only(['index']);

Route::resource('efectos_enfermedades_c', \App\Http\Controllers\EfectoEnfermedadcController::class
)->only(['index']);

Route::resource('prevencion_enfermedades_c', \App\Http\Controllers\PrevencionEnfermedadcController::class
)->only(['index']);

Route::resource('erradicacion_enfermedades_c', \App\Http\Controllers\ErradicacionEnfermedadcController::class
)->only(['index']);

Route::resource('tipos_plagas_c', \App\Http\Controllers\TipoPlagacController::class
)->only(['index']);

Route::resource('plagas', \App\Http\Controllers\PlagaController::class
)->only(['index']);

Route::resource('efectos_plagas_c', \App\Http\Controllers\EfectoPlagacController::class
)->only(['index']);

Route::resource('prevencion_plagas_c', \App\Http\Controllers\PrevencionPlagacController::class
)->only(['index']);

Route::resource('erradicacion_plagas_c', \App\Http\Controllers\ErradicacionPlagacController::class
)->only(['index']);

Route::resource('cultivos', \App\Http\Controllers\CultivoController::class
)->only(['index']);

Route::resource('cultivosplagas', \App\Http\Controllers\CultivoPlagaController::class
)->only(['index']);

Route::resource('efectosplagas', \App\Http\Controllers\EfectoPlagaController::class
)->only(['index']);

Route::resource('prevencionesplagas', \App\Http\Controllers\PlagaPrevencionController::class
)->only(['index']);

Route::resource('erradicacionesplagas', \App\Http\Controllers\PlagaErradicacionController::class
)->only(['index']);


Route::resource('cultivosenfermedades', \App\Http\Controllers\CultivoEnfermedadController::class
)->only(['index']);

Route::resource('efectosenfermedades', \App\Http\Controllers\EfectoEnfermedadController::class
)->only(['index']);

Route::resource('prevencionesenfermedades', \App\Http\Controllers\EnfermedadPrevencionController::class
)->only(['index']);

Route::resource('erradicacionesenfermedades', \App\Http\Controllers\EnfermedadErradicacionController::class
)->only(['index']);

Route::resource('culcom', \App\Http\Controllers\CultivoComplementoController::class
)->only(['index']);

Route::resource('culman', \App\Http\Controllers\CultivoMantenimientoController::class
)->only(['index']);

//para mostras cultivos a usuarios
Route::resource('cultivosusers', \App\Http\Controllers\CultivoUserController::class
)->only(['index']);

//Middleware de control de acceso
Route::middleware(['canAccess'])->group(function () {
    //rutas agregadas dentro del middleware

//catalogos (el administrador puede hacer las acciones de CRUD y el usuario normal solo puede ver)
    Route::resource('ambientes', \App\Http\Controllers\AmbienteController::class
    )->except(['index']);

    Route::resource('periodoscrecimiento', \App\Http\Controllers\PeriodoCrecimientoController::class
    )->except(['index']);

    Route::resource('temporadas', \App\Http\Controllers\TemporadaController::class
    )->except(['index']);

    Route::resource('temperaturas', \App\Http\Controllers\TemperaturaController::class
    )->except(['index']);

    Route::resource('humedades', \App\Http\Controllers\HumedadController::class
    )->except(['index']);

    Route::resource('tipossiembras', \App\Http\Controllers\TipoSiembraController::class
    )->except(['index']);

    Route::resource('sustratos', \App\Http\Controllers\SustratoController::class
    )->except(['index']);

    Route::resource('dimensiones', \App\Http\Controllers\DimensionController::class
    )->except(['index']);

    Route::resource('cantidades_complementos', \App\Http\Controllers\CantidadComplementoController::class
    )->except(['index']);

    Route::resource('tipos_complementos', \App\Http\Controllers\TipoComplementoController::class
    )->except(['index']);

    Route::resource('complementos', \App\Http\Controllers\ComplementoController::class
    )->except(['index']);

    Route::resource('mantenimientos', \App\Http\Controllers\MantenimientoController::class
    )->except(['index']);

    Route::resource('tipoEnfermedadc', \App\Http\Controllers\TipoEnfermedadcController::class
    )->except(['index']);

    Route::resource('enfermedades', \App\Http\Controllers\EnfermedadController::class
    )->except(['index']);

    Route::resource('efectos_enfermedades_c', \App\Http\Controllers\EfectoEnfermedadcController::class
    )->except(['index']);

    Route::resource('prevencion_enfermedades_c', \App\Http\Controllers\PrevencionEnfermedadcController::class
    )->except(['index']);

    Route::resource('erradicacion_enfermedades_c', \App\Http\Controllers\ErradicacionEnfermedadcController::class
    )->except(['index']);

    Route::resource('tipos_plagas_c', \App\Http\Controllers\TipoPlagacController::class
    )->except(['index']);

    Route::resource('plagas', \App\Http\Controllers\PlagaController::class
    )->except(['index']);

    Route::resource('efectos_plagas_c', \App\Http\Controllers\EfectoPlagacController::class
    )->except(['index']);

    Route::resource('prevencion_plagas_c', \App\Http\Controllers\PrevencionPlagacController::class
    )->except(['index']);

    Route::resource('erradicacion_plagas_c', \App\Http\Controllers\ErradicacionPlagacController::class
    )->except(['index']);

    Route::resource('cultivos', \App\Http\Controllers\CultivoController::class
    )->except(['index']);

    //para mostras cultivos a usuarios
    Route::resource('cultivosusers', \App\Http\Controllers\CultivoUserController::class
    )->except(['index']);


//lista de usuarios (esta solo la ve el administrador)
    Route::resource('listausuarios', \App\Http\Controllers\listaUsuarioController::class, ['names' => [
        'index' => 'listausuarios.index',]
    ]);


//personalizar cultivos (el administrador puede agregar y eliminar y el usuario normal solo puede ver)
    Route::resource('cultivosplagas', \App\Http\Controllers\CultivoPlagaController::class
    )->except(['index']);

    Route::resource('efectosplagas', \App\Http\Controllers\EfectoPlagaController::class
    )->except(['index']);

    Route::resource('prevencionesplagas', \App\Http\Controllers\PlagaPrevencionController::class
    )->except(['index']);

    Route::resource('erradicacionesplagas', \App\Http\Controllers\PlagaErradicacionController::class
    )->except(['index']);


    Route::resource('cultivosenfermedades', \App\Http\Controllers\CultivoEnfermedadController::class
    )->except(['index']);

    Route::resource('efectosenfermedades', \App\Http\Controllers\EfectoEnfermedadController::class
    )->except(['index']);

    Route::resource('prevencionesenfermedades', \App\Http\Controllers\EnfermedadPrevencionController::class
    )->except(['index']);

    Route::resource('erradicacionesenfermedades', \App\Http\Controllers\EnfermedadErradicacionController::class
    )->except(['index']);


    Route::resource('culcom', \App\Http\Controllers\CultivoComplementoController::class
    )->except(['index']);

    Route::resource('culman', \App\Http\Controllers\CultivoMantenimientoController::class
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
Route::resource('mesas', \App\Http\Controllers\MesaController::class, ['names' => [
    'index' => 'mesas.index',
    'store' => 'mesas.new',]
]);

//para mostrarle al usuario la bitacora de cada cultivo
Route::resource('bitacoras/{id_mesa_siembra}', \App\Http\Controllers\BitacoraSiembraController::class, ['names' => [
    'index' => 'bitacoras.index',
    'store' => 'bitacoras.new'],'only'=>['index']
]);

//para mostrarle al usuario las anotaciones de cada cultivo
Route::resource('anotaciones/{id_mesa_siembra}', \App\Http\Controllers\AnotacionController::class, ['names' => [
    'index' => 'anotaciones.index',
    'store' => 'anotaciones.new',
    'update'=>'anotaciones.update'],'only'=>['index', 'create', 'store','edit','update','destroy'],'parameters'
=> ['{id_mesa_siembra}' => 'mesiem'
]]);

//para mostrarle al usuario sus cultivos en cada mesa
//asignarle un nombre en caso de que se ocupen las otras rutas
Route::resource('mesas_siembras/{id_mesa_cultivo}', \App\Http\Controllers\MesaSiembraController::class, ['names' => [
    'index' => 'mesas_siembras.index',
    'store' => 'mesas_siembras.new',
    'destroy'=>'mesas_siembras.destroy'],'only'=>['index', 'create', 'store', 'destroy'],'parameters'
=> ['{id_mesa_cultivo}' => 'mesa_siembra'
]]);

//para mostrarle al usuario las notificaciones de la mesa
Route::get('notificaciones/{id}',[\App\Http\Controllers\NotificacionController::class,'index'])->name('notificacion');


//para mostrarle al usuario las notificaciones de la mesa
/*Route::resource('notificaciones/{id_mesa_cul}', \App\Http\Controllers\NotificacionController::class, ['names' => [
    'index' => 'notificaciones.index',
    'store' => 'notificaciones.new',]
]);*/









