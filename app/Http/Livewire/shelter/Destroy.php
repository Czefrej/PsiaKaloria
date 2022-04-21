<?php

namespace App\Http\Livewire\Shelter;

use Livewire\Component;

class Destroy extends Component
{
    public $shelter;


    public function render()
    {
        return view('livewire.shelter.destroy');
    }

    public function deleteShelter(){
        $name = $this->shelter->name;
        $this->shelter->delete();
        session()->flash('message', "Schronisko $name zostało usunięte z bazy danych.");
        return redirect()->route("account.shelter.index");
    }
}
