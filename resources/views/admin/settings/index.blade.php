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
    Settings
  </li>
</ol>
@endsection


@section('content')

<div class="container" style="margin-left: 40px">

  <div class="col-md-7">
  <h1 class="my-3">Settings</h1>
    <div class="card">
      <div class="card-header">
        Minimum Quantity
      </div>
      <div class="card-body">
        <h5 class="card-title">Minimum Quantity</h5>
        <p class="card-text">Set the minimum total quantity for orders.</p>
        <form action="{{ route('settings.setQty') }}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
            <input type="text" class="form-control" name="min_qty" value="{{$minQty->value}}">
          </div>
          <button type="submit" class="btn btn-primary">Set Quantity</button>
        </form>
      </div>
    </div>
  </div>
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