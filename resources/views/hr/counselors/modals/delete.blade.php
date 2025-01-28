
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">Confirm Deletion  of {{ $counselor->surname.' '.$counselor->othernames }} Information</h4> <hr>
            <form class="form-material" action="{{ route('counselor.delete') }}" method="POST">
                <input type="hidden" name="counselorid" value="{{$counselor->id}}">
                {{ csrf_field() }}
               
                <div class="row clearfix">
                    <p align="justify" >Are you sure you want to delete <strong>{{$counselor->surname}}</strong> from the system? Hence you are been warned. This action is not revocable and it is logged against your user account. Do you want to proceed with this operation? </p>
                </div>
                <div class="col-sm-12" align="center">
                    @role('hr-admin | administrator')
                    <button type="submit" class="btn btn-primary btn-sm mt-2"> Delete Data</button>
                    @endrole
                </div>
            </form>
        </div>
    </div>
<br>
<hr>


