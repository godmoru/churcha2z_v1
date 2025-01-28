
<div class="modal fade bt-white" id="changeP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">Change Password</h4>
			</div>
			<div class="modal-body">
				<form action="{{url('/system/user/myaccount/update_password/'.\Crypt::encrypt(\Auth::user()->id))}}" method="post" role="form">
		           {{csrf_field()}}
		           <input type="hidden" name="userId" value="{{\Auth::user()->id}}">
			          <div class="col-md-12">
			          <div class="form-group">
				          <label>Current Password</label>
				          <input type="password" name="old_password" class="form-control" required="" placeholder="Current Password" />
			          </div>

			          <div class="form-group">
				          <label>New Password</label>
				          <input type="password" name="new_password" class="form-control" required="" placeholder="New Password" />
			          </div>
			          <div class="form-group">
				          <label>Confirm New Password</label>
				          <input type="password" name="password_confirmation" class="form-control" required="" placeholder="Confirm New Password" />
			        </div>
			 	</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Change Password
				</button>
			</div>
		</div>
	</div>
</div>
</form>

