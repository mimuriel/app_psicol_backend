<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\StudentsSubjectsController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeachersController;
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

Route::apiResource("v1/student", StudentsController::class);

Route::apiResource("v2/teacher",TeachersController::class);

Route::apiResource("v1/subject",SubjectsController::class);

Route::apiResource("v1/student_subject",StudentsSubjectsController::class);
