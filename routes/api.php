<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TypeController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 
*/

/* Route::get('test', function(){     //tutte le rotte hanno come prefisso sempre api
    return response()->json([
        'name'=>'giulia'
    ]);   
}); */

Route::get('projects', [ProjectController::class, 'index']);     //vogliamo il controller dell'api in risposta a questa rotta

Route::get('projects/{slug}', [ProjectController::class, 'show']);

Route::get('types', [TypeController::class, 'index']);  