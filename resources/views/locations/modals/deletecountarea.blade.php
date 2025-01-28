<div class="modal fade bt-white" id="deleteCountArea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Delete Count Area</h4>
			</div>
			<div class="modal-body">
			<form  class="form-material" role="form" method="POST" action="{{ route('locations.deleteCountArea', 'do-delete') }}">
  				{{method_field('delete')}}
				{{ csrf_field() }}
				<div class="row ">
	               	<div class="col-md-12">
	               		<div class="jumbotron">
	               			<input type="hidden" class="id" name="id" id="id" value="">
               				<p class="h3 text-center text-uppercase ">
								Are you sure you want to delete this count Area?
							</p>
	               		</div>
					</div>
					<div class="col-md-12" align="center">
                        <button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Yes, Delete Data</button>
	               	</div>
	            </div>
			</div>
		</div>
	</div>
</div>
</form>