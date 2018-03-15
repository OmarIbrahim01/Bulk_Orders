@extends('layouts.main')

@section('content')
<section>
<div class="container">
	<div class="row">	      
	      <h1 class="my-4">My Shopping Cart</h1>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      
	      <th scope="col">Item Name</th>
	      <th scope="col">Price/Item</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Total</th>
	    </tr>
	  </thead>
	  <tbody>

	  	@foreach($items as $item)
	    <tr>
	      
	      <td>{{$item->product->name}}</td>
	      <td>Otto</td>
	      <td>@mdo</td>
	      <td>100</td>
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
				  <h5 class="card-header">Featured</h5>
				  <div class="card-body">
				    <h5 class="card-title">Special title treatment</h5>
				    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				  </div>
				</div>
			</div>
			<div class="col">
				<form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				   
				  </div><div class="form-group">
				    <label for="exampleInputEmail1">Company Name</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Country</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">City</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Main Address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				   
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Shipping Address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				   
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Phone</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Phone 2</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				    
				  </div>
				  
				  <button type="submit" class="btn btn-primary">Request Order</button>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection