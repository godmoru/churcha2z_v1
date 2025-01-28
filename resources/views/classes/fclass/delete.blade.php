
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">Confirm Deletion  of {{ $batchname->name }} Information</h4> <hr>
            <form class="form-material" action="{{ route('classes.deleteone') }}" method="POST">
                <input type="hidden" name="batchId" value="{{$batchname->id}}">
                {{ csrf_field() }}
               
                <div class="row clearfix">
                    <p align="justify" >Are you sure you want to delete <strong>{{$batchname->name}}</strong> from the list of foundation class batches? Be warned that this action is not reverseable and it is logged against your account. Do you want to proceed with this operation? </p>
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