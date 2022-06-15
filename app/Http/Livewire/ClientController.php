<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client ;
use App\Models\User ;

use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
class ClientController extends Component
{
use WithFileUploads;
use WithPagination;

    // propiedades publicas

    public $name,$nameCompany, $cel, $phone, $address ,$search, $selected_id, $PageTitle,$vendedorId, $ComponentName;
    private $pagination = 5;
    // metodo que se va a ejecutar antes de renderizar el componente
    public function mount(){
        $this->ComponentName = 'Clientes';
        $this->PageTitle = 'Listado';
		$this->vendedorId = 0;
    }

    public function paginationView()

    {

        return 'vendor.livewire.bootstrap';

    }

    public function render()
    {
		if(Auth::user()->hasRole('SUPER') || Auth::user()->hasRole('ADMIN') )
		{
				//si tenemos una busqueda 
			if(strlen($this->search) >0 ){
				//si tenemos una busqueda y NO tenemos seleccionado un VENDEDOR en especifico 
				if($this->vendedorId == 0){
					$data=Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
					->where('clients.id','like','%'.$this->search.'%')->orWhere('clients.nombre_representante','like','%'.$this->search.'%')
					->orWhere('clients.nombre_establecimiento','like','%'.$this->search.'%')->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);
				// si tenemos una busqueda y tenemos seleccionado un VENDEDOR en especifico 
				}else{
					$data=	Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
					->where('user_id', $this->vendedorId)->where('clients.id','like','%'.$this->search.'%')->
					orWhere('clients.nombre_representante','like','%'.$this->search.'%')->orWhere('clients.nombre_establecimiento','like','%'.$this->search.'%')
					->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);
				}
				//si NO tenemos una busqueda 
			}else{
				//si NO tenemos una busqueda y NO tenemos seleccionado un vendedor 
				if($this->vendedorId == 0){
					$data=	Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
					->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);
				//si NO tenemos una busqueda y tenemos seleccionado un vendedor y NO una busqueda
				}else{
					$data=	Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
					->where('user_id', $this->vendedorId)->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);

				}
			}
			$vendedores = User::orderBy('name', 'asc')->get();

		}else {
			if(strlen($this->search) >0){
			$data=	Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
			->where('user_id','=',Auth::user()->id)->where('clients.id','like','%'.$this->search.'%')->
			orWhere('clients.nombre_representante','like','%'.$this->search.'%')->orWhere('clients.nombre_establecimiento','like','%'.$this->search.'%')
			->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);
			}else
			{
			$data=	Client::select('clients.id as idcliente','clients.nombre_establecimiento','clients.nombre_representante','clients.celular','clients.telefono','clients.direccion','clients.updated_by','clients.user_id','clients.created_at as fcreacion','u.*')
			->where('user_id','=',Auth::user()->id)->join('users as u','u.id','clients.user_id')->orderBy('clients.id','desc')->paginate($this->pagination);
			}
			$vendedores = User::orderBy('name', 'asc')->get();

		}

        return view('livewire.client.component', ['data' => $data,'vendedores' => $vendedores])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id)
	{
		$record = Client::find($id, ['id','nombre_establecimiento','nombre_representante','celular','telefono','direccion']);
		$this->name = $record->nombre_representante;
		$this->nameCompany = $record->nombre_establecimiento;
		$this->address = $record->direccion;
		$this->cel = $record->celular;
		$this->phone = $record->telefono;
		$this->selected_id = $record->id;
		$this->emit('show-modal', 'show-modal');
	}

    public function Store()
	{
		$rules = [
			'name' => 'required|min:3|max:60|regex:/^[ña-zA-Z ]+$/',
			'nameCompany' => 'required|min:3|max:150|string',
			'address' => 'required|min:3|max:200',
            'cel' => 'required|numeric|digits:10|unique:clients,celular',
            'phone' => 'nullable|numeric',
		];

		$messages = [
			'name.required' => 'Nombre del representante es requerido',
			'name.max' => 'El nombre del representante debe tener maximo 60 caracteres',
			'name.min' => 'El nombre del representante debe tener al menos 3 caracteres',
            'name.regex' => 'El nombre del representante solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'nameCompany.required' => 'Nombre del establecimiento es requerido',
			'nameCompany.max' => 'El nombre del establecimiento debe tener maximo 150 caracteres',
			'nameCompany.min' => 'El nombre del establecimiento debe tener al menos 3 caracteres',
            'nameCompany.string' => 'El nombre del establecimiento debe contener caracteres alphanumericos',
            'cel.required' => 'El numero de celular es requerido',
            'cel.numeric' => 'El numero de celular solo debe tener caracteres numericos',
            'cel.digits' => 'El numero de celular solo debe tener 10 digitos',
			'cel.unique' => 'El numero de celular ya existe registrado a un cliente',
            'phone.numeric' => 'El numero de telefono solo debe tener caracteres numericos',
		];

		$this->validate($rules, $messages);
        
		$client = Client::create([
			'nombre_representante' => $this->name,
			'nombre_establecimiento' => $this->nameCompany,
			'celular' => $this->cel,
			'telefono' => $this->phone,
			'direccion' => $this->address,
			'user_id' => auth()->user()->id
		]);



		$this->resetUI();
		$this->emit('client-added','Cliente Registrado');

	}



	public function Update()
	{
		$rules = [
			'name' => 'required|min:3|max:60|regex:/^[ña-zA-Z ]+$/',
			'nameCompany' => 'required|min:3|max:150|string',
			'address' => 'required|min:3|max:200',
            'cel' => "required|numeric|digits:10|unique:clients,celular,{$this->selected_id}",
            'phone' => 'nullable|numeric',
		];

		$messages = [
			'name.required' => 'Nombre del representante es requerido',
			'name.max' => 'El nombre del representante debe tener maximo 60 caracteres',
			'name.min' => 'El nombre del representante debe tener al menos 3 caracteres',
            'name.regex' => 'El nombre del representante solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            'nameCompany.required' => 'Nombre del establecimiento es requerido',
			'nameCompany.max' => 'El nombre del establecimiento debe tener maximo 150 caracteres',
			'nameCompany.min' => 'El nombre del establecimiento debe tener al menos 3 caracteres',
            'nameCompany.string' => 'El nombre del establecimiento debe contener caracteres alphanumericos',
            'cel.required' => 'El numero de celular es requerido',
            'cel.numeric' => 'El numero de celular solo debe tener caracteres numericos',
            'cel.digits' => 'El numero de celular solo debe tener 10 digitos',
			'cel.unique' => 'El numero de celular ya existe registrado a un cliente',
            'phone.numeric' => 'El numero de telefono solo debe tener caracteres numericos'
		];

		$this->validate($rules, $messages);


		$client = Client::find($this->selected_id);
		$client->update([
			'nombre_representante' => $this->name,
			'nombre_establecimiento' => $this->nameCompany,
			'celular' => $this->cel,
			'telefono' => $this->phone,
			'direccion' => $this->address,
			'updated_by' => Auth::user()->id,
			'user_id' => $client->user_id,
			

		]);

		
		$this->resetUI();
		$this->emit('client-updated', 'Cliente Actualizado');



	}


    public function resetUI()
    {
        $this->name = '';
        $this->nameCompany = '';
        $this->cel = '';
        $this->phone = '';
        $this->address = '';
        $this->search = '';
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Client $client)
	{
		$client->delete();

		
		$this->resetUI();
		$this->emit('client-deleted', 'Cliente Eliminado');

	}



}
