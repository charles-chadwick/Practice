<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('patients.index', [
            "patients" => Patient::all()
        ]);
    }

    public function profile(Patient $patient)
    {
        $patient->load("contacts");
        return view("patients.profile", [
            "patient" => $patient
        ]);
    }
}
