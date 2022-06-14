<div class="row sales layout-top-spacing">

	<div class="col-sm-12">
		<div class="widget widget-chart-one">
			<div class="widget-heading">
				<h4 class="card-title">
					<b>{{ $ComponentName }} | {{ $PageTitle }}</b>
				</h4>
				<ul class="tabs tab-pills">
                    @can('User_Create')
					<li>
						<a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
					</li>
                    @endcan
				</ul>
			</div>
            @can('User_Search')

			@include('common.searchbox')
            @endcan
			<div class="widget-content">

				<div class="table-responsive">
					<table class="table table-bordered table striped mt-1">
						<thead class="text-white" style="background: #3B3F5C">
							<tr>
								<th class="table-th text-white">USUARIO</th>
								<th class="table-th text-white text-center">TELEFONO</th>
								<th class="table-th text-white text-center">EMAIL</th>
                                <th class="table-th text-white text-center">STATUS</th>
								<th class="table-th text-white text-center">PERFIL</th>
								<th class="table-th text-white text-center">IMAGEN</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $r)
							<tr>
								<td><h6>{{$r->name}}</h6></td>
								<td class="text-center"><h6>{{$r->phone}}</h6></td>
								<td class="text-center"><h6>{{$r->email}}</h6></td>
								<td class="text-center">
									<span class="badge {{$r->status == 'Active' ? 'badge-success' : 'badge-danger'}} text-uppercase">{{$r->status}}</span>
								</td>
                                <td class="text-center text-uppercase"><h6>{{$r->profile}}</h6></td>
								<td class="text-center">
                                    <span>
										<img src="{{asset('storage/'.$r->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
									</span>
								</td>

								<td class="text-center">
									@can('User_Active')

									<a href="javascript:void(0)"
									onclick="ActiveUser('{{$r->id}}')"
									class="btn btn-dark" title="Activar">
										<i class="fas fa-check-square"></i>
									</a>
                                    @endcan
                                    @can('User_Inactive')

									<a href="javascript:void(0)"
									onclick="InactiveUser('{{$r->id}}')"
									class="btn btn-dark" title="Inactivar">
										<i class="fas fa-ban"></i>
									</a>
                                    @endcan
									
									@can('User_Update')

									<a href="javascript:void(0)"
									wire:click="edit({{$r->id}})"
									class="btn btn-dark mtmobile" title="Editar">
										<i class="fas fa-edit"></i>
									</a>
                                    @endcan
                                    @can('User_Destroy')

									<a href="javascript:void(0)"
									onclick="Confirm('{{$r->id}}')"
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

	@include('livewire.users.form')
</div>


<script>
  document.addEventListener('DOMContentLoaded', function(){
        window.livewire.on('user-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })
        window.livewire.on('user-deleted', Msg => {
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')
        })
        window.livewire.on('show-modal', Msg => {
            $('#theModal').modal('show')
        })
        window.livewire.on('user-withsales', Msg => {
            noty(Msg)
        })
		window.livewire.on('user-active', Msg => {
            noty(Msg)
        })
        window.livewire.on('user-inactive', Msg => {
            noty(Msg)
        })

    });

    function Confirm(id)
    {

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
            if(result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }

        })
    }
	function ActiveUser(id)
    {

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS ACTIVAR EL USUARIO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if(result.value){
                window.livewire.emit('activeUser', id)
                swal.close()
            }

        })
    }
    function InactiveUser(id)
    {

        swal({
            title: 'CONFIRMAR',
            text: '¿CONFIRMAS DESACTIVAR EL USUARIO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Aceptar'
        }).then(function(result) {
            if(result.value){
                window.livewire.emit('inactiveUser', id)
                swal.close()
            }

        })
    }
</script>
