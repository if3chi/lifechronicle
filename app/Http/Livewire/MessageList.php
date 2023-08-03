<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class MessageList extends Component
{
    protected $listeners  = ['newMessageCreated'  => '$refresh'];

    public function downloadFile($file)
    {
        $path = storage_path('app\\' . str_replace('docs/', 'docs\\', $file));

        if (!file_exists($path)) {
            $this->notify("File not Found");

            return;
        }

        $this->notify("Download started");

        return response()->download($path);
    }

    public function render()
    {
        return view('livewire.message-list', ['messages' => Message::where('published', 1)
            ->latest()->paginate(15)]);
    }

    private function notify(string $msg)
    {
        $this->dispatchBrowserEvent('notify', [
            'title' => $msg
        ]);
    }
}
