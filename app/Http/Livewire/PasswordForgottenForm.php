<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PasswordForgottenForm extends Component
{

    private $waiting_time = 60;
    public $waiting;
    public $timer;
    public $status;
    public $errors;
    public $old_email;

    public function mount(){
        $this->timer = $this->waiting_time;
    }

    public function render()
    {
        return view('livewire.password-forgotten-form');
    }

    public function tick(){
        if($this->timer == 0) {
            $this->waiting = false;
            $this->timer = $this->waiting_time;
        }else{
            if($this->waiting) {
                $this->timer -= 1;
            }
        }
    }
}
