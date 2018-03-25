@extends('admin.layout.main')

@section('css')
<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="/css/sb-admin.css" rel="stylesheet">
@endsection


@section('breadcrumbs')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
	  <a href="/admin">Admin</a>
	</li>
	<li class="breadcrumb-item">
    <a href="/admin/customers">Customers</a>
  </li>
  <li>  &nbsp; / #{{$customer->id}}</li>
</ol>
@endsection


@section('content')

        <div class="container">
          
          
          <h1>Customer Info</h1>
            <div class="jumbotron" style="margin-top: 30px">
              <h2>Name: <span style="color: darkred">{{$customer->name}}</span></h2>
              <h2>Company Name: <span style="color: darkred">{{$customer->company}}</span></h2>
              <h2>Country: <span style="color: darkred">{{$customer->country}}</span></h2>
              <h2>Address: <span style="color: darkred">{{$customer->address}}</span></h2>
              <h2>Phone: <span style="color: darkred">{{$customer->phone}}</span></h2>
              <h2>Mobile: <span style="color: darkred">{{$customer->mobile}}</span></h2>
              <h2>Email: <span style="color: darkred">{{$customer->email}}</span></h2>
            </div>
            
          <h1>Customer Orders</h1>
          @foreach ($carts as $cart)
            {{-- expr --}}
          
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

@endsection










@section('js')
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="/vendor/datatables/jquery.dataTables.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->
<script src="/js/sb-admin.min.js"></script>
<!-- Custom scripts for this page-->
<script src="/js/sb-admin-datatables.min.js"></script>
@endsection