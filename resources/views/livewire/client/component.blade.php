<div class="row sales layout-top-spacing">

	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b>{{$ComponentName}} | {{$PageTitle}}</b>
				</h4>
				<ul class="tabs tab-pills">
                    @can('Client_Create')
					<li>
						<a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
					</li>
                    @endcan
				</ul>
			</div>
           
			@include('livewire.client.searchbox')
            
            
			<div class="widget-content">

				<div class="table-responsive">
					<table class="table table-bordered table striped mt-1">
						<thead class="text-white" style="background: #3B3F5C">
							<tr>
								<th class="table-th text-white">FOLIO</th>
								<th class="table-th text-white text-center">N. REPRESENTANTE</th>
								<th class="table-th text-white text-center">N. ESTABLECIMIENTO</th>
								<th class="table-th text-white text-center">CELULAR</th>
								<th class="table-th text-white text-center">TELEFONO</th>
								<th class="table-th text-white text-center">DIRECCION</th>
                                <th class="table-th text-white text-center">VENDEDOR</th>
                                <th class="table-th text-white text-center">F. CREACION</th>
								<th class="table-th text-white text-center">ACCIONES</th>

							</tr>
						</thead>
						<tbody>
                            @foreach ($data as $client)

							<tr>
								<td><h6>{{$client->idcliente}}</h6></td>
								<td class="text-center">
                                    <h6>{{$client->nombre_representante}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->nombre_establecimiento}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->celular}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->telefono}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->direccion}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->name}}
								</td>
                                <td class="text-center">
                                    <h6>{{$client->fcreacion}}
								</td>
                                @can('Client_Update')
								<td class="text-center">
									<a href="javascript:void(0)"
                                    wire:click="Edit({{$client->id}})"
                                    class="btn btn-dark mtmobile" title="Editar">
										<i class="fas fa-edit"></i>
									</a>
                                @endcan
                                @can('Client_Destroy')
                                    <a href="javascript:void(0)"
                                    onclick="Confirm('{{$client->id}}')"
                                    class="btn btn-dark" title="Eliminar">
										<i class="fas fa-trash"></i>
									</a>
                                @endcan
								</td>
							</tr>
                            @endforeach

						</tbody>
					</table>
					{{$data->links()}}
				</div>

			</div>


		</div>


	</div>

	@include('livewire.client.form')
</div>


<script>
	document.addEventListener('DOMContentLoaded', function(){
            window.livewire.on('client-added',msg => {
                $('#theModal').modal('hide');
                noty(msg)
            });
            window.livewire.on('client-updated',msg => {
                $('#theModal').modal('hide');
                noty(msg)
            });
            window.livewire.on('client-deleted',msg => {
                noty(msg)
            });
            window.livewire.on('hide-modal',msg => {
                $('#theModal').modal('hide');
            });
            window.livewire.on('show-modal',msg => {
                $('#theModal').modal('show');
            });
            $('#themodal').on('hidden.bs.modal',function(e){
                $('.er').css('display','none');
            });
	});
	function Confirm(id, products)
     {
        if(products > 0)
        {
            swal('NO SE PUEDE ELIMINAR LA CATEGORIA PORQUE TIENE PRODUCTOS RELACIONADOS')
            return;
        }

swal({
    title: 'CONFIRMAR',
    text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
    type: 'warning',
    showCancelButton: true,
    cancelButtonText: 'Cerrar',
    cancelButtonColor: '#fff',
    confirmButtonColor: '#3B3F5C',
    confirmButtonText: 'Aceptar'
}).then(function(result) {
    if (result.value) {
        window.livewire.emit('deleteRow', id)
        swal.close()
    }

})
}

</script>
