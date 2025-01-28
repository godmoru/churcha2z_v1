<div class="modal fade bt-white" id="nCountArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Add New Car Park</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.newCarPark') }}">
					{{ csrf_field() }}
					<div class="row clearfix">
		                <div class="col-sm-12">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">Car Park Name</label>
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
                                <label class="form-label">Description/Coverage Area</label>
                                <textarea class="form-control" rows="2" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add Car Park</button>
			</div>
		</div>
	</div>
</div>
</form>