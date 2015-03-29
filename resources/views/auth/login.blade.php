@extends('public')

@section('content')
<form class="form-login" method="POST" action="{{ url('/auth/login') }}">
  <h2 class="form-login-heading">sign in now</h2>
  <div class="login-wrap">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
      <br>
      <input name="password" type="password" class="form-control" placeholder="Password">
      <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
      </div>
      
      <label class="checkbox">
          <span class="pull-right">
              <a data-toggle="modal" href="{{ url('/password/email') }}"> Forgot Password?</a>

          </span>
      </label>
      <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
      <hr>
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
  </div>

</form>	
@endsection
