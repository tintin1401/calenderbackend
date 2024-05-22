<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventosController;
use App\Http\Controllers\CalculatorIMCController;

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/eventos/{id}', function ($id) {
    return view('eventos');
    return "Eventos -> ".$id;
});*/
Route::get('/eventos', function(){
    return view('eventos');
});

/*Route::get('/eventos/{id}', [EventosController::class, 'show']);
Route::get('/imc/calculate/{w}/{h}', [CalculatorIMCController::class, 'show']);
Route::get('/imc/all', [CalculatorIMCController::class, 'index']);
Route::get('/imc/find/{id}', [CalculatorIMCController::class, 'find']);
Route::get('/imc/update/{id}/{w}/{h}', [CalculatorIMCController::class, 'update']);
Route::get('/imc/delete/{id}', [CalculatorIMCController::class, 'destroy']);*/

Route::resource('imc', CalculatorIMCController::class);


