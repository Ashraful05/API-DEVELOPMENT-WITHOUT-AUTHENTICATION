<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\ProjectController;

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

//API PHASE-1
//Route::get('list-employees',[ApiController::class,'listEmployee']);
//Route::post('create-employee',[ApiController::class,'createEmployee']);
//Route::put('update-employee/{id}',[ApiController::class,'updateEmployee']);
//Route::get('list-single-employee/{id}',[ApiController::class,'getSingleEmployee']);
//Route::delete('delete-employee/{id}',[ApiController::class,'deleteEmployee']);

// API PHASE-2 using Sanctum Authentication.....

Route::post('register',[StudentController::class,'register']);
Route::post('login',[StudentController::class,'login']);


    Route::get('profile',[StudentController::class,'profile']);
    Route::get('logout',[StudentController::class,'logout']);

    Route::post('create-project',[ProjectController::class,'createProject']);
    Route::get('list-project',[ProjectController::class,'listProject']);
    Route::get('list-single-project/{id}',[ProjectController::class,'singleProject']);
    Route::delete('delete-project/{id}',[ProjectController::class,'deleteProject']);


