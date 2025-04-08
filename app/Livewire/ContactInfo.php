<?php

namespace App\Livewire;

use App\Enums\ContactType;
use App\Models\Contact;
use Livewire\Component;

class ContactInfo extends Component
{
    public $contacts = [];

    public function mount($contacts) : void {
        $this->contacts = $contacts;
    }

    public function render() : \Illuminate\View\View {
        return view('livewire.contact-info');
    }
}
