<?php

namespace App\Livewire;

use App\Models\Patient;
use Illuminate\Notifications\Action;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class PatientForm extends Component {

    public ?Patient $patient;
    public          $first;
    public          $middle;
    public          $last;
    public          $email;
    public          $dob;
    public          $gender;
    public          $action = "create";

    public function mount( Patient $patient = null ) : void {
        if ( !is_null($patient->id) ) {
            $this->patient = $patient;
            $this->fill($patient);
            $this->action = "update";
        }
    }

    public function submit() : Redirector {

        $this->validate(
            [
                "first"  => "required",
                "middle" => "required",
                "last"   => "required",
                "email"  => "required",
                "dob"    => "required",
                "gender" => "required",
            ]);

        $patient_data = [
            "first"  => $this->first,
            "middle" => $this->middle,
            "last"   => $this->last,
            "email"  => $this->email,
            "dob"    => $this->dob,
            "gender" => $this->gender,
        ];

        if ( $this->action === "create" ) {
            $this->patient = Patient::create(
                $patient_data
            );

            session()->flash('message', 'Patient created successfully.');
        }
        else {
            $this->patient->update($patient_data);
            session()->flash('message', 'Patient updated successfully.');
        }

        return redirect(route('patients.profile', $this->patient->id));
    }

    public function render() {
        return view('livewire.patient-form');
    }
}
