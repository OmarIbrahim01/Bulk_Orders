@extends('layouts.main')

@section('content')

<div class="row">

<div class="col-lg-3" style="margin-bottom: 45px;">

<h1 class="my-4" style="text-align: center; margin-top: -15px; font-size: 50px;
  background: -webkit-linear-gradient(#333, #999);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Cartoonize Bulk Orders</h1>
<p style="text-align: center; font-weight: 400; font-style: italic; color: #666;">If you're a merchant We offer bulk orders for <span style="color: darkred; text-decoration: underline;">exporting only</span></p>
<br>

<h3 style="margin-top: 0px; margin-bottom: 15px; color: #333;"><i class="fas fa-shopping-cart"></i> Shopping Cart</h3>
<ul class="list-group">
  @auth
    @foreach($items as $item) 
    <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #f3f3f3;">
      <a href="/shop/{{$item->product->id}}" style="color: #333;"><i class="fas fa-chevron-circle-right"></i> {{$item->product->name}}
      <span class="badge badge-secondary badge-pill">Qty {{$item->quantity}}</span></a>
      <p style="float: right; color: darkred; margin-top: 16px;">${{$item->product->price * $item->quantity}}.00



       <a href="/item/{{$item->id}}" style="float: right; color: darkred"  onclick="event.preventDefault(); document.getElementById('cancel_item').submit();"><i class="fas fa-times"></i></a> 

       <form id="cancel_item" action="/item/{{$item->id}}" method="POST" style="display: none;">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
       </form> 

     </p>
    </li>
    @endforeach
    <h5 href="#" class="list-group-item">Total: <span style="color: darkred">${{$total}}</span></h5>
    <a href="/cart" class="btn btn-success" style="margin-right: 100px; margin: 20px auto auto auto; width: 170px;"><i class="fa fa-shopping-cart"></i> Go to Checkout</a>
  @endauth
  @guest
    <p style="color: grey">Register for a merchant account or Login To View Shopping Cart</p>
    <a href="/login" class="btn btn-secondary" style="margin-right: 100px; margin: auto; width: 150px;">Login</a>
    <a href="/register" class="btn btn-secondary" style="margin-right: 100px; margin: 10px auto auto auto; width: 150px;">Register</a>
  @endguest

</ul>

</div>
<!-- /.col-lg-3 -->

<div class="col-lg-9">

<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  
</ol>
<div class="carousel-inner" role="listbox">
  <div class="carousel-item active">
    <img class="d-block img-fluid" src="/img/main.jpg" alt="First slide">
  </div>
  
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>

<div class="row" style="margin-bottom: 40px;">

@foreach($products as $product)

<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="/shop/{{$product->id}}"><img class="card-img-top" src="{{$product->main_image_path}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="/shop/{{$product->id}}">{{$product->name}}</a>
      </h4>
      <h5>${{$product->price}}</h5>
      {{-- <p class="card-text">{{substr($product->details, 0, 20)}}</p> --}}
      @if(isset($product->min_quantity))
        <small style="color: darkred;">Mininum Order is {{$product->min_quantity}} Pieces</small>
      @endif
    </div>
    <div class="card-footer">
      @auth
      <form action="/item/{{$product->id}}" method="POST">
        <div class="form-group ">
          {{csrf_field()}}
          <input type="hidden" name='product_id' value="{{$product->id}}">
          
          <input type="number" name='quantity' class="form-control" id="" aria-describedby="" placeholder="Quantity">
          
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-cart-plus"></i> Add to Cart</button>
      </form>
      @else
        <a href="/login" class="btn btn-success"><i class="fas fa-cart-plus"></i> Add to Cart</a>
      @endauth
    </div>
  </div>
</div>

@endforeach


</div>
<!-- /.row -->

@endsection