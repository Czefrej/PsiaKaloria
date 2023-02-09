<?php

namespace App\Http\Livewire\Analytics\Product;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $sku;

    public $weight;

    public $tax_group;

    public $net_packaging_price;

    public $net_cogs;

    protected $rules = [
        'sku' => 'required|max:100|unique:products,sku',
        'net_packaging_price' => ['required', 'numeric'],
        'net_cogs' => ['required', 'numeric'],
        'weight' => ['required', 'numeric'],
        'tax_group' => ['required', 'in:PET_FOOD_WET'],
    ];

    public function render()
    {
        return view('livewire.analytics.product.create');
    }

    public function submit()
    {
        $this->validate();

        $product = new Product();
        $product->sku = $this->sku;
        $product->net_cogs = $this->net_cogs;
        $product->net_packaging_price = $this->net_packaging_price;
        $product->weight = $this->weight;
        $product->tax_group = $this->tax_group;

        $product->save();

        session()->flash('message', "Produkt $this->sku został dodany do systemu.");

        return redirect()->route('account.analytics.product.create');
    }
}
