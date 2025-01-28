<div class="modal fade bt-white" id="editConvertSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">New converts welcome sms</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Content<span class="symbol required"></span>
								</label>
								<textarea class="form-control" name="smscontent" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>

<!-- First Timers SMS -->
<div class="modal fade bt-white" id="editFTSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">FIrst timers welcome sms</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Content<span class="symbol required"></span>
								</label>
								<textarea class="form-control" name="smscontent" rows="4"></textarea>
							</div>
						</div>

					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>

<!-- Notification Settings -->
<div class="modal fade bt-white" id="notificationSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">Notification Settings</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>
									e-Mail Notification<span class="symbol required"></span>
								</label>
								<select class="select2" name="email_answer" required>
									<option value="">Select Option</option>
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									SMS Notification<span class="symbol required"></span>
								</label>
								<select class="select2" name="sms_answer" required>
									<option value="">Select Option</option>
									<option value="1">Enable</option>
									<option value="2">Disable</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Notice<span class="symbol required"></span>
								</label>
								<p class="h6"> Whatever value you specify here shall be used by the system to serve you better. Please ensure you provide the most accurate details required. Thank you.</p>
							</div>
						</div>

					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>


<!-- SMS Settings -->
<div class="modal fade bt-white" id="SMSSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">bulk sms Configuration settings</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>
									SMS API Link<span class="symbol required"></span>
								</label>
								<input type="text" name="smsapi" class="form-control">
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>
									Default Sender<span class="symbol required"></span>
								</label>
								<input type="text" name="sender" class="form-control">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>
									SMS Username<span class="symbol required"></span>
								</label>
								<input type="text" name="username" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									SMS Password<span class="symbol required"></span>
								</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>
									Notice<span class="symbol required"></span>
								</label>
								<p class="h6"> Whatever value you specify here shall be used by the system to serve you better. Please ensure you provide the most accurate details required. Thank you.</p>
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>

<!-- Email Settings -->
<div class="modal fade bt-white" id="eMailSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">eMail COnfiguration settings</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>
									Mail Driver<span class="symbol required"></span>
								</label>
								<input type="text" name="driver" class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>
									Mail Host<span class="symbol required"></span>
								</label>
								<input type="text" name="host" class="form-control">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>
									Mail Port<span class="symbol required"></span>
								</label>
								<input type="text" name="port" class="form-control">
							</div>
						</div>

						
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Mail Username<span class="symbol required"></span>
								</label>
								<input type="text" name="username" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Mail Password<span class="symbol required"></span>
								</label>
								<input type="password" name="password" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>
									Notice<span class="symbol required"></span>
								</label>
								<p class="h6"> Whatever value you specify here shall be used by the system to serve you better. Please ensure you provide the most accurate details required. Thank you.</p>
							</div>
						</div>


					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>

<!-- System Admin Settings -->
<div class="modal fade bt-white" id="sysAdminSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">system admin settings</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
					<input type="hidden" name="location" value="{{ \Auth::user()->id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>
									System Admin Names:<span class="symbol required"></span>
								</label>
								<input type="text" name="sys_admin_name" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>
									Admin Phone No:<span class="symbol required"></span>
								</label>
								<input type="text" name="sys_admin_phone" class="form-control">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Admin/Support eMail<span class="symbol required"></span>
								</label>
								<input type="text" name="sys_admin_email" class="form-control">
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>
									Notice<span class="symbol required"></span>
								</label>
								<p class="h6"> This person is hereby authorize to have an unlimited access to the system. Please ensure you have chosen the most accurate person to handle all of your information. Thank you.</p>
							</div>
						</div>


					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Update
				</button>
			</div>
		</div>
	</div>
</div>
</form>


