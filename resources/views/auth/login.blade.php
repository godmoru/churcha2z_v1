@extends('layouts.authmaster')

@section('content')
<div class="col-md-4 white">
    <br><br><br><br><br><br>
    <div class="text-center" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 110px; width: 140px;" />
        <!-- <h4 class="text-center"> <strong>DIGC eMembers Manager <br></strong></h4> -->
    </div>
    <div class="p-5">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h4 align="center" class="text-uppercase text-bolder"><strong>System Login</strong></h4>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-icon"><i class="icon-envelope-o"></i>
                <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-icon"><i class="icon-lock2"></i>
                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>

                    <a class="btn btn-link pull-right" href="{{ route('password.request') }}" style="font-size: 14px; align-content: right;">Forgot your password?</a>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary darken-3 btn-lg btn-block" value="Log In">
        </form>
    </div>
</div>

@endsection
