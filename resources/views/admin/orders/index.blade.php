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
	<li class="breadcrumb-item active">Orders</li>
</ol>
@endsection


@section('content')

<!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Order Number</th>
                  <th>Customer</th>
                  <th>Email</th>
                  <th>Order Status</th>
                  <th>Added At</th>
                  <th>total</th>                  
                </tr>
              </thead>
              <tbody>
              	@foreach($orders as $order)
                <tr>
                  <td><a href="/admin/orders/{{$order->id}}">{{$order->id}}</a></td>
                  <td><a href="/admin/customers/{{$order->user->id}}">{{$order->name}}</a></td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->status->name}}</td>
                  <td>{{$order->created_at}}</td>
                  <td style="color: darkred;">${{$order->total}}</td>                  
                </tr>
                @endforeach
              </tbody>
            </table>
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