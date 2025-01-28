<div class="modal fade bt-white" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">New System User</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('users.new') }}">
				    <input type="hidden" name="locationx" value="{{ \Auth::user()->location_id }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Surname<span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Paul" required="" class="form-control" name="sname" value=""/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Other Names <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="Enenche" required="" class="form-control" name="onames" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
									Phone Number <span class="symbol required"></span>
								</label>
								<input type="text" placeholder="08012345678 " required="" class="form-control" name="phoneno"/>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label>
									eMail Address <span class="symbol required"></span>
								</label>
								<input type="email" placeholder="you@mail.com " required="" class="form-control" name="email" value="{{ old('email') }}"/>
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
						@if(\Auth::user()->location_id ==1)
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Location<span class="symbol required"></span>
								</label>
								<select class="select2" name="location" style="width: 100%;">
				                    @foreach(\App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get() as $loc)
				                    	<option value="{{$loc->id}}">{{$loc->loc_name}}</option>
				                    @endforeach
				                </select>
							</div>
						</div>
						@else
						@endif
						<div class="col-md-12">
							<div class="form-group">
								<label>
									Desired Role(s) <span class="symbol required"></span>
								</label>
								<select class="select2" name="role_id[]" multiple="multiple" style="width: 100%;">
				                    @foreach($rolex as $rl)
				                    	<option value="{{$rl->id}}">{{$rl->name}}</option>
				                    @endforeach
				                </select>
							</div>
						</div>
					</div>
				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-outline-primary btn-xs">
					Add User
				</button>
			</div>
		</div>
	</div>
</div>
</form>
