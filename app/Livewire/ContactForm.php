<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Component;

class ContactForm extends Component {

    public ?Contact $contact;
    public          $action = "save";
    public          $type   = "home";
    public          $phone;
    public          $address;
    public          $city;
    public          $state;
    public          $zip;
    public          $patient;

    public function mount( Contact $contact = null ) : void {

        if ( !is_null($contact->id) ) {
            $this->contact = $contact;
            $this->fill($contact);
            $this->action = "update";
        }
    }

    public function render() : View {

        return view('livewire.contact-form');
    }

    public function submit() : void {

        $this->validate();

        $contact_data = [
            "type"    => $this->type,
            "phone"   => $this->phone,
            "address" => $this->address,
            "city"    => $this->city,
            "state"   => $this->state,
            "zip"     => $this->zip,
            "on_id"   => $this->patient->id,
            "on_type" => get_class($this->patient)
        ];

        if ( $this->action == "update" ) {
            $this->contact->update($contact_data);
            session()->flash('success', 'Contact updated successfully');
        }
        else {
            $contact = Contact::create($contact_data);
            session()->flash('success', 'Contact created successfully');
            $this->action = "update";
        }
    }

    public function rules() : array {

        return [
            "type"    => [ "required", "in:Home,Work" ],
            "phone"   => "required|regex:/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/|min:10|max:15",
            "address" => "nullable",
            "city"    => "nullable",
            "state"   => "nullable",
            "zip"     => "nullable"
        ];
    }

}
