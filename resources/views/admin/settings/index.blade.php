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
    <br>

    {{-- Min Quantity --}}
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
    {{-- /End Min Quantity --}}

    <hr style="margin-top: 40px; margin-bottom: 40px;">

    {{-- Admin Users --}}
    <div class="card" style="margin-top: 20px;">
      <div class="card-header">
        Admin Users
      </div>
      <div class="card-body">
        <h5 class="card-title">Admin Users</h5>
        <p class="card-text">Manage Admin Users.</p>
        <div class="form-group">
          <ul class="list-group">
            @foreach($admins as $admin)
            <li class="list-group-item @if($admin->id == 1) active @endif">
             {{$admin->name}} ({{$admin->email}})
               @if($admin->id != 1)
                <a href="#" data-toggle="modal" data-target="#unset_admin_modal" style="float: right; color: red;"><i class="fas fa-times"></i></a>
                <form id="unset_admin" action="{{ route('settings.unset_admin') }}" method="POST" style="display: none;">
                  <input type="hidden" name="id" value="{{$admin->id}}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                </form> 
               @endif
            </li>
            @endforeach
          </ul>
        </div>
        <a href="#" data-toggle="modal" data-target="#add_admin_modal" class="btn btn-primary">Add new user</a>
      </div>
    </div>
    {{--/End Admin Users --}}

  </div>


</div>

















<!-- Unset Admin Modal -->
<div class="modal fade" id="unset_admin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$admin->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure, you want to unset {{$admin->name}} as admin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('unset_admin').submit();" class="btn btn-danger">Unset</button>
      </div>
    </div>
  </div>
</div>



<!-- Add Admin Modal -->
<div class="modal fade" id="add_admin_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$admin->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Set</th>           
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>                
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <form action="{{ route('settings.set_admin') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <button type="submit" class="btn btn-primary">Set Admin</button>
                    </form>
                  </td>               
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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