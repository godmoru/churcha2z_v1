<div class="modal fade" id="NewCell" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">New Homecell</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('dhc.homecell-new') }}">
					<input type="hidden" name="areaId" value="{{ $area->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Cell Name:<span class="symbol required"></span>
								</label>
                                <input type="text" name="name" required class="form-control" align="" />

                                <label>
									Cell Description:<span class="symbol required"></span>
								</label>
								<textarea name="description" class="form-control" rows="2"></textarea>

								<label>
									Cell Address:<span class="symbol required"></span>
								</label>
								<textarea name="address" class="form-control" rows="3"></textarea>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>
</form>