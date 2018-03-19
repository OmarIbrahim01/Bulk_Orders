@extends('layouts.main')

@section('content')
<section>
<div class="container">
	@if(count($carts) > 0)	
	<div class="row">
	
	@foreach($carts as $cart)
		<div class="jumbotron" style="margin-top: 30px">
		  <h1 class="my-4">Order #{{$cart->id}}</h1>
		  <h5 class="my-4" style="margin-left: 50%">Status: <span class="badge badge-warning">{{$cart->status->name}}</span></h5>
		
		<table class="table table-hover" style="margin: 1px auto; margin-bottom: 1px;">
		  <thead>
		    <tr>
		      
		      <th scope="col">Item Name</th>
		      <th scope="col">Price/Item</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Total</th>
		      
		    </tr>
		  </thead>
		  <tbody>

		  	@foreach($cart->items as $item)
		    <tr>
		      
		      <td>{{$item->product->name}}</td>
		      <td>{{$item->product->price}}.00</td>
		      <td>{{$item->quantity}}</td>
		      <td style="color: darkred">{{$item->quantity * $item->product->price}}.00</td>
		      
		    </tr>
			@endforeach


		  </tbody>
		</table>
		<section style="margin-top: 70px; margin-bottom: 100px;">
		<div class="container">
	  		<div class="row">
	    		<div class="col">
					<div class="card">
					  <h5 class="card-header">Total</h5>
					  <div class="card-body">
					    <h5 class="card-title">Subtotal: <span style="color: darkred">${{$cart->total}}</span></h5>
					    <p class="card-text">Shipping cost is not included.</p>
					  </div>
					</div>
					
				</div>
				<div class="col" style="width: 1000px">
					<div class="card">
					  <h5 class="card-header">Info</h5>
					  <div class="card-body">
					    <h5 class="card-title">Name: </span></h5>
					    <p class="card-text">{{$cart->name}}</p>
					    <h5 class="card-title">Company: </span></h5>
					    <p class="card-text">{{$cart->company}}</p>
					    <h5 class="card-title">Shipping Address: </span></h5>
					    <p class="card-text">{{$cart->shipping_address}}</p>
					    <h5 class="card-title">Email: </span></h5>
					    <p class="card-text">{{$cart->email}}</p>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
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