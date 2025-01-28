<div class="modal fade bt-white" id="newRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center text-uppercase" id="myModalLabel">New System role</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('roles.new') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Role Title<span class="symbol required"></span>
								</label>
								<input type="text" placeholder="System Admin" required="" class="form-control" name="name" value=""/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Slug <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="sys-admin" required="" class="form-control" name="slug" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Description <span class="symbol required"></span>
								</label>
								<textarea class="form-control" name="description" rows="4" required=""></textarea>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Desired Permissions(s) <span class="symbol required"></span>
								</label>
								<br>
								@foreach($permissions as $perm)
								{{$role->name}} <input type="checkbox" name="selected[]" value="{{$perm->name}}" id="selectedChk"> 
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-orange">
					Add Role
				</button>
			</div>
		</div>
	</div>
</div>
</form>