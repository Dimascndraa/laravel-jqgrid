<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
    return view('data');
});

Route::get('/get-students-data', [StudentController::class, 'getStudentsData']);


Route::get('/get-student', [StudentController::class, 'getEditStudent'])->name('get.edit.student');

Route::post('/edit-student', [StudentController::class, 'editStudent']);
Route::post('/add-student', [StudentController::class, 'addStudent']);
Route::post('/save-edited-student', [StudentController::class, 'updateStudent'])->name('update-student');
