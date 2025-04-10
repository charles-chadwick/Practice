<?php

namespace App\Livewire;

use Livewire\Component;

class NoteList extends Component
{
    public $notes = [];
    public $obj_on;

    public function render()
    {
        return view('livewire.note-list');
    }
}
