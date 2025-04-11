<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class DiscussionList extends Component {
    public $discussions = [];
    public $obj_on;

    public function render() : View {
        return view('livewire.discussion-list');
    }
}
