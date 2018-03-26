<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Item;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        if(Auth::check()){
            $user_cart_id = Auth::user()->cart->where('status_id', '1')->first();
            if(empty($user_cart_id)){
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->status_id = 1;
                $cart->save();
                $user_cart_id = $cart;
            }
            $items = Item::all()->where('cart_id', $user_cart_id->id);
            $total = 0;
            foreach($items as $item){
                $total = $total + $item->product->price * $item->quantity;
            }

            $total_quantity = 0;
            foreach ($items as $item) {
                $total_quantity += $item->quantity; 
            }

            return view('shop.index')->withProducts($products)->withCart($user_cart_id)->withItems($items)->withTotal($total)->withTotalQuantity($total_quantity);

        }else {

            return view('shop.index')->withProducts($products);

        }

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.show')->withProduct($product);
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
