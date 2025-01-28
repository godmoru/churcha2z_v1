
<div class="modal fade" id="enableLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title text-center text-uppercase" id="">Enabling {{ $pastor->surname.' '.$pastor->othernames }} to login and access the system </h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('users.new') }}">
                    <input type="hidden" name="pastorid" value="{{$pastor->id}}">
                    <input type="hidden" name="phoneno" value="{{$pastor->phone1}}">

                    <input type="hidden" class="form-control" id="sname" name="sname" value="{{$pastor->surname}}">
                    <input type="hidden" class="form-control" id="mname" name="onames" value="{{$pastor->othernames}}">
                    <input type="hidden" class="form-control" id="email" name="email" value="{{$pastor->email}}">
                    <input type="hidden" class="form-control" id="location" name="location" value="{{$pastor->location_id}}">
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
                            <p align="justify">By assigning role(s) to this employee, you have accepted @if($pastor->gender == 1) his @else her @endif usage of the system henceforth and have the full privileges of the role(s) assigned to @if($pastor->gender == 1) him @else her @endif. </p>  
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
