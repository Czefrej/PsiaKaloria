<?php

namespace App\Http\Livewire\Analytics\Product;

use Livewire\Component;

class Destroy extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.analytics.product.destroy');
    }

    public function deleteProduct(){
        $sku = $this->product->sku;
        $this->product->delete();
        session()->flash('message', "Produkt $sku został usunięty z bazy danych.");
        return redirect()->route("account.analytics.product.index");
    }
}
