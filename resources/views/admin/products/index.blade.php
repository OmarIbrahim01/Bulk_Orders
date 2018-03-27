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
	<li class="breadcrumb-item active">Products</li>
</ol>
@endsection


@section('content')

<div class="row">



</ul>

</div>
<!-- /.col-lg-3 -->

<div class="col-lg-12">

<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  
</ol>

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

<div class="col-lg-2 col-md-6 mb-4">
  <div class="card h-100">
    <a href="/admin/products/{{$product->id}}"><img class="card-img-top" src="{{$product->main_image_path}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="/admin/products/{{$product->id}}">{{$product->name}}</a>
      </h4>
      <h5>${{$product->price}}</h5>
      {{-- <p class="card-text">{{substr($product->details, 0, 20)}}</p> --}}
      @if(isset($product->min_quantity))
        <small style="color: darkred;">Mininum Order is {{$product->min_quantity}} Pieces</small>
      @endif
    </div>
    <div class="card-footer">      
        <a href="/admin/products/{{$product->id}}/edit" class="btn btn-success" style="width: 100%;">Edit</a>      
    </div>
  </div>
</div>

@endforeach


</div>
<!-- /.row -->


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