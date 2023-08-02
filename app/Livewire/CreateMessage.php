<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Livewire\Forms\MessageForm;

class CreateMessage extends Component
{
    public MessageForm $form;

    public function save()
    {
        // Message::create(
        //     $this->form->all()
        // );

        // return $this->redirect('/posts');
        $this->js("closeModal('modal')");
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
