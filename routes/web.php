<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PatientController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::resource("appointments", AppointmentController::class)->except([
    "edit",
    "create",
])->middleware(['auth', 'verified']);

Route::resource("dashboard", DashboardController::class)->except([
    "edit",
    "create",
])->middleware(['auth', 'verified']);

Route::resource("settings", SettingController::class)->except([
    "edit",
    "create",
])->middleware(['auth', 'verified']);

Route::resource("patient", PatientController::class)->middleware(['auth', 'verified']);
Route::resource("doctors", DoctorController::class)->middleware(['auth', 'verified']);
Route::post("register/storeDoctor", [
    RegisteredUserController::class,
    "storeDoctor",
])->name("register.storeDoctor");



require __DIR__.'/auth.php';
