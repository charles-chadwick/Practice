<?php

namespace App\Livewire;

use App\Models\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class AppointmentList extends Component
{
    public $appointments = [];
    public ? Patient $patient;

    public function render() : View {
        return view('livewire.appointment-list');
    }
}
