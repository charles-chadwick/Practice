<?php

namespace App\Livewire;

use App\Models\Note;
use App\Models\Patient;
use Illuminate\Notifications\Action;
use Livewire\Component;

class NoteForm extends Component {

    public ?Note $note;
    public       $class  = null;
    public       $title;
    public       $content;
    public       $type;
    public       $action = "create";

    public function mount( Note $note = null ) : void {
        if ( !is_null($note->id) ) {
            $this->note = $note;
            $this->fill($note);
        }
    }

    public function submit() {

        $this->validate(
            [
                'title'   => 'required',
                'content' => 'required',
                'type'    => 'required',
            ]);

        $note_data = [
            'title'   => $this->title,
            'content' => $this->content,
            'type'    => $this->type,
            'on_id'   => $this->class->id,
            'on'      => get_class($this->class),
            'user_id' => 1
        ];

        if ( $this->action === "create" ) {
            $this->note = Note::create(
                $note_data
            );

            session()->flash('message', 'Note created successfully.');
        }
        else {
            $this->note->update($note_data);
            session()->flash('message', 'Note updated successfully.');
        }

        redirect(route('patients.profile', $this->patient_id));
    }

    public function render() {
        return view('livewire.note-form');
    }
}
