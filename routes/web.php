<?php

use App\Http\Controllers\ClassesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Models\Classs;
use App\Models\Student;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);
//these routes are for email verification
Route::get('/email/verify', [HomeController::class,'verify_notice'])->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [HomeController::class,'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [HomeController::class,'verify_resend'])->middleware(['auth'])->name('verification.resend');
// these routes are for changing password
Route::get('/change/password/{id}',[HomeController::class,'change_password'])->middleware(['auth','verified'])->name('change.password');
Route::post('/update/password',[HomeController::class,'update_password'])->middleware('auth')->name('update.password');
// these routes are define for classes
Route::get('/classes/show',[ClassesController::class,'index'])->middleware(['auth','verified'])->name('classes.view');
Route::get('/classes/create',[ClassesController::class,'create'])->middleware(['auth','verified'])->name('classes.create');
Route::post('/classes/store',[ClassesController::class,'store'])->name('classes.store');

//these routes are define for students
Route::get('/students/index',[StudentsController::class,'index'])->name('students.index');
Route::get('/students/create',[StudentsController::class,'create'])->name('students.create');
Route::post('/students/store',[StudentsController::class,'store'])->name('students.store');
Route::post('/students/destroy',[StudentsController::class,'destroy'])->name('students.destroy');
Route::get('/students/edit/{id}',[StudentsController::class,'edit'])->name('students.edit');
Route::post('/students/update/{id}',[StudentsController::class,'update'])->name('students.update');

