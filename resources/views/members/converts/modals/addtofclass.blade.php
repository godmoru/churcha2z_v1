<div class="modal fade bt-white" id="addfclass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Adding {{ $convert->fullnames }} to foundation class</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('classes.fclass.addtoClass') }}">
					{{ csrf_field() }}
					<input type="hidden" name="pId" value="{{ $convert->id }}">
					<div class="row clearfix">
		                <div class="col-sm-6">
		                    <div class="form-group form-float form-group-sm">
		                    	<br>
		                       <select class="custom-select select2" required name="classid" id="classid">
			                        <option value="">Class/Batch Name</option>
			                       	@foreach($classbatch as $class)
		                            <option value="{{$class->id}}">{{$class->name}}</option>
		                            @endforeach
									<input type="hidden" name="classID" value="{{$class->id}}">
			                    </select>		                    
			                </div>
		                </div>
		                <div class="col-sm-6">
		                    <div class="form-group form-float form-group-sm">
		                        <div class="form-line">
		                            <label class="form-label">Date Started Class</label>
		                            <input type="text" name="dsfclass" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' align="ccenter" />
		                        </div>
		                    </div>
		                </div>
		            </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">
					Update Info
					</button>
				</div>
			</div>
		</div>
	</div>
</form>