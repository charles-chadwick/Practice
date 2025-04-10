<?php

namespace App\Livewire;

use App\Enums\AppointmentStatus;
use App\Enums\UserRole;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\View\View;
use Livewire\Component;

class AppointmentForm extends Component {
    public ?Appointment $appointment;
    public Patient      $patient;

    public $patient_id;
    public $doctor_id = 1;
    public $start_date;
    public $start_time;
    public $duration;
    public $notes;
    public $status;
    public $reason;
    public $type;

    public $doctors  = [];
    public $types    = [];
    public $statuses = [];

    public function mount( Appointment $appointment = null ) : void {
        $this->types = Appointment::$types;
        $this->type = array_shift(Appointment::$types);

        $statuses = AppointmentStatus::toArray();
        $this->status = array_shift($statuses);
        $this->statuses = AppointmentStatus::toArray();

        if ( !is_null($appointment->id) ) {
            $this->appointment = $appointment;
            $this->fill($appointment);
            $this->start_date = Carbon::parse($appointment->start)
                                      ->format('Y-m-d');
            $this->start_time = Carbon::parse($appointment->start)
                                      ->format('H:i');
        }

        if ( count($this->doctors) == 0 ) {
            $this->doctors = User::where('role', UserRole::Doctor->value)
                                 ->get();
        }


    }

    public function submit() {
        $this->validate();

        $appointment_data = [
            "doctor_id"  => $this->doctor_id,
            "patient_id" => $this->patient->id,
            "start"      => $this->start_date.' '.$this->start_time,
            "duration"   => $this->duration,
            "notes"      => $this->notes,
            "status"     => $this->status,
            "reason"     => $this->reason,
            "type"       => $this->type,
        ];

        if ( !isset($this->appointment->id) ) {
            $this->appointment = Appointment::create(
                $appointment_data);

            session()->flash('message', 'Appointment created successfully.');

        }
        else {
            $this->appointment->update(
                $appointment_data
            );
            session()->flash('message', 'Appointment updated successfully.');
        }

        return redirect(route('patients.profile', $this->patient->id));
    }

    public function rules() : array {
        return [
            "doctor_id"  => "required|exists:users,id",
            "start_date" => "required|date|date_format:Y-m-d",
            "start_time" => "required|date_format:H:i",
            "duration"   => "required|numeric",
            "notes"      => "nullable|string",
            "status"     => "required|string",
            "reason"     => "required|string",
            "type"       => "required|string",
        ];
    }

    public function render() : View {
        return view('livewire.appointment-form');
    }
}
