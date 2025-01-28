<div class="modal fade bt-white" id="editCountArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Edit Count Area</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.updateCountArea', 'do-update') }}">
	      			<input type="hidden" class="id" name="id" id="id" value="">
      				{{method_field('patch')}}
					{{ csrf_field() }}
					<div class="row clearfix">
		                <div class="col-sm-12">
		                    <div class="form-group form-float form-group-sm">
		                            <label class="form-label">Area/Entity Name</label>
		                        <div class="form-line">
		                            <input type="text" class="form-control" name="name" id="title" required="" />
		                        </div>
		                    </div>
		                </div>
		                <!-- <div class="col-sm-12 col-md-12">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="areain" id="areain">
                                        <option value="">Area In</option>
                                        <option value="1">Main Bowl</option>
                                        <option value="2">Gallery Ground</option>
                                        <option value="3">Gallery 1</option>
                                        <option value="4">Gallery 2</option>
                                        <option value="5">Overflows</option>
                                        <option value="6">Additionals</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div> -->
		            </div>


					<br>
					<div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                                <label class="form-label">Description</label>
                            <div class="form-line">
                                <textarea class="form-control" rows="2" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update Data</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
 
</script>
</form>