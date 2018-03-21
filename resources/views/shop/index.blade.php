@extends('layouts.main')

@section('content')

<div class="row">

<div class="col-lg-3" style="margin-bottom: 45px;">

<h1 class="my-4" style="text-align: center; margin-top: -15px">Cartoonize Bulk Orders</h1>
<p style="text-align: center;">We offer bulk orders for <span style="color: darkred; text-decoration: underline;">exporting only</span></p>
<br>

<h3 style="margin-top: 97px"><i class="fas fa-shopping-cart"></i> Shopping Cart</h3>
<div class="list-group">
  @auth
    @foreach($items as $item) 
    <a href="/shop/{{$item->product->id}}" class="list-group-item"><i class="fas fa-caret-right"></i> {{$item->product->name}}<span style="color: black; font-size: 12px;">({{$item->quantity}})</span><span style="float: right; color: darkred;">${{$item->product->price * $item->quantity}}.00</span></a>
    @endforeach
    <h5 href="#" class="list-group-item">Total: <span style="color: darkred">${{$total}}</span></h5>
  @endauth
  @guest
    <p style="color: grey">Please Register or Login To View Shopping Cart</p>
    <a href="/login" class="btn btn-secondary" style="margin-right: 100px">Login</a>
    <a href="/register" class="btn btn-secondary" style="margin-right: 100px; margin-top: 10px">Register</a>
  @endguest

</div>

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

<div class="row">

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