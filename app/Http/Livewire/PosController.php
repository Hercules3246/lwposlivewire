<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class PosController extends Component
{
    public $total, $itemsQuantity,$efectivo,$change;

    public function mount()
    {
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {
        $this->denominations = Denomination::all();
        return view('livewire.pos.component',[
            'denominations' => Denomination::orderBy('value','desc')->get(),
            'cart' => Cart::getContent()->sortBy('name'),
        ])
        ->extends('layouts.theme.app')
        ->section('content');
    }

    public function ACash($value)
    {
        $this->efectivo += ($value == 0 ? $this->total : $value) ;
        $this->change = ($this->efectivo - $this->total);
    }

    protected $listeners=[
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale'
    ];
    // buscar y agregar producto por escaner y/o manual
	public function ScanCode($barcode, $cant = 1)
	{
        $product = Product::where('barcode', $barcode)->first();
		// $this->ScanearCode($barcode, $cant);
        if($product == null || empty($empty))
        {
            $this->emit('scan-notfound','El producto no esta registrado');
        }else{
            if($this->InCart($product->id))
            {
                $this->increaseQty($product->id);
                return;
            }
            if($product->stock < 1 )
            {
                $this->emit('no-stock', 'Stock insuficiente :/');
                return;
            }
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            $this->total = Cart::getTotal();

            $this->emit('scan-ok','Producto Agregado');
        }

	}

    public function InCart($productId)
    {
        $exist = Cart::get($productId);
        if($exist){
            return true;
        }else{
            return false;
        }
    }

    public function increaseQty($productId, $cant = 1)
    {
        $title='';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if($exist)
            $title = 'Cantidad Actualizada';
        else
            $title = 'Producto Agregado';

        if($exist)
        {
            if($product->stock < ($cant + $exist->quantity))
            {
                $this->emit('no-stock','Stock Insuficiente :/');
                return;
            }
        }
        Cart::add($product->id, $product->name, $product->price, $cant,$product->image);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', $title);
    }

    public function updateQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if($exist)
            $title = 'Cantidad Actualizada';
        else
            $title = 'Producto Agregado';

        if($exist)
        {
            if($product->stock < $cant)
            {
                $this->emit('no-stock','Stock Insuficiente :/');
                return;
            }
        }
        $this->removeItem($productId);

        if($cant > 0)
        {
            Cart::add($product->id, $product->name, $product->price, $cant,$product->image);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', $title);
        }
    }

    public function removeItem($productId)
    {

    }

}