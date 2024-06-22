<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\Personal_informationController;
use App\Http\Controllers\Status_activityController;
use App\Http\Controllers\User_typeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;

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


Route::get('/categories/all', [CategoryController::class, 'index']);
Route::get('/courses/all', [CourseController::class, 'index']);
Route::get('/labels/all', [LabelController::class, 'index']);
Route::get('/personal_informations/all', [Personal_informationController::class, 'index']);
Route::get('/status_activities/all', [Status_activityController::class, 'index']);
Route::get('/user_types/all', [User_typeController::class, 'index']);
Route::get('/users/all', [UserController::class, 'index']);
Route::get('/activities/all', [ActivityController::class, 'index']);

Route::get('/activities/day', [ActivityController::class, 'day']);
Route::get('/activities/findcourses/{id}', [ActivityController::class, 'findCourses']);
Route::get('/courses/name', [CourseController::class, 'name']);

Route::get('/activities/statusTask', [ActivityController::class, 'statusTask']);

Route::get('/activities/tasks/completed-per-week', [ActivityController::class, 'completedTasksPerWeek']);
Route::get('/activities/tasks/completed-per-day', [ActivityController::class, 'completedTasksPerDay']);
Route::get('/activities/tasks/pending-per-week', [ActivityController::class, 'pendingTasksPerWeek']);
Route::get('/activities/tasks/pending-per-day', [ActivityController::class, 'pendingTasksPerDay']);
Route::get('/activities/percentage-pending', [ActivityController::class, 'percentagePendingTasks']);

Route::get('/activities/activity/details/{id}', [ActivityController::class, 'show']);
Route::get('/activities/search/{id}', [ActivityController::class, 'search']);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/activities/{id}', [ActivityController::class, 'user_Course']);




