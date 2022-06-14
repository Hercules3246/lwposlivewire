<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client ;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
class ClientController extends Component
{
use WithFileUploads;
use WithPagination;

    // propiedades publicas

    public $name,$nameCompany, $cel, $phone, $address ,$search, $selected_id, $PageTitle, $ComponentName;
    private $pagination = 5;
    // metodo que se va a ejecutar antes de renderizar el componente
    public function mount(){
        $this->ComponentName = 'Clientes';
        $this->PageTitle = 'Listado';
    }

    public function paginationView()

    {

        return 'vendor.livewire.bootstrap';

    }

    public function render()
    {
        if(strlen($this->search) >0)
            $data = Client::where('id','like','%'.$this->search.'%')->orWhere('name','like','%'.$this->search.'%')->paginate($this->pagination);
        else
        $data = Client::orderBy('id','asc')->paginate($this->pagination);

        return view('livewire.client.component', ['data' => $data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id)
	{
		$record = Client::find($id, ['id','name','image']);
		$this->name = $record->name;
		$this->selected_id = $record->id;
		$this->image = null;

		$this->emit('show-modal', 'show-modal');
	}

    public function Store()
	{
		$rules = [
			'name' => 'required|min:3|max:60|regex:/^[ña-zA-Z ]+$/',
			'nameCompany' => 'required|min:3|max:150|regex:/^[ña-zA-Z ]+$/',
			'address' => 'required|min:3|max:200',
            'cel' => 'nullable|numeric|digits:10',
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
            'nameCompany.regex' => 'El nombre del establecimiento solo debe contener letras (No se permiten números o caracteres especiales como tildes, comas, etc).',
            
            'cel.numeric' => 'El numero de celular solo debe tener caracteres numericos',
            'cel.digits' => 'El numero de celular solo debe tener 10 digitos',
           
            'phone.numeric' => 'El numero de telefono solo debe tener caracteres numericos',
		];

		$this->validate($rules, $messages);
        
		$client = Client::create([
			'nombre_representante' => $this->name,
			'nombre_establecimiento' => $this->nameCompany,
			'celular' => $this->cel,
			'telefono' => $this->phone,
			'direccion' => $this->address
		]);



		$this->resetUI();
		$this->emit('client-added','Categoría Registrada');

	}



	public function Update()
	{
		$rules =[
			'name' => "required|min:3|unique:categories,name,{$this->selected_id}"
		];

		$messages =[
			'name.required' => 'Nombre de categoría requerido',
			'name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres',
			'name.unique' => 'El nombre de la categoría ya existe'
		];

		$this->validate($rules, $messages);


		$category = Client::find($this->selected_id);
		$category->update([
			'name' => $this->name
		]);

		if($this->image)
		{
			$customFileName = uniqid() . '_.' . $this->image->extension();
			$this->image->storeAs('public/categories', $customFileName);
			$imageName = $category->image;

			$category->image = $customFileName;
			$category->save();

			if($imageName !=null)
			{
				if(file_exists('storage/categories' . $imageName))
				{
					unlink('storage/categories' . $imageName);
				}
			}

		}

		$this->resetUI();
		$this->emit('category-updated', 'Categoría Actualizada');



	}


    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Client $category)
	{
		$imageName = $category->image;
		$category->delete();

		if($imageName !=null) {
			unlink('storage/categories/' . $imageName);
		}

		$this->resetUI();
		$this->emit('category-deleted', 'Categoría Eliminada');

	}



}
