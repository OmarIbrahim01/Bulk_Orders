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
          <img class="img-fluid" src="{{$product->main_image_path}}" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">Product Details</h3>
          <p>{!! $product->details !!}</p>
          <h5 style="color: green; margin-bottom: 1px"><span style="color: black">Price: </span> ${{$product->price}} / Item</h5>
          <small style="color: red;">Mininum Order is 500 Pieces</small>

          <div style="margin-top: 30px;">
            <form>
              <div class="form-group ">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number" class="form-control" id="" aria-describedby="" placeholder="Enter Quantity">
              </div>
              <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
          </div>

      </div>
      <!-- /.row -->

      <!-- Related Projects Row -->
      <h3 class="my-4">Product Images</h3>

      <div class="row" style="margin-bottom: 50px">

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <a href="#">
            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
          </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection