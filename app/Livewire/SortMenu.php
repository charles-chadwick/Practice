<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class SortMenu extends Component
{
    public $options = [];
    public $sort_by;
    public $route;
    public $sort_direction = "asc";

    public function mount($route, $options) : void {
        $this->options = $options;
        $this->sort_by = request('sort_by', array_key_first($this->options));
        $this->route = $route;
    }

    public function render() : View {
        return view('livewire.sort-menu');
    }

    public function sortBy($sort_direction = null) {
        if ($sort_direction !== null) {
            $this->sort_direction = $sort_direction;
        }

        redirect(route($this->route, [
            "sort_by" => $this->sort_by,
            "sort_direction" => $this->sort_direction,
        ]));
    }
}
