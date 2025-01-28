<div class="modal fade bt-white" id="addfclass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Update Pastor Information</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('locations.new') }}">
					{{ csrf_field() }}
					<div class="row clearfix">
		                <div class="col-sm-12">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">eMail Address</label>
		                            <input type="email" class="form-control" name="email" value="{{ $location->get_loc_pst->pst_email}}" />
		                        </div>
		                    </div>
		                </div>
		                <div class="col-sm-4">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">Date Ordained</label>
		                            <input type="text" name="dob" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{$location->get_loc_pst->date_ordained}}" align="ccenter" />
		                        </div>
		                    </div>
		                </div>
		            </div>
					<br>
					<div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Pst Residential Address</label>
                                <textarea class="form-control" rows="2" name="reason">{{ $location->get_loc_pst->pst_address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-primary">
				Update Info
				</button>
			</div>
		</div>
	</div>
</div>
</form>