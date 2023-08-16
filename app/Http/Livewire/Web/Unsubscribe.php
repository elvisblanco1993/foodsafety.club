<?php

namespace App\Http\Livewire\Web;

use App\Models\Subscriber;
use Livewire\Component;

class Unsubscribe extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.web.unsubscribe');
    }

    public function unsubscribe() {
        $this->validate([
            'email' => 'email:rfc,dns,spoof|exists:subscribers,email'
        ]);

        Subscriber::where('email', $this->email)->delete();
        session()->push('unsubscribed', 1);
        return redirect()->route('unsubscribe');
    }
}
