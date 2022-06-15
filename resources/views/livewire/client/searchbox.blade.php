<div class="row justify-content-start">
    @can('Client_Search')
    <div class="col-lg-4 col-md-4 col-sm-12">

        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text input-gp">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <input type="text" wire:model="search" placeholder="Buscar" class="form-control">
        </div>

    </div>
    @endcan
    @can('Client_Filter')

    <div class="col-lg-4 col-md-4 col-sm-12">

      
        <div class="form-group">
            <select wire:model="vendedorId" class="form-control">
                <option value="0">Todos</option>
                @foreach($vendedores as $vendedor)
                <option value="{{$vendedor->id}}">{{$vendedor->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    @endcan
</div>
