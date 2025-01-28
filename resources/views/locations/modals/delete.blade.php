
<div class="modal fade bt-white" id="deleteLoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel">Confirm Deletion  of {{ $location->loc_name }} Information</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('locations.one.delete') }}">
                    <input type="hidden" name="location" value="{{ $location->id}}">
                    {{ csrf_field() }}
                   <div class="row clearfix col-md-12">
                    <p align="justify" >Are you sure you want to delete <strong>{{$location->loc_name}}</strong> from the list of locations? <br> <b style="color: red;">Be warned that this action is not reverseable and it is logged against your account. Do you want to proceed with this operation? </b></p>
                </div>

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-o btn-sm mt-2" data-dismiss="modal">
                    Close
                </button>
                @role('senior-pastor | administrator')
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Delete Location</button>
                @endrole
            </div>
        </div>
    </div>
</div>
</form>



