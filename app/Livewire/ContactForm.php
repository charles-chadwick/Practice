<?php

namespace App\Livewire;

use App\Enums\AppointmentStatus;
use App\Enums\ContactType;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class ContactForm extends Component {

    public ?Contact $contact;
    public          $obj;
    public          $phone;
    public          $address;
    public          $city;
    public          $state;
    public          $zip;
    public          $type;
    public          $is_primary = 0;
    public          $types;

    public function mount( Contact $contact = null ) : void {
        $types = ContactType::toArray();
        $this->type = array_shift($types);
        $this->types = ContactType::toArray();

        if ( !is_null($contact->id) ) {
            $this->contact = $contact;
            $this->fill($contact);
        }
    }

    public function submit() : void {

        $this->validate();

        $contact_data = [
            'phone'      => $this->phone,
            'address'    => $this->address,
            'city'       => $this->address,
            'state'      => $this->address,
            'zip'        => $this->address,
            'type'       => $this->type,
            'is_primary' => $this->is_primary,
            'on_id'      => $this->obj->id,
            'on_type'    => get_class($this->obj),
            'user_id'    => 1
        ];

        if ( !isset($this->contact->id) ) {
            $this->contact = Contact::create(
                $contact_data
            );

            session()->flash('message', 'Contact created successfully.');
        }
        else {
            $this->contact->update($contact_data);
            session()->flash('message', 'Contact updated successfully.');
        }

        redirect(route('patients.profile', $this->obj->id));
    }

    public function rules() : array {
        return
            [
                'type'       => [ 'required', Rule::in($this->types) ],
                'phone'      => 'required',
                'address'    => 'nullable',
                'city'       => 'nullable',
                'state'      => 'nullable',
                'zip'        => 'nullable',
                'is_primary' => 'required|integer|between:0,1',
            ];
    }

    public function render() : View {
        return view('livewire.contact-form');
    }
}
