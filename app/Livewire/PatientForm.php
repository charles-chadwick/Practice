<?php

namespace App\Livewire;

use App\Models\Patient;
use Illuminate\View\View;
use Livewire\Component;

class PatientForm extends Component {

    public ?Patient $patient;
    public          $first;
    public          $middle;
    public          $last;
    public          $dob;
    public          $gender;
    public          $email;
    public          $action = "save";

    public function mount( Patient $patient = null ) : void {

        if ( !is_null($patient->id) ) {
            $this->patient = $patient;
            $this->fill($patient);
            $this->action = "update";
        }
    }

    public function render() : View {

        return view('livewire.patient-form');
    }

    public function submit() : void {

        $this->validate();

        $patient_data = [
            "first"  => $this->first,
            "middle" => $this->middle,
            "last"   => $this->last,
            "dob"    => $this->dob,
            "gender" => $this->gender,
            "email"  => $this->email,
        ];

        if ( $this->action == "update" ) {
            $this->patient->update($patient_data);
            session()->flash('success', 'Patient updated successfully');
        }
        else {
            $patient = Patient::create($patient_data);
            session()->flash('success', 'Patient created successfully');
            $this->action = "update";
        }
    }

    public function rules() : array {

        return [
            "first"  => "required",
            "middle" => "nullable|min:1|max:255",
            "last"   => "required",
            "dob"    => "required",
            "gender" => "required",
            "email"  => "email|nullable"
        ];
    }

}
