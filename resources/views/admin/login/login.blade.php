@extends('admin.login.masterlogin')
@section('content')
  <div class="login-box-body">
     <span>
      @if(session('message'))
        {{ session('message') }}
      @endif
    </span>
    <p class="login-box-msg">Sign in to start your session</p>
    <form method="POST" action="{{ route('postLogin') }}">
      {{ csrf_field() }}
      @if($errors->has('email'))
        <i>{{ $errors->first('email') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('email')?'has-error':'' }}">
        <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @if($errors->has('password'))
        <i>{{ $errors->first('password') }}</i>
      @endif
      <div class="form-group has-feedback {{ $errors->has('password')?'has-error':'' }}">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
    <a href="{{ route('sendmail') }}">I forgot my password</a><br>
    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>

  </div>
@endsection