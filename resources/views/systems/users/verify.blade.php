@extends('layouts.verificationmaster')
           
@section('content')
<br><br><br><br><br><br><br><br>

<div class="col-md-12">
<form action="{{url('/system/user/account/verification/'.\Crypt::encrypt(Auth::user()->id))}}" method="POST">
{{csrf_field()}}
<input type="hidden" name="user" value="{{Auth::user()->id}}">
    <div class="form-group col-md-12 " >
        <label for="">One Time Pass Code <div class="error"></div></label>
        <input type="password" name="code" class="form-control" style="text-align: center;" required="">
        <br>
    <div class="form-group col-md-12" align="center">
        <button type="submit" class="btn btn-primary btn-sm text-center">Verify Account</button>
        </div>
    </div>
    <div class="form-group col-md-12">
         @if(Session::has('alert'))
        <div class="alert alert-danger" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'{{Session::get('error')}}'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
        </div> 
        @endif
         @if(Session::has('success'))
        <div class="alert alert-success" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>We</strong> just sent your code new One Time Code to your phone via SMS. Please enter it here to activate your account thank you.
        </div> 
        @endif
         @if(Session::has('error'))
        <div class="alert alert-danger" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The code you entered <b>'{{Session::get('error')}}'</b> does not match the code sent to your phone please verify from the SMS sent to you and try again  <a href="#" class="alert-link"></a>. 
        </div> 
        @endif

        <div class=""> Didn't get the code or the code has expired? Dont worry you can resend new one<a href="{{url('/sendCode')}}" style="color: blue;"> here</a>
        </div>
    </div>
    <div class="form-group col-md-6" align="center">
        
    </div>

</form>
</div>
                    
@endsection
