<?php

use App\Http\Controllers\Api\TodoController;
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

Route::apiResource('/todos', TodoController::class);
// Route::delete('/todos/{id}', [TodoController::class, 'destroy']);
// Route::patch('/todos/{id}', [TodoController::class, 'update']);
// Route::get('/todos/{id}', [TodoController::class, 'show']);
// Route::get('/todos', [TodoController::class, 'index']);
// Route::post('/todos', [TodoController::class, 'store']);

Route::get('/', function() {
    return response()->json([
        'succes' => True,
    ]);
});