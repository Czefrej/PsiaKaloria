<?php

namespace App\Http\Livewire\Analytics\Product;

use Livewire\Component;

class Edit extends Component
{
    public $product;

    protected $rules = [
        'product.net_packaging_price' => ['required','numeric'],
        'product.net_cogs' => ['required','numeric'],
        'product.weight' => ['required','numeric'],
        'product.tax_group' => ['required', 'in:PET_FOOD_WET']
    ];

    public function render()
    {
        return view('livewire.analytics.product.edit');
    }

    public function submit()
    {
        $this->validate();


        $this->product->save();
        $sku = $this->product->sku;
        session()->flash('message', "Produkt $sku został zaktualizowany.");
        return redirect()->route('account.analytics.product.edit', $this->product->sku);
    }
}
