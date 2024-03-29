<?php

namespace App\Http\Livewire\Navigation;

use App\Models\Navitem;
use Livewire\Component;

class Navigation extends Component
{
    public $items;
    public $openSlideOver = false;
    public $addNewItem = false;

    public function mount()
    {
        $this->items = Navitem::all();
    }

    public function openSlide($addNewItem = false)
    {
        $this->addNewItem = $addNewItem;
        $this->openSlideOver = true;
    }

    public function render()
    {
        return view('livewire.navigation.navigation');
    }
}
