@extends('layouts.verificationmaster')
@section('content')
<br><br><br><br><br><br><br><br>

<div class="col-md-12">
    <form action="{{url('/system/user/myaccount/update_password/'.\Crypt::encrypt(\Auth::user()->id))}}" method="post" role="form">
        {{csrf_field()}}
        <input type="hidden" name="user" value="{{Auth::user()->id}}">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        New Password<span class="symbol required"></span>
                    </label>
                    <input type="password" name="new_password" class="form-control" style="text-align: left;" required="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>
                        Confirm Password<span class="symbol required"></span>
                    </label>
                    <input type="password" name="password_confirmation" class="form-control" style="text-align: left;" required="">
                </div>
            </div>
            
        <div class="form-group col-md-12">
         @if(Session::has('alert'))
        <div class="alert alert-danger" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The two passwords entered  <b>'{{Session::get('error')}}' </b> and the other do not match each other, please enter new matching passwords and try again  <a href="#" class="alert-link"></a>. 
        </div> 
        @endif
         @if(Session::has('error'))
        <div class="alert alert-danger" align="center">
            <button type="button" class="close" data-dismiss="alert">&times;</button> <i class="fa fa-ok-sign"></i><strong>Ops!</strong> The two passwords entered  <b>'{{Session::get('error')}}' </b> and the confirmation password do not match each other, please enter new matching passwords and try again  <a href="#" class="alert-link"></a>. 
        </div> 
        @endif
        
        <br><br><br>
            <p>
                <b class="text-uppercase">TIPS for better password combination:</b>
                <ul>
                    <li>Should not be less than 6 characters,</li>
                    <li>Should have mix contents combining alphabets and numberical or special characters,</li>
                    <li>Choose what you can remember unknown to no one else</li>
                </ul>
            </p>
            
        <div class="form-group col-md-12" align="center">
            <button type="submit" class="btn btn-primary btn-sm text-center">Change/Update Password</button>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="col-md-4"></div>         
@endsection
