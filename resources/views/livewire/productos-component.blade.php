<div>
    <div class="row">
        <div class="col">
            <div>
                <div class="form-group">
                    <label for="nombre_producto"> Name</label>
                    <input type="text" class="form-control" id="nombre_producto" wire:model="nombre_producto">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="descripcion_producto" 
                    id="descripcion_producto" cols="30" rows="10" placeholder="Descripción del Producto" wire:model="descripcion_producto"></textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" wire:click="guardar()" >Guardar</button>
                </div>
            </div>
        </div>
        <div class="col">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Descripcion Producto</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->nombre_producto}}</td>
                        <td>{{$item->descripcion_producto}}</td>
                        <td>
                            <button class="btn btn-warning" wire:click="setItem({{$item->id}})">Editar</button>
                            <button class="btn btn-danger" wire:click="eliminar({{$item->id}})">Eliminar</button>
                        </td>
                        {{-- <td>@fat</td> --}}
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
    
    
</div>
