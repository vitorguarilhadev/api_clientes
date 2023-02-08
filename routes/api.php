<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/listarClientes', [ClientesController::class, 'listarClientes']);
Route::get('/listarClientes/{id}', [ClientesController::class, 'listarClientesById']);
Route::delete('/deletarCliente/{id}', [ClientesController::class, 'deletarCliente']);
Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente']);


