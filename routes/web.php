<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/student')->group(function()
{
  Route::get('/', [StudentController::class, 'index'])->name('student');
  Route::get('/create', [StudentController::class, 'create'])->name('student.create');
  Route::get('/{student_id}/edit', [StudentController::class, 'edit'])->name('student.edit');
  Route::post('/store', [StudentController::class, 'store'])->name('student.store');
  Route::get('/list', [StudentController::class, 'list'])->name('student.list');
  Route::delete('{student_id}/delete', [StudentController::class, 'delete'])->name('student.delete');
  Route::get('{student_id}/status', [StudentController::class, 'status'])->name('student.status');
  Route::post('/{student_id}/update', [StudentController::class, 'update'])->name('student.update');
});

Route::get('/', function () {
    return Inertia::render('Pages/Home/Index');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';