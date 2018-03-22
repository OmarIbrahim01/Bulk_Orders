<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Item;
use App\User;


class AdminController extends Controller
{



      /////////////////////////////////////////
     ///////////////Orders////////////////////
    /////////////////////////////////////////
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orders_index()
    {
        $orders = Cart::all()->where('status_id', '>=', '2');

        return view('admin.orders.index')->withOrders($orders);
    }

    public function orders_show($id)
    {
        
        $cart = Cart::findOrFail($id);
        
        $cart_items = Item::all()->where('cart_id', $id);
        $item_total = 0;
        foreach ($cart_items as $item) {
            $item_total += $item->product->price * $item->quantity; 
        }

        

        return view('admin.orders.show')->withItems($cart_items)->withTotal($item_total)->withCart($cart);
    }




      /////////////////////////////////////////
     ///////////////Customers/////////////////
    /////////////////////////////////////////

    public function customers_index()
    {
        $customers = User::all()->where('permission', '0');

        return view('admin.customers.index')->withCustomers($customers);
    }


     public function customers_show($id)
    {
        $customer = User::findOrFail($id);
        $customer_carts = $customer->cart->where('status_id', '>=', 2);

        return view('admin.customers.show')->withCustomer($customer)->withCarts($customer_carts);
    }

















///////////////////////////////////////////////////////////////////////////////////////
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
