<?php

use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\SpecialiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth', 'permission:admin'])->group(function () {
//     Route::get('/', [AdminController::class],'index')->name('Admin');
// });

// Route::middleware(['auth', 'permission:patient'])->group(function () {
//     Route::get('/patient-dashboard', [PatientController::class, 'index']);
// });

Route::middleware(['auth', RoleMiddleware::class . ':medecin'])->group(function () {
    Route::get('/medecin', [MedecinController::class, 'index']);
});
Route::middleware(['auth', RoleMiddleware::class . ':patient'])->group(function () {
    Route::get('/patient', [PatientController::class, 'index']);
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('/specialite', SpecialiteController::class);
    Route::resource('/medicament', MedicamentController::class);
});

Route::get('/', function () {

    if (!auth()->user())

        return redirect('/login');

    switch(auth()->user()->role){
        case 'admin':
            return  redirect('/admin');
        case 'patient':
            return     redirect('/patient');
        case 'medecin':
            return   redirect('/medecin');
        default:
            return  redirect('/login');
    }

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';