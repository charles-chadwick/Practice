<?php

namespace App\Livewire;

use App\Models\Note;
use App\Models\Patient;
use Illuminate\Notifications\Action;
use Illuminate\View\View;
use Livewire\Component;

class NoteForm extends Component {

    public ?Note $note;
    public       $obj;
    public       $title;
    public       $content;
    public       $type;
    public       $types;

    public function mount( Note $note = null ) : void {
        $this->types = Note::$types;
        $this->type = array_shift(Note::$types);

        if ( !is_null($note->id) ) {
            $this->note = $note;
            $this->fill($note);
        }


    }

    public function submit() : void {

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
            'on_id'   => $this->obj->id,
            'on_type' => get_class($this->obj),
            'user_id' => 1
        ];

        if ( ! isset($this->note->id) ) {
            $this->note = Note::create(
                $note_data
            );

            session()->flash('message', 'Note created successfully.');
        }
        else {
            $this->note->update($note_data);
            session()->flash('message', 'Note updated successfully.');
        }

        redirect(route('patients.profile', $this->obj->id));
    }

    public function render() : View {
        return view('livewire.note-form');
    }
}
