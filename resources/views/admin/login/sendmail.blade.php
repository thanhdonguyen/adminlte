@extends('admin.login.masterlogin')
@section('content')
	<div class="register-box-body">
    <p class="login-box-msg">Email membership</p>

    <form method="POST">
      {{ csrf_field() }}
      @if (session('message'))
        <i>{{ session('message') }}</i>
      @endif
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send email</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
  </div>
@endsection