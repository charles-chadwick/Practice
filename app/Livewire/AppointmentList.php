<?php

namespace App\Livewire;

use App\Models\Patient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentList extends Component
{
    use WithPagination;

    public $appointments = [];
    public ? Patient $patient;

    public function render() : View {
        return view('livewire.appointment-list');
    }
}
