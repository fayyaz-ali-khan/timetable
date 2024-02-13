<?php

use App\Http\Controllers\DaySlotsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\Auth\LoginController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
//Room
Route::get('/rooms/index', [RoomController::class, 'index'])->name('admin.rooms.index')->middleware('auth');
Route::get('/rooms/add', [RoomController::class, 'add'])->name('rooms.add')->middleware('auth');
Route::post('room/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit')->middleware('auth');
Route::post('/rooms/update/{id}', [RoomController::class, 'update'])->name('rooms.update')->middleware('auth');
Route::delete('/rooms/destroy{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');

//Course
Route::get('/courses/index', [CoursesController::class, 'index'])->name('admin.courses.index')->middleware('auth');
Route::get('/courses/add', [CoursesController::class, 'add'])->name('courses.add')->middleware('auth');
Route::post('courses/store', [CoursesController::class, 'store'])->name('courses.store');
Route::get('courses/edit{id}', [CoursesController::class, 'edit'])->name('courses.edit')->middleware('auth');
Route::delete('/courses/destroy{id}', [CoursesController::class, 'destroy'])->name('courses.destroy');
Route::post('courses/update/{id}', [CoursesController::class, 'update'])->name('courses.update');
//Classes
Route::get('/classes/index', [ClassController::class, 'index'])->name('admin.classes.index')->middleware('auth');
Route::get('/classes/add', [ClassController::class, 'add'])->name('classes.add')->middleware('auth');
Route::post('/classes/store', [ClassController::class, 'store'])->name('classes.store');
Route::get('/classes/edit/{id}', [ClassController::class, 'edit'])->name('classes.edit')->middleware('auth');
Route::post('/classes/update/{id}', [ClassController::class, 'update'])->name('classes.update');
Route::delete('/classes/destroy{id}', [ClassController::class, 'destroy'])->name('classes.destroy');

Route::get('/professors/index', [ProfessorController::class, 'index'])->name('admin.professors.index')->middleware('auth');
Route::get('/periods/index', [PeriodController::class, 'index'])->name('admin.periods.index')->middleware('auth');


Route::resource('timeslots', TimeslotController::class)->middleware('auth');
Route::resource('slots', DaySlotsController::class)->middleware('auth');