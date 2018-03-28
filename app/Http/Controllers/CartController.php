<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Item;
use App\Setting;
class CartController extends Controller
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
        $request->validate([
            ''

        ]);

        $cart = Cart::findOrFail($request->cart_id);

        $total = 0;
        foreach($cart->items as $item){
            $total += $item->product->price * $item->quantity;
        }

        $total_quantity = 0;
            foreach ($cart->items as $item) {
                $total_quantity += $item->quantity; 
            }


        $min_qty = Setting::where('name', 'min_quantity')->first();

        $request->validate([                
                'name' => 'required',
                'company' => 'required',
                'country' => 'required',
                'city' => 'required',
                'shipping_address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'name' => 'required',
                'name' => 'required'        
            ]);

        $cart->total = $total;
        $cart->status_id = 2;
        $cart->name = $request->name;
        $cart->company = $request->company;
        $cart->country = $request->country;
        $cart->city = $request->city;
        $cart->address = $request->address;
        $cart->shipping_address = $request->shipping_address;
        $cart->phone = $request->phone;
        $cart->phone2 = $request->phone2;
        $cart->email = $request->email;
        $cart->update();
        return redirect('/my_orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::id();
        $user_cart = Cart::where('user_id', $user_id)->where('status_id', 1)->first();
        
        $cart_items = Item::all()->where('cart_id', $user_cart->id);

        $total = 0;
        foreach ($cart_items as $item) {
            $total += $item->product->price * $item->quantity; 
        }

        $total_quantity = 0;
        foreach ($cart_items as $item) {
            $total_quantity += $item->quantity; 
        }

        $min_qty = Setting::where('name', 'min_quantity')->first();

        return view('cart.show')->withItems($cart_items)->withTotal($total)->withCart($user_cart)->withTotalQuantity($total_quantity)->withMin_qty($min_qty);
    }

    public function my_orders()
    {
        $user_id = Auth::id();
        $user_cart = Cart::where('user_id', $user_id)->where('status_id', '>=', 2)->get();

        return view('cart.my_orders')->withCarts($user_cart);
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
