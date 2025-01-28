<div class="modal fade bt-white modal-lg" id="newLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">New Location</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('locations.new') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Surname<span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Abinikum" required="" class="form-control" name="sname" value=""/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Other Names <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Adekunle Iwakun" required="" class="form-control" name="onames" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Phone Number <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="08012345678 " required="" class="form-control" name="phoneno" placeholder="08012345678" pattern="(0)([7,8,9])([0,1])(\d{8})" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									eMail Address <span class="symbol required"></span>
								</label>
								<input type="email" placeholder="you@ondostate.com " required="" class="form-control" name="email" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Desired Role(s) <span class="symbol required"></span>
								</label>
								<select class="js-example-basic-multiple js-states" name="role_id[]" multiple="" style="width: 100%;">
				                    <option>select role</option>
				                </select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-orange">
						Add User
					</button>
				</div>
			</div>
		</div>
	</div>
</form>