<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksController;


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
Route::resource('students', StudentController::class);

Route::get('marks/index',[MarksController::class, 'index'])->name('marks.index');
Route::get('marks/create',[MarksController::class, 'create'])->name('marks.create');
Route::post('marks/store',[MarksController::class, 'store'])->name('marks.store');

Route::get('marks/edit/{id}',[MarksController::class, 'edit'])->name('marks.edit');
Route::post('marks/update/{id}',[MarksController::class, 'update'])->name('marks.update');
Route::post('marks/destroy/{id}',[MarksController::class, 'store'])->name('marks.destroy');

