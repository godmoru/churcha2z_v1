
<div class="modal fade" id="enableLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title text-center text-uppercase" id="">Enabling {{ $counselor->surname.' '.$counselor->othernames }} to login and access the system </h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('users.new') }}">
                    <input type="hidden" name="counselorid" value="{{$counselor->id}}">
                    <input type="hidden" name="phoneno" value="{{$counselor->phone1}}">

                    <input type="hidden" class="form-control" id="sname" name="sname" value="{{$counselor->surname}}">
                    <input type="hidden" class="form-control" id="mname" name="onames" value="{{$counselor->othernames}}">
                    <input type="hidden" class="form-control" id="email" name="email" value="{{$counselor->email}}">
                    <input type="hidden" class="form-control" id="location" name="location" value="{{$counselor->location_id}}">


                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                        <label for="code" >Prefered Role(s)</label>
                          <select class="custom-select select2" name="role_id[]" multiple="multiple">
                              @foreach($roles as $rl)
                              <option value="{{$rl->id}}">{{$rl->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    <div class="col-md-5">
                    <!-- <p>Assingn A Class</p> -->
                    </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p align="justify">By assigning role(s) to this employee, you have accepted @if($counselor->gender == 1) his @else her @endif usage of the system henceforth and have the full privileges of the role(s) assigned to @if($counselor->gender == 1) him @else her @endif. </p>  
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary btn-xs">Enable</button>
                </div>
            </div>
        </div>
    </div>
</form>
