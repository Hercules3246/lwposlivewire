@include('common.modalHead')


<div class="row">

<div class="col-sm-12">
	<label>Nombre del representante: </label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-user"></span>
			</span>
		</div>
		<input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Julian Alberto" maxlength="255">
	</div>
	@error('name') <span class="text-danger er">{{ $message }}</span> @enderror
</div>

<div class="col-sm-12">
	<label>Nombre del establecimiento: </label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-building"></span>
			</span>
		</div>
		<input type="text" wire:model.lazy="nameCompany" class="form-control" placeholder="ej: Tienda don juan" maxlength="255">
	</div>
	@error('nameCompany') <span class="text-danger er">{{ $message }}</span> @enderror
</div>

<div class="col-sm-12">
	<label>Direccion: </label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-address-book"></span>
			</span>
		</div>
		<input type="text" wire:model.lazy="address" class="form-control" placeholder="ej: Cra 20a #40-53, laureano gomez" maxlength="255">
	</div>
	@error('address') <span class="text-danger er">{{ $message }}</span> @enderror
</div>


<div class="col-sm-12">
	<label>Celular: </label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-mobile-retro"></span>
			</span>
		</div>
		<input type="text" wire:model.lazy="cel" class="form-control" placeholder="ej: 3007562487" maxlength="255">
	</div>
	@error('cel') <span class="text-danger er">{{ $message }}</span> @enderror
</div>


<div class="col-sm-12">
	<label>Telefono: </label>
	<div class="input-group">
		<div class="input-group-prepend">
			<span class="input-group-text">
				<span class="fas fa-phone"></span>
			</span>
		</div>
		<input type="text" wire:model.lazy="phone" class="form-control" placeholder="ej: 4373241" maxlength="255">
	</div>
	@error('phone') <span class="text-danger er">{{ $message }}</span> @enderror
</div>




</div>



@include('common.modalFooter')
