<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller {
    public function index() {

        return view('patients.index', [
            "options"  => [
                'id' => 'MRN',
                'first' => 'First Name',
                'last' => 'Last Name',
                'dob'   => 'Date of Birth'
            ],
            "patients" => Patient::orderBy(request("sort_by", "id"), request("sort_direction", "asc"))
                                 ->get()
        ]);
    }

    public function profile(Patient $patient)
    {
        $patient->load(
            [
                "appointments",
                "contacts",
                "notes"
            ]
        );

        return view("patients.profile", [
            "patient" => $patient
        ]);
    }
}
