<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Rules\MaxWords;
use App\Rules\MinWords;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMessage extends Component
{
    use WithFileUploads;

    protected $listeners  = ['resetForm'];

    public $editing;
    public $fileUpload;
    public $showForm = false;

    protected $validationAttributes = [
        'editing.fullname' => 'Fullname',
        'editing.phone' => 'Phone',
        'editing.message' => 'Message',
    ];

    protected function rules()
    {
        return [
            'editing.fullname' => 'required|min:2|max:256|string',
            'editing.phone' => 'nullable|string',
            'editing.message' => ['nullable', 'string',  new MinWords(20), new MaxWords(500)],
            'fileUpload' => 'nullable|file|mimes:doc,docx,pdf|max:1024',
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
        $this->editing['phone'] = $this->editing['message'] = '';
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

        Message::create([
            'fullname' => $this->editing['fullname'],
            'phone' => $this->editing['phone'],
            'filename' => $file,
            'message' => $this->editing['message'],
        ]);

        $this->emitTo('message-list', 'newMessageCreated');
        $this->emitSelf('resetForm');
        $this->dispatchBrowserEvent('notify', [
            'title' => "We appreciate your kind words during this difficult time, Thank you for honouring Cecilia."
        ]);
        $this->dispatchBrowserEvent('scrollTimeLineToView');
        $this->showForm = false;
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
