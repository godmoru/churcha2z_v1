
<div class="modal fade bt-white" id="deleteiReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel">Confirm Deletion  of Income report</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('location.delete-income-report') }}">
                    <input type="hidden" name="id" id="id">
                    {{ csrf_field() }}
                   <div class="row clearfix col-md-12">
                    <p align="justify" >Are you sure you want to delete <strong> this income entry</strong> from the list of server? <br> <b style="color: red;">Be warned that this action is not reverseable and it is logged against your account. Do you want to proceed with this operation? </b></p>
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="reason" rows="2" placeholder="Reason for this edit"></textarea>
                    </div>
                        

                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-o btn-sm mt-2" data-dismiss="modal">
                    Close
                </button>
                @role('senior-pastor | administrator|auditor|hq-accountant')
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Delete Entry</button>
                @endrole
            </div>
        </div>
    </div>
</div>
</form>



