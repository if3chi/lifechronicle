<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class MessageForm extends Form
{
    #[Rule('required|min:5')]
    public $firstname = '';

    #[Rule('nullable|min:5')]
    public $lastname = '';

    #[Rule('nullable|min:5')]
    public $message = '';

    #[Rule('nullable|min:5')]
    public $filename = '';
}
