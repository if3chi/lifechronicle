<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessageList extends Component
{
    public function render()
    {
        return view('livewire.message-list', ['messages'=> []]);
    }
}
