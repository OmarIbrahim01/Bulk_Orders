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
      <h3 class="my-3">Details</h3>
      <p>{{ $product->details }}</p>
      <p style="font-weight: bold;">Dimensions: <span style="font-weight: normal;">{{$product->dimensions}}  cm</span></p>
      <p style="font-weight: bold;">Thickness: <span style="font-weight: normal;">{{$product->thickness}}  mm</span></p>
      @if(!empty($product->weight))
      <p style="font-weight: bold;">Weight: <span style="font-weight: normal;">{{$product->weight}}  mm</span></p>
      @endif


      <h5 margin-bottom: 1px">Price:  <span style="color: green;">${{$product->price}}</span> / Item</h5>

      @if(isset($product->min_quantity))
        <small style="color: red;">Mininum Order is {{$product->min_quantity}} Pieces</small>
      @endif

      <div style="margin-top: 30px;">
        <a href="/admin/products/{{$product->id}}/edit" class="btn btn-success" style="width: 100%;">Edit</a>
      </div>

      <div style="margin-top: 20px;">
      


        <a data-toggle="modal" data-target="#modal" class="btn btn-danger"  style="width: 100%; color: white;">Delete</a>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure, you want to delete this product
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('remove_product').submit();" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
        </div>

        <form id="remove_product" action="{{ route('products.destroy', [$product->id]) }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
        </form> 
      </div>

    </div>

  </div>
  <!-- /.row -->

  <!-- Related Projects Row -->
  @if(!empty($product->images))
  <h3 class="my-4">Images</h3>

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