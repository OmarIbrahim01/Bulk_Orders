<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $min_qty = Product::find($request->product_id)->min_quantity;
        
        $request->validate([                
                'quantity' => 'required|numeric|min:'.$min_qty              
            ]);

        $user_cart_id = Auth::user()->cart->where('status_id', '1')->first();
        if(empty($user_cart_id)){
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->status_id = 1;
            $cart->save();
            $user_cart_id = $cart->id;
        }
        
        $item = new Item;
        $item->cart_id = $user_cart_id->id;
        $item->product_id = $request->product_id;
        $item->quantity = $request->quantity;
        $item->save();

        session()->flash('message', 'Item Added to Shopping Cart Successfully!');

        return back();
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
        $item = Item::findOrFail($id);
        $item->delete();
        return back()->withMessage('Item Has Been Removed');
    }
}
