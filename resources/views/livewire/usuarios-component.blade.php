<div>
    {{-- <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button> --}}

    <div>
        <div class="form-group">
          <label for="exampleInputName">Name</label>
          <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" wire:model="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" wire:model="email">
          </div>
        <button class="btn btn-primary" wire:click="guardar()">Guardar</button>
    </div>

    {{-- Lista de usaurios --}}

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                {{-- <td>@fat</td> --}}
            </tr>
          @endforeach
          
        </tbody>
      </table>

    {{-- Lista de usuarios FIn| --}}

</div>
