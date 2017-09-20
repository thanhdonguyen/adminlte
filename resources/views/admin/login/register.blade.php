@extends('admin.login.masterlogin')
@section('content')
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form method="POST" action="{{ route('postRegister') }}">
       <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      @if($errors->has('email'))
        <i>{{ $errors->first('name') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('name')?'has-error':'' }}">
        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      @if($errors->has('email'))
        <i>{{ $errors->first('email') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('email')?'has-error':'' }}">
        <input type="text" class="form-control" value="{{ old('email') }}" placeholder="Email" id="email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @if($errors->has('password'))
        <i>{{ $errors->first('password') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('password')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      @if($errors->has('password_confirm'))
        <i>{{ $errors->first('password_confirm') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('password_confirm')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="Retype password" id="password_confirm" name="password_confirm">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
  </div>
@endsection