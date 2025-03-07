<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Liste des employés
    Route::get('employes', [EmployeController::class, 'index'])->name('employes.index');

    // Création d'un employé
    Route::get('employes/create', [EmployeController::class, 'create'])->name('employes.create');
    Route::post('employes', [EmployeController::class, 'store'])->name('employes.store');

    // Affichage d'un employé
    Route::get('employes/{employe}', [EmployeController::class, 'show'])->name('employes.show');

    // Modification d'un employé
    Route::get('employes/{employe}/edit', [EmployeController::class, 'edit'])->name('employes.edit');
    Route::put('employes/{employe}', [EmployeController::class, 'update'])->name('employes.update');

    // Suppression d'un employé
    Route::delete('employes/{employe}', [EmployeController::class, 'destroy'])->name('employes.destroy');
});
Route::get('/employes/dashboard', function () {
    return view('employes.dashboard');
})->middleware('auth')->name('employes.dashboard');


Route::middleware('auth')->group(function () {
    // Liste des clients
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');

    // Création d'un client
    Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');

    // Affichage d'un client
    Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');

    // Modification d'un client
    Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');

    // Suppression d'un client
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
});

Route::get('/clients/dashboard', function () {
    return view('clients.dashboard');
})->middleware('auth')->name('clients.dashboard');


Route::middleware('auth')->group(function () {
    // Liste des documents
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');

    // Création d'un document
    Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');

    // Affichage d'un document
    Route::get('documents/{document}', [DocumentController::class, 'show'])->name('documents.show');

    // Modification d'un document
    Route::get('documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('documents/{document}', [DocumentController::class, 'update'])->name('documents.update');

    // Suppression d'un document
    Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
});

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Routes de l'authentification
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Route pour la déconnexion
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// Routes de réinitialisation du mot de passe
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth', 'role:admin')->group(function () {
    // Routes réservées aux administrateurs
});

Route::middleware('auth', 'role:employe')->group(function () {
    // Routes réservées aux employés
});

Route::middleware('auth', 'role:client')->group(function () {
    // Routes réservées aux clients
});

