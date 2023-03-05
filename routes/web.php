<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\ProjectController as ProjectController;
use App\Http\Controllers\Admin\TypeController as TypeController;
use App\Http\Controllers\ProfileController;
use App\Models\Project;
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
    return view('welcome');
});

//Grouping Admin routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/projects', ProjectController::class);
    Route::resource('/types', TypeController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
