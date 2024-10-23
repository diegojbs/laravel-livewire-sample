<div  x-data="{ showModal: $wire.entangle('showModal').live }">
    @if ($mensaje != '')
    <div class="div">
      <div class="alert alert-warning">
        {{ $mensaje }}
      </div>
    </div>
    @endif

    <button class="btn btn-primary" x-on:click="showModal = true">Nuevo</button>


    {{$showModal}}

    <div>
      <input class="form-control" placeholder="Buscar..." type="text" wire:model.live="search">
    </div>

    {{-- <div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
        x-on:click="showModal = true">
        Launch demo modal
      </button>
    </div> --}}

    {{-- Lista de usaurios --}}

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                  <div class="btn btn-warning" wire:click="setItem({{$item->id}})">Editar</div>
                </td>
            </tr>
          @endforeach
          
        </tbody>
      </table>

      <div>
        {{ $data->links() }}
      </div>

    {{-- Lista de usuarios FIn| --}}

    <!-- Modal -->
    <div x-bind:class="! showModal ? 'modal fade' : 'modal fade show'" 
          x-bind:aria-hidden="! showModal ? 'true' : 'false'" 
          x-bind:style="! showModal ? '' : 'display: block;'" 
          x-bind:role="! showModal ? '' : 'dialog'">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{-- Cuerpo del modal --}}
            <div class="form-group">
              <label for="exampleInputName">Name</label>
              <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" wire:model="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" wire:model="email">
              </div>
              
              <div class="mt-3">
                <div wire:loading class="spinner-grow text-info"> 
                  <span class="sr-only"></span>
                </div>
              </div>
            {{-- Fin cuerpo del modal --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" x-on:click="showModal = false">Close</button>
            <button type="button" class="btn btn-primary" wire:click="guardar()">Guardar</button>
          </div>
        </div>
      </div>
    </div>
    {{-- Fin modal --}}

</div>
