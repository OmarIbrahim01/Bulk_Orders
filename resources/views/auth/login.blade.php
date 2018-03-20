@extends('layouts.main')

@section('content')

<div class="jumbotron" style="margin: auto; margin-top: 100px; width: 50%; margin-bottom: 300px; background-color: #eee;">

<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
  	<h1>Login</h1>
  	<p>Login to your existing account</p>
  	<br>

  	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	    <label for="email" >E-Mail Address</label>	    
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
	    <div class="checkbox">
	        <label>
	            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
	        </label>
	    </div>
	</div>

  <div class="form-group">                            
    <button type="submit" class="btn btn-primary">
            Login
    </button>
    <a class="btn btn-link" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
    
</div>

</form>
<a  href="/register">Register a new account</a>
</div>

@endsection