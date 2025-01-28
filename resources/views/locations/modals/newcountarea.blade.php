<div class="modal fade bt-white" id="nCountArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Add New Count Area</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.newCountArea') }}">
					{{ csrf_field() }}
					<div class="row clearfix">
		                <div class="col-sm-12">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">Area/Entity Name</label>
		                            <input type="text" class="form-control" name="name" required="" />
		                        </div>
		                    </div>
		                </div>
		                <div class="col-sm-12 col-md-12">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="areain" id="areain">
                                        <option value="">Area In</option>
                                        <option value="1">Main Bowl</option>
                                        <option value="2">Gallery Ground</option>
                                        <option value="3">Gallery 1</option>
                                        <option value="4">Gallery 2</option>
                                        <option value="5">Overflow</option>
                                        <option value="6">Additionals</option>
                                        
                                    </select>
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
				<button type="submit" class="btn btn-primary">Add Count Area</button>
			</div>
		</div>
	</div>
</div>
</form>