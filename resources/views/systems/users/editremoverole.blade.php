<div class="modal fade" id="revokeRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center text-uppercase" id="myModalLabel">Revoke role from {{ $user->surname}}</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('user.revokerole') }}">
					{{ csrf_field() }}
					<div class="row">
					<input type="hidden" placeholder="" required="" class="form-control" name="user_id" value="{{ $user->id}}"/>
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Select Role(s) to be detached from {{ $user->surname}} <span class="symbol required"></span>
								</label>
								<select  class="select2" name="role_id[]" multiple="" style="width: 100%;">
				                    @foreach($rolex as $rl)
				                    	<option value="{{$rl->id}}">{{$rl->name}}</option>
				                    @endforeach
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
					Remove Role(s)
				</button>
			</div>
		</div>
	</div>
</div>
</form>