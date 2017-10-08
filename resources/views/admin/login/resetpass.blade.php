@extends('admin.login.masterlogin')
@section('content')

<div class="register-box-body">
    <p class="login-box-msg">Reset password</p>
    <form method="POST">
      {{ csrf_field() }}
      {{ csrf_field() }}
      @if (session('message'))
        <i>{{ session('message') }}</i>
      @endif
      @if($errors->has('email'))
        <i>{{ $errors->first('email') }}</i>
      @endif
    <div class="form-group has-feedback {{ $errors->has('email')?'has-error':'' }}">
        <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      @if($errors->has('password'))
        <i>{{ $errors->first('password') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('password')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="New Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      @if($errors->has('password_confirm'))
        <i>{{ $errors->first('password_confirm') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('password_confirm')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="Retype New password" id="password_confirm" name="password_confirm">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
       <button type="submit" class="btn btn-primary btn-block btn-flat">Change password</button>
       <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      </div>
    </form>

  </div>
@endsection