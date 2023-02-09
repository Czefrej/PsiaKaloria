<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserVerificationForm extends Component
{
    private $waiting_time = 60;

    public $waiting;

    public $timer;

    public $status;

    public function mount()
    {
        $this->timer = $this->waiting_time;
    }

    public function render()
    {
        return view('livewire.user-verification-form');
    }

    public function tick()
    {
        if ($this->timer == 0) {
            $this->waiting = false;
            $this->timer = $this->waiting_time;
        } else {
            if ($this->waiting) {
                $this->timer -= 1;
            }
        }
    }
}
