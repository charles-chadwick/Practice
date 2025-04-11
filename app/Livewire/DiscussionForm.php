<?php
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Livewire;

use App\Enums\DiscussionType;
use App\Enums\UserRole;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class DiscussionForm extends Component {

    public ?Discussion $discussion;
    public             $obj;
    public             $title;
    public             $content;
    public             $type;
    public             $types;
    public             $user_id;
    public             $users = [];

    public function mount( Discussion $discussion = null ) : void {
        $types = DiscussionType::toArray();
        $this->type = array_shift($types);
        $this->types = DiscussionType::toArray();

        if ( !is_null($discussion->id) ) {
            $this->discussion = $discussion;
            $this->fill($discussion);
        }

        if ( count($this->users) == 0 ) {
            $this->users = User::get();
        }
    }

    public function submit() : void {

        $this->validate(
            [
                'title'   => 'required',
                'content' => 'required',
                'type'    => 'required',
            ]);

        $discussion_data = [
            'title'   => $this->title,
            'content' => $this->content,
            'type'    => $this->type,
            'on_id'   => $this->obj->id,
            'on_type' => get_class($this->obj),
            'user_id' => $this->user_id
        ];

        if ( !isset($this->discussion->id) ) {
            $this->discussion = Discussion::create(
                $discussion_data
            );

            session()->flash('message', 'Discussion created successfully.');
        }
        else {
            $this->discussion->update($discussion_data);
            session()->flash('message', 'Discussion updated successfully.');
        }

        redirect(route('patients.profile', $this->obj->id));
    }

    public function render() : View {
        return view('livewire.discussion-form');
    }
}
