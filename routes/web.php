<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventsController;
use App\Http\Controllers\LoginController;

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

Route::resource('events', EventsController::class)->middleware('auth');
Route::get('/events/search/event', [EventsController::class, 'search'])->name('events.search');

Route::resource('admin', LoginController::class);
Route::get('/admin/', [LoginController::class, 'index'])->name('admin.login');
Route::post('/admin/check', [LoginController::class, 'check'])->name('admin.check');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');




