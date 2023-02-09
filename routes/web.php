<?php

use App\Http\Controllers\ciudadController;
use App\Http\Controllers\comentarioEventoController;
use App\Http\Controllers\eventosController;
use App\Http\Controllers\lugaresController;
use App\Http\Controllers\LugarEventoController;
use App\Http\Controllers\userController;
use App\Models\lugares_eventos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('home');
})->name('home');
// Route::get('/eventos', function () {
//     return view('eventos.edit');
// })->name('eventos');
// Route::get('/lugares', function () {
//     Alert::success('hola',"adios");
//     return view('lugares.create');
// })->name('lugares');

Route::controller(lugaresController::class)->group(function () {
    Route::get('/lugares','vistaPrincipal')->name('lugares-index');
    Route::get('/lugares/gestion','vistaGestion')->name('lugares-gestion')->middleware('admin');
    Route::get('/lugares/crear','vistaCrear')->name('lugares-crear')->middleware('admin');
    Route::get('/lugares/actualizar','vistaActualizar')->name('lugares-actualizar')->middleware('admin');
    Route::get('/lugares/leer','leer')->name('lugares-leer')->middleware('admin');
    Route::get('/lugares/eliminar','vistaEliminar')->name('lugares-eliminar')->middleware('admin');
    Route::get('/lugares/{id}','buscar')->name('lugares-buscar');
    Route::get('/lugares/actualizar/{id}','lugaresActualizarBuscar')->name('lugares-actualizar-buscar');
    Route::get('/lugares/buscar/{id}','buscarTodo')->name('lugares-buscar-id');
    Route::post('/lugares/crear','creacion')->name('lugares-crear-post');
    Route::post('/lugares/actualizar','actualizar')->name('lugares-actualizar-post');
    Route::post('/lugares/eliminar','eliminar')->name('lugares-eliminar-post');
});

Route::controller(eventosController::class)->group(function () {
    Route::get('/eventos', 'vistaPrincipal')->name('eventos-index');
    Route::get('/eventos/gestion','vistaGestion')->name('eventos-gestion')->middleware('admin');
    Route::get('/eventos/crear','vistaCrear')->name('eventos-crear')->middleware('admin');
    Route::get('/eventos/actualizar','vistaActualizar')->name('eventos-actualizar')->middleware('admin');
    Route::get('/eventos/leer','leer')->name('eventos-leer')->middleware('admin');
    Route::get('/eventos/eliminar','vistaEliminar')->name('eventos-eliminar')->middleware('admin');
    Route::get('/eventos/{id}','buscar')->name('eventos-buscar');
    Route::get('/eventos/actualizar/{id}','eventosActualizarbuscar')->name('eventos-actualizar-buscar');
    Route::get('/eventos-aun','filtro')->name('evento-filtro');
    Route::get('/eventos-pasando','filtro2')->name('evento-filtro2');
    Route::get('/eventos-pasados','filtro3')->name('evento-filtro3');
    Route::post('/eventos/crear','creacion')->name('eventos-crear-post');
    Route::post('/eventos/actualizar','actualizar')->name('eventos-actualizar-post');
    Route::post('/eventos/eliminar','eliminar')->name('eventos-eliminar-post');

});

Route::controller(userController::class)->group(function () {
    Route::get('/usuario/{id}', 'index')->name('perfil');
    Route::post('/usuario', 'actualizar')->name('usuario-actualizar');
});

Route::controller(ciudadController::class)->group(function () {
    Route::get('/ciudad/departamento/{id}', 'buscar')->name('ciudad-departamento-id');
    Route::get('/ciudad/{id}','buscarCiudad')->name('ciudad-id');
    Route::get('/departamento/ciudad/{id}','buscarTodo')->name('departamento-ciudad-id');
});

Route::controller(LugarEventoController::class)->group(function () {
    Route::get('/lugares-eventos/{id}', 'buscar')->name('lugares-eventos-buscar');
    Route::post('/orders', 'store');
});

Route::controller(comentarioEventoController::class)->group(function () {
    Route::post('/comentarioEventos','index')->name("comentario-eventos-crear");
});



Auth::routes();
