<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name("home");

Route::prefix("/patients")->group(function () {
    Route::get("/", [PatientController::class, "index"])->name("patients.index");
    Route::get("/{patient}", [PatientController::class, "profile"])->name("patients.profile");
});
