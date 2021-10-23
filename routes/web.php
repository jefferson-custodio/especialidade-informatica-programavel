<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UnidadesController;
use App\Http\Controllers\DesbravadoresController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\MensalidadesController;
use App\Http\Controllers\CaixaController;
use App\Http\Controllers\CustosController;
use App\Http\Controllers\BensController;
use App\Http\Controllers\AtasController;
use App\Http\Controllers\AtosController;

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
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/authenticate', [MainController::class, 'authenticate']);
Route::get('/logout', [MainController::class, 'logout']);

// unidades

Route::get('/unidades', [UnidadesController::class, 'index'])->middleware('auth')->name('unidades');
Route::get('/unidades/novo', [UnidadesController::class, 'create'])->middleware('auth');
Route::get('/unidades/{id}/editar', [UnidadesController::class, 'edit'])->middleware('auth');

Route::post('/unidades', [UnidadesController::class, 'store'])->middleware('auth');
Route::put('/unidades/{id}', [UnidadesController::class, 'update'])->middleware('auth');


// desbravadores

Route::get('/desbravadores', [DesbravadoresController::class, 'index'])->middleware('auth')->name('desbravadores');
Route::get('/desbravadores/novo', [DesbravadoresController::class, 'create'])->middleware('auth');
Route::get('/desbravadores/{id}/editar', [DesbravadoresController::class, 'edit'])->middleware('auth');

Route::post('/desbravadores', [DesbravadoresController::class, 'store'])->middleware('auth');
Route::put('/desbravadores/{id}', [DesbravadoresController::class, 'update'])->middleware('auth');


// especialidades

Route::get('/especialidades', [EspecialidadeController::class, 'index'])->middleware('auth')->name('especialidades');
Route::get('/especialidades/novo', [EspecialidadeController::class, 'create'])->middleware('auth');
Route::get('/especialidades/{id}/editar', [EspecialidadeController::class, 'edit'])->middleware('auth');

Route::post('/especialidades', [EspecialidadeController::class, 'store'])->middleware('auth');
Route::put('/especialidades/{id}', [EspecialidadeController::class, 'update'])->middleware('auth');

// classes

Route::get('/classes', [ClassesController::class, 'index'])->middleware('auth')->name('classes');
Route::get('/classes/novo', [ClassesController::class, 'create'])->middleware('auth');
Route::get('/classes/{id}/editar', [ClassesController::class, 'edit'])->middleware('auth');

Route::post('/classes', [ClassesController::class, 'store'])->middleware('auth');
Route::put('/classes/{id}', [ClassesController::class, 'update'])->middleware('auth');

// mensalidades

Route::get('/mensalidades', [MensalidadesController::class, 'index'])->middleware('auth')->name('mensalidades');
Route::get('/mensalidades/novo', [MensalidadesController::class, 'create'])->middleware('auth');
Route::get('/mensalidades/{id}/editar', [MensalidadesController::class, 'edit'])->middleware('auth');

Route::post('/mensalidades', [MensalidadesController::class, 'store'])->middleware('auth');
Route::put('/mensalidades/{id}', [MensalidadesController::class, 'update'])->middleware('auth');

// caixa

Route::get('/caixa', [CaixaController::class, 'index'])->middleware('auth')->name('caixa');
Route::get('/caixa/novo', [CaixaController::class, 'create'])->middleware('auth');
Route::get('/caixa/{id}/editar', [CaixaController::class, 'edit'])->middleware('auth');

Route::post('/caixa', [CaixaController::class, 'store'])->middleware('auth');
Route::put('/caixa/{id}', [CaixaController::class, 'update'])->middleware('auth');

// custos

Route::get('/custos', [CustosController::class, 'index'])->middleware('auth')->name('custos');
Route::get('/custos/novo', [CustosController::class, 'create'])->middleware('auth');
Route::get('/custos/{id}/editar', [CustosController::class, 'edit'])->middleware('auth');

Route::post('/custos', [CustosController::class, 'store'])->middleware('auth');
Route::put('/custos/{id}', [CustosController::class, 'update'])->middleware('auth');

// bens

Route::get('/bens', [BensController::class, 'index'])->middleware('auth')->name('bens');
Route::get('/bens/novo', [BensController::class, 'create'])->middleware('auth');
Route::get('/bens/{id}/editar', [BensController::class, 'edit'])->middleware('auth');

Route::post('/bens', [BensController::class, 'store'])->middleware('auth');
Route::put('/bens/{id}', [BensController::class, 'update'])->middleware('auth');


// atas

Route::get('/atas', [AtasController::class, 'index'])->middleware('auth')->name('atas');
Route::get('/atas/novo', [AtasController::class, 'create'])->middleware('auth');
Route::get('/atas/{id}/editar', [AtasController::class, 'edit'])->middleware('auth');

Route::post('/atas', [AtasController::class, 'store'])->middleware('auth');
Route::put('/atas/{id}', [AtasController::class, 'update'])->middleware('auth');

// atos

Route::get('/atos', [AtosController::class, 'index'])->middleware('auth')->name('atos');
Route::get('/atos/novo', [AtosController::class, 'create'])->middleware('auth');
Route::get('/atos/{id}/editar', [AtosController::class, 'edit'])->middleware('auth');

Route::post('/atos', [AtosController::class, 'store'])->middleware('auth');
Route::put('/atos/{id}', [AtosController::class, 'update'])->middleware('auth');