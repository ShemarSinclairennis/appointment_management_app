<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PatientController;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Mail;
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
})->name('welcome');



//Admin Middleware
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {

    Route::delete("register/deleteDoctor", [
        RegisteredUserController::class,
        "deleteDoctor",
    ])->name("register.deleteDoctor")->middleware(['auth', 'verified']);

    Route::post("register/storeDoctor", [
        RegisteredUserController::class,
        "storeDoctor",
    ])->name("register.storeDoctor")->middleware(['auth', 'verified']);

    Route::get("doctors", [
        DoctorController::class,
        "index",
    ])->name("doctors.index")->middleware(['auth', 'verified']);
});


//Patient Middleware
Route::group(['middleware' => 'App\Http\Middleware\PatientMiddleware'], function () {

    

    Route::get("dashboard", [
        DashboardController::class,
        "index",
    ])->name("dashboard.index")->middleware(['auth', 'verified']);

    Route::get("patient/create", [
        PatientController::class,
        "create",
    ])->name("patient.create")->middleware(['auth', 'verified']);

    Route::post("patient/store", [
        PatientController::class,
        "store",
    ])->name("patient.store")->middleware(['auth', 'verified']);

    Route::put("patient/{patient}", [
        PatientController::class,
        "update",
    ])->name("patient.update")->middleware(['auth', 'verified']);

    Route::get("patient/{patient}/edit", [
        PatientController::class,
        "edit",
    ])->name("patient.edit")->middleware(['auth', 'verified']);

    Route::delete("patient/{patient}", [
        PatientController::class,
        "destroy",
    ])->name("patient.destroy")->middleware(['auth', 'verified']);
   
    Route::get("settings", [
        SettingController::class,
        "index",
    ])->name("settings.index")->middleware(['auth', 'verified']);

    Route::get("register/deleteUser", [
        RegisteredUserController::class,
        "deleteUser",
    ])->name("register.deleteUser")->middleware(['auth', 'verified']);

    Route::get("patient/information", [
        PatientController::class,
        "patientInformation",
    ])->name("patient.patientInformation")->middleware(['auth', 'verified']);

    Route::get("appointments/show", [
        AppointmentController::class,
        "show",
    ])->name("appointments.show")->middleware(['auth', 'verified']);

    Route::post("appointments/store", [
        AppointmentController::class,
        "store",
    ])->name("appointments.store")->middleware(['auth', 'verified']);

    Route::delete("appointments/{appointment}", [
        AppointmentController::class,
        "destroy",
    ])->name("appointments.destroy")->middleware(['auth', 'verified']);
});


//Doctor Middleware
Route::group(['middleware' => 'App\Http\Middleware\DoctorMiddleware'], function () {

    Route::get("patient", [
        PatientController::class,
        "index",
    ])->name("patient.index")->middleware(['auth', 'verified']);

    Route::put("appointment/confirm", [
        AppointmentController::class,
        "confirmAppointment",
    ])->name("appointment.confirm")->middleware(['auth', 'verified']);

    Route::put("appointment/decline", [
        AppointmentController::class,
        "declineAppointment",
    ])->name("appointment.decline")->middleware(['auth', 'verified']);

    Route::get("appointments/index", [
        AppointmentController::class,
        "index",
    ])->name("appointments.index")->middleware(['auth', 'verified']);

    
});
Route::delete("appointments/{appointment}", [
    AppointmentController::class,
    "destroy",
])->name("appointments.destroy")->middleware(['auth', 'verified']);
// Route::resource("appointments", AppointmentController::class)->except([
//     "edit",
//     "create",
// ])->middleware(['auth', 'verified']);

// Route::resource("dashboard", DashboardController::class)->except([
//     "edit",
//     "create",
// ])->middleware(['auth', 'verified']);

// Route::resource("settings", SettingController::class)->except([
//     "edit",
//     "create",
// ])->middleware(['auth', 'verified']);

// Route::resource("patient", PatientController::class)->except(["show"])->middleware(['auth', 'verified']);
// Route::resource("doctors", DoctorController::class)->middleware(['auth', 'verified']);
// Route::get("patient/information", [
//     PatientController::class,
//     "patientInformation",
// ])->name("patient.patientInformation");

// Route::post("register/storeDoctor", [
//     RegisteredUserController::class,
//     "storeDoctor",
// ])->name("register.storeDoctor");

// Route::get("register/deleteUser", [
//     RegisteredUserController::class,
//     "deleteUser",
// ])->name("register.deleteUser");

// Route::delete("register/deleteDoctor", [
//     RegisteredUserController::class,
//     "deleteDoctor",
// ])->name("register.deleteDoctor");

// Route::put("appointment/confirm", [
//     AppointmentController::class,
//     "confirmAppointment",
// ])->name("appointment.confirm");

// Route::put("appointment/declined", [
//     AppointmentController::class,
//     "declineAppointment",
// ])->name("appointment.declined");




require __DIR__ . '/auth.php';
