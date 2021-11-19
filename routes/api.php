<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CepController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List cep
Route::get('cep', [CepController::class, 'index']);

// List single cep
Route::get('cep/{id}', [CepController::class, 'show']);

// List fuzzy search cep
Route::get('cep/fuzzy/{id}', [CepController::class, 'fuzzySearch']);

// Create new cep
Route::post('cep', [CepController::class, 'store']);

// Update cep
Route::put('cep/{id}', [CepController::class, 'update']);

// Delete cep
Route::delete('cep/{id}', [CepController::class,'destroy']);