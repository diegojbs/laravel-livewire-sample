<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class UsuariosComponent extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $mensaje = '';
    public $showModal = false;
    public $idItem = null;

    #[Url(as: 'q')]
    public $search = '';

    public function mount(){
        $this->name = '';
        $this->email = '';
    }

    #[On('user-created')] 
    public function userCreatedListener(){
        $this->mensaje = 'Usuario creado correctamente';
    }

    public function setItem($id){
        $this->idItem = $id;
        $item = User::find($id);
        $this->name = $item->name;
        $this->email = $item->email;
        $this->showModal = true;
    }

    public function guardar(){

        try {
            //code...
            sleep(3);
            if ($this->idItem != null) {
                $item = User::find($this->idItem);
                $item->name = $this->name;
                $item->email = $this->email;
                $item->save();
                $this->mensaje = 'Usuario actualizado correctamente';
            }else{
                $item = new User();
                $item->name = $this->name;
                $item->email = $this->email;
                $item->save();
            }
            // dd($this->name, $this->email);
    
            $this->reset(['name', 'email', 'showModal', 'idItem']);
    
            $this->dispatch('user-created');
        } catch (\Throwable $th) {
            $this->mensaje = 'Error al crear el usuario' . $th->getMessage();
        }
    }

    public function render()
    {
        if($this->search != ''){
            $data = User::where('name', 'ilike', '%'.$this->search.'%')
                ->orWhere('email', 'ilike', '%'.$this->search.'%')            
                ->paginate(10);
        }else{
            $data = User::paginate(10);
        }
        return view('livewire.usuarios-component', compact('data'));
    }
}
