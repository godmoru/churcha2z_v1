
<div class="modal fade" id="resendDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title text-center text-uppercase" id="">Sending Login Details to {{ $user->surname.' '.$user->othernames }} from the system </h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('resendAccountDetails') }}">
                    <input type="hidden" name="userid" value="{{$user->id}}">
                    <input type="hidden" name="phoneno" value="{{$user->phone1}}">

                    <input type="hidden" class="form-control" id="sname" name="sname" value="{{$user->surname}}">
                    <input type="hidden" class="form-control" id="mname" name="onames" value="{{$user->othernames}}">
                    <input type="hidden" class="form-control" id="email" name="email" value="{{$user->email}}">
                    <input type="hidden" class="form-control" id="location" name="location" value="{{$user->location_id}}">


                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <p align="justify">By assigning role(s) to this user, you have accepted @if($user->gender == 1) his @else her @endif usage of the system henceforth and have the full privileges of the role(s) assigned to @if($user->gender == 1) him @else her @endif. </p>  

                        </div>
                    </div>
                    <hr>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary btn-xs">Resend Details</button>
                </div>
            </div>
        </div>
    </div>
</form>
