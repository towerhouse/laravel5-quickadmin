@extends('app')

@section('content')
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> {{ $user->id ? $user->name : "New User"}}</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
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
                @if ($success)
                    <div class="alert alert-success">
                        All changes have been saved<br><br>
                    </div>
                @endif
                <form class="form-horizontal style-form" method="POST" action="{{ url("users") }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email (unique)</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Role</label>
                        <div class="col-sm-10">
                        {!! Form::select('role_id[]', $roles, $user->roles->lists('id', 'id'), array('multiple'=>true, 'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"  class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation"  class="form-control" placeholder="">
                        </div>
                    </div>
                    <!--a class="btn btn-theme04" href="{{ url('users') }}">Return</a-->
                    <button class="btn btn-theme" type="submit">Submit</button>
                    
                </form>
            </div>
        </div><!-- col-lg-12-->      	
    </div><!-- /row -->
</section><! --/wrapper -->
@endsection