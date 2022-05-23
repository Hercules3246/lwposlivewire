@include('common.modalHead')
<div class="row">

<div class="col-sm-12 col-md-8">
	<div class="form-group">
        <label for="">Nombre</label>
		<input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Curso Laravel" maxlength="255">
		@error('name') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Codigo</label>
		<input type="text" wire:model.lazy="barcode" class="form-control" placeholder="ej: 232342" >
		@error('barcode') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Costo</label>
		<input type="text" data-type='currency' wire:model.lazy="cost" class="form-control" placeholder="ej: 0.00" >
		@error('cost') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Precio</label>
		<input type="text" data-type='currency' wire:model.lazy="price" class="form-control" placeholder="ej: 0.00" >
		@error('price') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Stock</label>
		<input type="number"  wire:model.lazy="stock" class="form-control" placeholder="ej: 0" >
		@error('stock') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Alertas / Inv. Minimo</label>
		<input type="number"  wire:model.lazy="alerts" class="form-control" placeholder="ej: 10" >
		@error('alerts') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Categorìa</label>
		<select wire:model="categoryid" class="form-control" >
            <option value="Elegir" disabled selected >Elegir</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}"  >{{$category->name}}</option>
            @endforeach
        </select>
		@error('categoryid') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>

<div class="col-sm-12 col-md-8">
    <div class="form-group custom-file">
        <input type="file" class="custom-file-input form-control" wire:model="image"
        accept="image/x-png,image/x-gif,image/x-jpeg"
        >
        <label class="custom-file-label">Imàgen {{$image}}</label>
		@error('image') <span class="text-danger er">{{ $message }}</span> @enderror
    </div>
</div>
</div>
@include('common.modalFooter')
