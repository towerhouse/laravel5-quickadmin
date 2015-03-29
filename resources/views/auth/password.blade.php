@extends('public')

@section('content')
<form class="form-login" method="POST" action="{{ url('/password/email') }}">
  <h2 class="form-login-heading">Reset Password</h2>
  <div class="login-wrap">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      
      <form class="form-login" method="POST" action="{{ url('/password/email') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
          <label class="checkbox">
              <span class="pull-right">
                  <a data-toggle="modal" href="{{ url('/auth/login') }}"> Go back to login</a>

              </span>
          </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>Send reset link</button>
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
      </form>
      
  </div>

</form>	
@endsection

