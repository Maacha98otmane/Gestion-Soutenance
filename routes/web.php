<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\SoutenanceController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// HOME

Route::get('/', function () {
    return view('auth.login');
});
// Auth
Auth::routes([
    'register' => false,
    ]);
//Admin
Route::resource('/admin', AdminController::class)->middleware('isAdmin');
Route::resource('/jury', JuryController::class)->middleware('isAdmin');
Route::resource('/admin/classe', ClassController::class)->middleware('isAdmin');
Route::put('resultrefuse/{id}', [App\Http\Controllers\AdminController::class, 'resultrefuse'])->name('resultresfuse')->middleware('isAdmin');
Route::put('resultaccept/{id}', [App\Http\Controllers\AdminController::class, 'resultaccept'])->name('resultaccept')->middleware('isAdmin');
Route::delete('deleteuser/{id}', [App\Http\Controllers\AdminController::class, 'deleteuser'])->name('deleteuser')->middleware('isAdmin');
Route::delete('deleteetudiant/{id}', [App\Http\Controllers\AdminController::class, 'deleteetudiant'])->name('deleteetudiant')->middleware('isAdmin');
Route::delete('deleteformateur/{id}', [App\Http\Controllers\AdminController::class, 'deleteformateur'])->name('deleteformateur')->middleware('isAdmin');
Route::post('storeuser', [App\Http\Controllers\AdminController::class, 'storeuser'])->name('storeuser')->middleware('isAdmin');

//Formateur
Route::resource('/formateur', FormateurController::class)->middleware('isFormateur');
Route::get('accepted', [App\Http\Controllers\ProjetController::class, 'AccepteProjet'])->name('AccepteProjet')->middleware('isFormateur');
Route::put('accept/{id}', [App\Http\Controllers\ProjetController::class, 'Accepte'])->name('accept')->middleware('isFormateur');
Route::get('refused', [App\Http\Controllers\ProjetController::class, 'RefusedProjet'])->name('RefusedProjet')->middleware('isFormateur');
Route::put('refused/{id}', [App\Http\Controllers\ProjetController::class, 'Refuse'])->name('refuse')->middleware('isFormateur');

//Etudiant
Route::resource('/etudiant', StudentController::class)->middleware('isEtudiant');

// Projet
Route::resource('/projet', ProjetController::class)->except('store');
Route::post('/projet/{id}', [App\Http\Controllers\ProjetController::class, 'store'])->name('projet.store');

//Soutenance
Route::resource('/soutenance', SoutenanceController::class);

//Reunion
Route::resource('/reunion', ReunionController::class)->except('store')->middleware('isFormateur');
Route::post('/reunion/add/{id}', [App\Http\Controllers\ReunionController::class, 'store'])->name('reunionstore')->middleware('isFormateur');

// PDF
Route::get('/download', [App\Http\Controllers\ProjetController::class, 'generatePDF'])->name('download')->middleware('isEtudiant');
Route::get('/telechargejury/{id}', [App\Http\Controllers\FormateurController::class, 'telechargejury'])->name('telechargejury');
Route::get('/envoie/{id}', [App\Http\Controllers\AdminController::class, 'envoie'])->name('envoie');
