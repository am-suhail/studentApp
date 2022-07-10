<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('student-list',[studentController::class,'index']);
Route::get('add-student',[studentController::class,'addstudent']);
Route::post('save-student',[studentController::class,'savestudent']);
Route::get('edit-student/{id}',[studentController::class,'editstudent']);
Route::post('update-student',[studentController::class,'updatestudent']);
Route::get('delete-student/{id}',[studentController::class,'deletestudent']);