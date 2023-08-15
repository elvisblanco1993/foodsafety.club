<?php

namespace App\Http\Livewire\Web;

use App\Models\Subscriber;
use Livewire\Component;

class Subscribe extends Component
{
    public $modal;
    public $email;

    public function render()
    {
        return view('livewire.web.subscribe');
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'email:rfc,dns,spoof|unique:subscribers,email'
        ]);

        Subscriber::create([
            'email' => $this->email,
        ]);

        return redirect()->route('thank-you');
    }
}
