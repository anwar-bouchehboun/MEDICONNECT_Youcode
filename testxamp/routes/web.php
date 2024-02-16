<?php

use App\Http\Controllers\CommeantaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\ReservationController;

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
    Route::get('/medecin', [MedecinController::class, 'index'])->name('medecin.index');
    // Route::resource('/medicament', MedicamentController::class);
    Route::get ('/ReservationPatien',[MedecinController::class,'ReservationPatient'])->name('Reserve');
    Route::resource('/consultion', MedecinController::class);
     Route::get('/consultion', [MedecinController::class,'show'])->name('show');
    Route::get('/certfic/{con}', [MedecinController::class,'persone'])->name('persone');

});
Route::middleware(['auth', RoleMiddleware::class . ':patient'])->group(function () {
    Route::resource('/patient', PatientController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::get('/Favoris', [PatientController::class, 'showFavoris'])->name('favoris');
    Route::get('/doctor', [PatientController::class, 'showDoctor'])->name('doctor');
    Route::resource('/commentaire', CommeantaireController::class);
    Route::get('/imprimer/{id}', [PatientController::class, 'showCerficat'])->name('certaficat');
    Route::get('/filtrer', [ReservationController::class, 'filtrer'])->name('filtrer.specialite');
    Route::post('/reserve', [ReservationController::class, 'reserveurgence'])->name('urgence.reservation');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('/specialite', SpecialiteController::class);
    Route::resource('/medicament', MedicamentController::class);


});
// Route::middleware(['auth', 'role:medecin,admin'])->group(function () {
//     Route::resource('/medicament', MedicamentController::class);
// });

Route::get('/', function () {

    if (!auth()->user())

        return redirect('/login');

    switch (auth()->user()->role) {
        case 'admin':
            return redirect('/admin');
        case 'patient':
            return redirect('/patient');
        case 'medecin':
            return redirect('/medecin');
        default:
            return redirect('/login');
    }

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
