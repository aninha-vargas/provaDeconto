<?php
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FolhaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('funcionario')->group(function () {
    Route::get('/', [FuncionarioController::class, 'listarFuncionarios']);
    Route::post('/', [FuncionarioController::class, 'cadastrarFuncionarios']);
});

Route::prefix('folha')->group(function () {
    Route::get('/', [FolhaController::class, 'listarFolhas']);
    Route::get('/calcular', [FolhaController::class, 'calcularFolhas']);
    Route::post('/', [FolhaController::class, 'cadastrarFolhas']);
});
