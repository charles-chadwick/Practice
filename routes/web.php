<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::prefix("/patients")->group(function () {
    Route::get("/", [PatientController::class, "index"])->name("patients.index");
});