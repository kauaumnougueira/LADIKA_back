<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getproduto/{id}', [ProdutoController::class, 'getProdutoById'])->name('get.produto');
Route::post('createproduto', [ProdutoController::class, 'createProduto'])->name('create.produto');
Route::post('editproduto', [ProdutoController::class, 'editProduto'])->name('edit.produto');
Route::delete('removeproduto', [ProdutoController::class, 'removeProduto'])->name('remove.produto');
