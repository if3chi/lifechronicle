<?php

namespace App\Livewire;

use App\Livewire\Forms\MessageForm;
use Livewire\Component;

class MessageList extends Component
{
    public function render()
    {
        return view('livewire.message-list');
    }
}
