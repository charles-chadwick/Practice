<?php

namespace App\Livewire;

use App\Enums\UserRole;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentForm extends Component {
    public ?Appointment $appointment;
    public Patient      $patient;
    public              $doctors   = [];
    public              $patient_id;
    public              $doctor_id = 1;
    public              $start;
    public              $end;
    public              $notes;
    public              $status;
    public              $reason;
    public              $type;
    private             $action    = "create";

    public function mount( Appointment $appointment = null ) : void {

        if ( !is_null($appointment->id) ) {
            $this->appointment = $appointment;
            $this->fill($appointment);
            $this->action = "update";
        }

        if ( count($this->doctors) == 0 ) {
            $this->doctors = User::where('role', UserRole::Doctor->value)
                                 ->get();
        }
    }

    public function submit() {
        $this->validate();

        if ( $this->action === "create" ) {
            $this->appointment = Appointment::create(
                [
                    "doctor_id"  => $this->doctor_id,
                    "patient_id" => $this->patient->id,
                    "start"      => $this->start,
                    "end"        => $this->end,
                    "notes"      => $this->notes,
                    "status"     => $this->status,
                    "reason"     => $this->reason,
                    "type"       => $this->type,
                ]);

            session()->flash('message', 'Appointment created successfully.');
            redirect(route('patients.profile', $this->patient->id));
        }
    }

    public function rules() {
        return [
            "doctor_id" => "required|exists:users,id",
            "start"     => "required|date|after:today",
            "end"       => "required|date|after:start",
            "notes"     => "nullable|string",
            "status"    => "required|string",
            "reason"    => "required|string",
            "type"      => "required|string",
        ];
    }

    public function render() : View {
        return view('livewire.appointment-form');
    }
}
