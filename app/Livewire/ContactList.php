<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class ContactList extends Component
{
    public Object $obj;
    public $contacts = [];

    public function mount() {}

    public function render() : View {
        return view('livewire.contact-list');
    }
}
