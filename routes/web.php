<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\VendedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ReceitaController;

Route::get(     '/vendedor',        [VendedorController::class,     'index']);
Route::post(    '/vendedor',        [VendedorController::class,     'store']);
Route::delete(  '/vendedor/{id}',   [VendedorController::class,     'destroy']);

Route::get(     '/empresa',        [EmpresaController::class,     'index']);
Route::post(    '/empresa',        [EmpresaController::class,     'store']);
Route::delete(  '/empresa/{id}',   [EmpresaController::class,     'destroy']);

Route::get(     '/funcionario',        [FuncionarioController::class,     'index']);
Route::post(    '/funcionario',        [FuncionarioController::class,     'store']);
Route::delete(  '/funcionario/{id}',   [FuncionarioController::class,     'destroy']);

Route::get(     '/contrato',        [ContratoController::class,     'index']);
Route::post(    '/contrato',        [ContratoController::class,     'store']);
Route::delete(  '/contrato/{id}',   [ContratoController::class,     'destroy']);

Route::get(     '/financeiro',      [ReceitaController::class,     'index']);


Route::get('/', function () {
    return view('welcome');
});
