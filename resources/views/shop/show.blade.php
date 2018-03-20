@extends('layouts.main')

@section('content')

<!-- Portfolio Item Row -->
<!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">{{$product->name}}</h1>

      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-7">
          <a href="{{$product->main_image_path}}">
            <img class="img-fluid" src="{{$product->main_image_path}}" alt="">
          </a>
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Product Details</h3>
          <p>{{ $product->details }}</p>
          <h5 margin-bottom: 1px">Price:  <span style="color: green;">${{$product->price}}</span> / Item</h5>

          @if(isset($product->min_quantity))
            <small style="color: red;">Mininum Order is {{$product->min_quantity}} Pieces</small>
          @endif

          <div style="margin-top: 30px;">
            @auth
            <form action="/item/{{$product->id}}" method="POST">
              <div class="form-group ">
                {{csrf_field()}}
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number" name='quantity' class="form-control" id="" aria-describedby="" placeholder="Quantity">
                <input type="hidden" name='product_id' value="{{$product->id}}">
              </div>
              <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
            @else
            <a href="/login" class="btn btn-success">Add to Cart</a>
            @endauth
          </div>

        </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      @if(!empty($product->images))
      <h3 class="my-4">Product Images</h3>

      <div class="row" style="margin-bottom: 50px">

        @foreach($product->images as $image)
        <div class="col-md-3 col-sm-6 mb-4">
          <a href="{{$image->path}}">
            <img class="img-fluid" src="{{$image->path}}" alt="">
          </a>
        </div>
        @endforeach
        @endif
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection