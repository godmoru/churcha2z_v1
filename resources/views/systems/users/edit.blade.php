<div class="modal fade bt-white" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center text-uppercase" id="myModalLabel">Edit {{ $user->surname}}</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('user.edit') }}">
					{{ csrf_field() }}
					<input type="hidden" placeholder="" required="" class="form-control" name="userid" value="{{ $user->id}}"/>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Surname<span class="symbol required"></span>
								</label>
								<input type="text" placeholder="" required="" class="form-control" name="sname" value="{{ $user->surname}}"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Other Names <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="" required="" class="form-control" name="onames" value="{{ $user->othernames}}" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Phone Number <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="" required="" class="form-control" name="phoneno" value="{{ $user->phone_no}}" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									eMail Address <span class="symbol required"></span>
								</label>
								<input type="email" placeholder="" required="" class="form-control" name="email" value="{{ $user->email}}" />
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-orange">
					Update User
				</button>
			</div>
		</div>
	</div>
</div>
</form>