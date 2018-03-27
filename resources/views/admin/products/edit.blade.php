@extends('admin.layout.main')

@section('css')
<!-- Bootstrap core CSS -->
<link href="{{ asset('bootstrap/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">
@endsection


@section('breadcrumbs')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="/admin">Admin</a>
  </li>
  <li class="breadcrumb-item">
    <a href="/admin">Products</a>
  </li>
  <li class="breadcrumb-item">
    <a href="/admin">Edit</a>
  </li>
  <li class="breadcrumb-item">{{$product->id}}</li>
</ol>
@endsection


@section('content')
<div class="jumbotron">
<!-- Portfolio Item Row -->

<!-- Page Content -->
<div class="container">
  

<form action="{{route('products.update', [$product->id])}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}

  <h1 class="my-1" style="color: orange;">Edit Product</h1>
  <!-- Portfolio Item Heading -->
  <h4 class="my-1">Product Name</h4>
  <input type="text" name="name" value="  {{$product->name}}" class="my-4">

  <!-- Portfolio Item Row -->
  <div class="row">

    <div class="col-md-7">
      <a href="{{$product->main_image_path}}">
        <img class="img-fluid" src="{{$product->main_image_path}}" alt="">
      </a>
      <input type="file" name="main_image" class="btn btn-info" id="main_image" style="width: 100%;">
    </div>

    <div class="col-md-4">
      <h3 class="my-3">Details</h3>

      <textarea name="details" class="my-4" style="width: 100%; height: 120px; padding: 8px;">{{ $product->details }}</textarea>

      <p style="font-weight: bold;">Dimensions: <input type="text" name="dimensions" value=" {{$product->dimensions}}">  cm </p>
      <p style="font-weight: bold;">Thickness: <input type="text" name="thickness" value=" {{$product->thickness}}"> mm </p>
      
      <p style="font-weight: bold;">Weight: <input type="text" name="weight" value=" {{$product->weight}}" style="width: 20%">  gram</p>
      


      <h5 margin-bottom: 1px">Price:  <input type="text" name="price" value=" {{$product->price}}" style="width: 20%"> / Item</h5>

      
        <p style="color: red;">Mininum Order is <input type="text" name="min_quantity" value=" {{$product->min_quantity}}" style="width: 20%"> Pieces</p>
      

      <div style="margin-top: 30px;">
        <input type="submit" class="btn btn-success" style="width: 100%;" value="Save Changes">
      </div>

    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  
  <h3 class="my-4">Images</h3>

  <div class="row" style="margin-bottom: 50px">

    @foreach($product->images as $image)
    <div class="col-md-2 col-sm-6 mb-4">
      <a href="{{$image->path}}">
        <img class="img-fluid" src="{{$image->path}}" alt="">

        <a href="#" onclick="event.preventDefault(); document.getElementById('remove_image').submit();" style="color: red; font-size: 25px"><i class="fas fa-times"></i></a>
      </a>
      
    </div>
    @endforeach
    <input type="file" name="images[]" style="width: 100%;" class="img-fluid btn btn-info" id="images"  multiple>
    
  </div>
  <!-- /.row -->
</form>


{{-- Delete Image Form --}}
<form id="remove_image" action="/admin/products/{{$image->id}}/delete" method="POST" style="display: none;">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
</form> 
</div>
</div>
<!-- /.container -->


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