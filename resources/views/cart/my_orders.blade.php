@extends('layouts.main')

@section('content')
<section>
<div class="container">
	@if(count($carts) > 0)	
	<div class="row">
	
	@foreach($carts as $cart)      
	  <h1 class="my-4">Order #{{$cart->id}}</h1>
	  <h5 class="my-4" style="margin-left: 50%">Status: <span style="color: green">{{$cart->status->name}}</span></h5>
	
	<table class="table table-hover" style="margin: 1px auto; margin-bottom: 580px;">
	  <thead>
	    <tr>
	      
	      <th scope="col">Item Name</th>
	      <th scope="col">Price/Item</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Total</th>
	      
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($cart->item as $item)
	    <tr>
	      
	      <td>{{$item->product->name}}</td>
	      <td>{{$item->product->price}}.00</td>
	      <td>{{$item->quantity}}</td>
	      <td>{{$item->quantity * $item->product->price}}.00</td>
	      
	    </tr>
		@endforeach


	  </tbody>
	</table>

	@endforeach


	</div>
	<!-- /.row -->
</div>
</section>

@else
<h2 style="color: grey; margin: 100px auto;">You Have Added any Orders Yet. you can browse our shop here.</h2>
<br>
<a href="/shop" class="btn btn-success" style="margin: 1px auto; margin-bottom: 620px;">Browse Products</a>
@endif





@endsection