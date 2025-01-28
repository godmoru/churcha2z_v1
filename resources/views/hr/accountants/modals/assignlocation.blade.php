<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-uppercase text-center">Assigning/Posting {{ $accountant->surname.' '.$accountant->othernames }} to location</h4> <hr>
        <form role="form" method="POST" action="{{ route('accountant.assignLoc') }}">
        <input type="hidden" class="form-control" id="accountant" name="accountant" value="{{$accountant->id}}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-12 col-md-6">
                <label for="code" >Prefered Location</label>
                  <select class="custom-select select2" name="location">
                      @foreach($locs as $loc)
                      <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
                      @endforeach
                  </select>
                    <div class="col-sm-12" align="center">
                        @role('administrator|auditor|hq-accountant')
                        <button type="submit" class="btn btn-primary btn-sm mt-2"> Assign Location</button>
                        @endrole
                    </div>
                </div>
                <div class="col-md-5">
                    <p align="justify" >You are posting or assign  this <strong>{{$accountant->surname}}</strong> to the desired location. This action is logged against your user account. Do you want to proceed with this operation? </p>
                </div>
                
            </div>
   
            
        </form>
    </div>
</div>
<br>
<hr>




