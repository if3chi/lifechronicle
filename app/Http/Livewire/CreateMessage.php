<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Rules\{MinWords, MaxWords};

class CreateMessage extends Component
{
    use WithFileUploads;

    protected $listeners  = ['resetForm'];

    public $editing;
    public $showForm = false;
    public $fileUpload;

    protected $validationAttributes = [
        'editing.fullname' => 'Fullname',
        'editing.phone' => 'Phone',
        'editing.message' => 'Message',
        'fileUpload' => 'file|mimes:doc,docx,pdf|max:1024',
    ];

    protected function rules()
    {
        return [
            'editing.fullname' => 'required|min:2|max:256|string',
            'editing.phone' => 'nullable|string',
            'editing.message' => ['nullable', 'string',  new MinWords(20), new MaxWords(500)]
        ];
    }

    public function resetForm()
    {
        $this->reset('editing');
    }

    public function showForm()
    {
        $this->reset('editing');
        $this->resetValidation();
        $this->showForm = true;
    }

    public function save()
    {
        $this->validate();
        $file = null;

        if ($this->fileUpload) {
            $name = $this->fileUpload->getClientOriginalName();
            $extension = '.' . $this->fileUpload->getClientOriginalExtension();
            $filename = time() . str_replace([" ", $extension], "", $name) . $extension;
            $file = $this->fileUpload->storePubliclyAs('docs', $filename);
        }

        $msg = Message::create([
            'fullname' => $this->editing['fullname'],
            'phone' => $this->editing['phone'],
            'filename' => $file,
            'message' => $this->editing['message'],
        ]);

        $this->emitSelf('resetForm');
        $this->dispatchBrowserEvent('notify', ['title' => "Created Successfully, Thank you."]);
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
