@extends('layouts.main')

@section('content')

<div class="jumbotron" style="margin: auto; margin-top: 100px; width: 50%; margin-bottom: 300px; background-color: #eee;">

<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
  	<h1>Register</h1>
    <p>Register for a merchant account</p>
  	<br>
  	
  	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>

  	<div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Company</label>

        
            <input id="name" type="text" class="form-control" name="company" value="{{ old('company_name') }}" required>

            @if ($errors->has('company'))
                <span class="help-block">
                    <strong>{{ $errors->first('company') }}</strong>
                </span>
            @endif
        
    </div>

  	<div class="form-group{{ $errors->has('couintry') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Country</label>

        
            <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

            @if ($errors->has('country'))
                <span class="help-block">
                    <strong>{{ $errors->first('company_name') }}</strong>
                </span>
            @endif
        
    </div>

  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
      <label for="name" class="col-md-4 control-label">Address</label>

      
          <input id="name" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

          @if ($errors->has('address'))
              <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
      
  </div>

  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
      <label for="name" class="col-md-4 control-label">Phone</label>

      
          <input id="name" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

          @if ($errors->has('phone'))
              <span class="help-block">
                  <strong>{{ $errors->first('phone') }}</strong>
              </span>
          @endif
      
  </div>

  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
      <label for="mobile" class="col-md-4 control-label">Mobile</label>

      
          <input id="name" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" >

          @if ($errors->has('address'))
              <span class="help-block">
                  <strong>{{ $errors->first('address') }}</strong>
              </span>
          @endif
      
  </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

      
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      
  </div>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="col-md-4 control-label">Password</label>

      
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      
  </div>

  <div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

      
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      
  </div>

  <div class="form-group">
     
          <button type="submit" class="btn btn-primary">
              Register
          </button>
      
  </div>

</form>

</div>

@endsection