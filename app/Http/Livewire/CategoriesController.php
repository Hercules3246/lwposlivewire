<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
class CategoriesController extends Component
{
use WithFileUploads;
use WithPagination;

    // propiedades publicas

    public $name, $search, $image, $selected_id, $PageTitle, $ComponentName;
    private $pagination = 5;
    // metodo que se va a ejecutar antes de renderizar el componente
    public function mount(){
        $this->ComponentName = 'Categorìas';
        $this->PageTitle = 'Listado';
    }

    public function paginationView()

    {

        return 'vendor.livewire.bootstrap';

    }

    public function render()
    {
        if(strlen($this->search) >0)
            $data = Category::where('name','like','%'.$this->search.'%')->paginate($this->pagination);
        else
        $data = Category::orderBy('id','desc')->paginate($this->pagination);

        return view('livewire.category.categories', ['categories' => $data])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function Edit($id)
	{
		$record = Category::find($id, ['id','name','image']);
		$this->name = $record->name;
		$this->selected_id = $record->id;
		$this->image = null;

		$this->emit('show-modal', 'show-modal');
	}

}
