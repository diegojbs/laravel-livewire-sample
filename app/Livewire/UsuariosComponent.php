<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuariosComponent extends Component
{
    public $name;
    public $email;

    public function mount(){
        $this->name = '';
        $this->email = '';
    }

    public function guardar(){

        // dd($this->name, $this->email);
        $item = new User();
        $item->name = $this->name;
        $item->email = $this->email;
        $item->save();

        $this->reset(['name', 'email']);
    }

    public function render()
    {
        $data = User::all();
        return view('livewire.usuarios-component', compact('data'));
    }
}
