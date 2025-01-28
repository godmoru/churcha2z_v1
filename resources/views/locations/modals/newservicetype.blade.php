<div class="modal fade bt-white" id="nServiceType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Add Service Type</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.newServiceType') }}">
					{{ csrf_field() }}
					<div class="row clearfix">
		                <div class="col-sm-12">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">Service Name</label>
		                            <input type="text" class="form-control" name="name" required="" />
		                        </div>
		                    </div>
		                </div>
		            </div>
					<br>
					<div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="2" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add Service Type</button>
			</div>
		</div>
	</div>
</div>
</form>