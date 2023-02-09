<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $arr = [];
        foreach ($products as $product) {
            array_push($arr, [$product->sku, $product->net_cogs, $product->net_packaging_price, $product->tax_group, "<a class='text-primary' href='/account/analytics/product/$product->sku/edit'>Zarządzaj</a>"]);
        }

        return view('account.analytics.product.index')->with(['data' => $arr]);
    }

    public function create()
    {
        return view('account.analytics.product.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('account.analytics.product.edit')->with('product', $product);
    }

    public function show($id)
    {
        return redirect()->route('account.analytics.product.edit', $id);
    }
}
