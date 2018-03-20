@extends('layouts.main')

@section('content')
<section>
<div class="container">
	<div class="row">	      
	      <h1 class="my-4"><i class="fas fa-shopping-cart"></i> My Shopping Cart</h1>
	@if(count($items) > 0)
	<table class="table table-hover">
	  <thead>
	    <tr>
	      
	      <th scope="col">Item Name</th>
	      <th scope="col">Price/Item</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Total</th>
	      <th scope="col">Remove</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($items as $item)
	    <tr>
	      
	    	<td>{{$item->product->name}}</td>
	      	<td>{{$item->product->price}}.00</td>
	      	<td>{{$item->quantity}}</td>
	      	<td>{{$item->quantity * $item->product->price}}.00</td>
	      	<td>

			<a href="/item/{{$item->id}}" onclick="event.preventDefault(); document.getElementById('cancel_item').submit();"><i class="fas fa-times-circle" style="color: red; font-size: 20px;"></i>

</a>
	        <form id="cancel_item" action="/item/{{$item->id}}" method="POST" style="display: none;">
	            {{ csrf_field() }}
	            {{ method_field('DELETE') }}
	        </form>					
	      </td>
	    </tr>
		@endforeach

	  </tbody>
	</table>


	</div>
	<!-- /.row -->
</div>
</section>
<section style="margin-top: 70px; margin-bottom: 100px;">
	<div class="container">
  		<div class="row">
    		<div class="col">
				<div class="card">
				  <h5 class="card-header">Order #{{$cart->id}}</h5>
				  <div class="card-body">
				    <h5 class="card-title">SubTotal: <span style="color: darkred">${{$total}}</span></h5>
				    <p class="card-text">Shipping cost is not included.</p>
				  </div>
				</div>
				<p style="margin: 40px auto;">Please fill in the form and submit the order and we will review it and contact you, Thank you for choosing us.</p>
			</div>
			<div class="col">
				<form action="/cart" method="POST">
					{{csrf_field()}}
					<input type="hidden" name="cart_id" value="{{$cart->id}}">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('name')}}" required>
				    				   
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Company</label>
				    <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('company')}}" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Country</label>
				    <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('country')}}" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">City</label>
				    <input type="text" name="city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('city')}}" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Main Address</label>
				    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('address')}}">
				   
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Shipping Address</label>
				    <input type="text" name="shipping_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('shipping_address')}}" required>
				   
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Phone</label>
				    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('phone')}}" required>
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Phone 2</label>
				    <input type="text"  name="phone2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('phone2')}}">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}" required>
				    
				  </div>
				  
				  <button type="submit" class="btn btn-success">Submit Order</button>
				</form>
			</div>
		</div>
	</div>
</section>
@else
<h2 style="color: grey">Your Shopping Cart Is Empty Please Add Items To Your Shopping Cart</h2>
<a href="/" class="btn btn-success" style="margin: 20px auto; margin-bottom: 620px;">Browse Products</a>
@endif





@endsection