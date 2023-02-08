<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return view('pages.cart-new');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'quantity' => ['required', 'numeric'],
            'sku' => ['required', 'exists:products,sku'],
        ]);
//        if (!$request->ajax())
//            return response("Unauthorized",403);

//        if(Auth::check())
//            $identifier = Auth::user()->name;
//        else {
//            $identifier = $request->cookie('cart-id');
//            if($identifier === null)
//                $identifier = md5(Carbon::now()->toString()."-".$request->ip());
//
//        }
        $product = Product::findOrFail($request['sku']);
        //Cart::restore($identifier);
        Cart::add($request->input('sku'), $product->name, $request->input('quantity'), $product->getPrice())->associate('App\Models\Product');
//        $cart = Cart::content();
//        $row_id = "";
//        $qty = 0;
//        if(($query = $cart->where('id',$product->sku))->count()){
//            $item = $query->first();
        ////            $qty = $item->qty;
        ////            $row_id = $item->rowId;
//        }
//
//
//        if(!empty($row_id))
//            Cart::update($row_id, $qty + $request->input('quantity'));
//        else{
//            Cart::add($request->input('sku'), $product->name, $request->input('quantity'), $product->getPrice())->associate('App\Models\Product');
//        }
        //Cart::store($identifier);

        //return response()->json(['status'=>'success'])->withCookie('cart-id',$identifier,60);

        return redirect('product/as-barf-z-wolowina-i-drobiem-zestaw-10x1000g')->with('message', 'OKKKKKKKKKK!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
