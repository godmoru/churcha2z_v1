@extends('layouts.authmaster')
@section('content')
<div class="col-md-4 white">
    <br><br><br><br><br><br>
    <div class="text-center" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 110px; width: 140px;" />
    </div>
    <div class="p-5">
         
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <h4 align="center" class="text-uppercase text-bolder"><strong>Reset Password </strong></h4>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-icon"><i class="icon-envelope-o"></i>
                <input type="email" class="form-control form-control-lg" placeholder="Email Address Here" name="email" value="{{ old('email') }}" required autofocus><br>
                @if ($errors->has('email'))
                    <span class="help-block " style="color: red;">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <input type="submit" class="btn btn-primary darken-3 btn-lg btn-block" value="Send Reset Link">
        </form>
    </div>
</div>

@endsection
