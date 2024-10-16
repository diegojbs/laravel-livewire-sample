<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ProductosComponent extends Component
{
    public $data;
    public $nombre_producto;
    public $descripcion_producto;
    public $id_item = null;

    public function render()
    {
        return view('livewire.productos-component');
    }

    public function mount()
    {
        $this->refrescar();
        // dd($this->data);
    }

    public function guardar()
    {
        // dd($this->nombre_producto, $this->descripcion_producto);
        $this->validate([
            'nombre_producto' => 'required',
            'descripcion_producto' => 'required'
        ]);

        if ($this->id_item) {
            $producto = Producto::find($this->id_item);
            $producto->update([
                'nombre_producto' => $this->nombre_producto,
                'descripcion_producto' => $this->descripcion_producto
            ]);
        } else {
            Producto::create([
                'nombre_producto' => $this->nombre_producto,
                'descripcion_producto' => $this->descripcion_producto
            ]);
        }

        $this->reset(['nombre_producto', 'descripcion_producto']);
        $this-> refrescar();
    }

    public function setItem($id)
    {
        $producto = Producto::find($id);
        $this->nombre_producto = $producto->nombre_producto;
        $this->descripcion_producto = $producto->descripcion_producto;
        $this->id_item = $producto->id;
    }

    public function refrescar()
    {
        $this->data = Producto::all();
    }
    
    public function eliminar($id)
    {
        Producto::destroy($id);
        $this->refrescar();
    }
}
