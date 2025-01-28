<div class="modal fade bt-white" id="assignClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">Assign Class to {{ $counselor->surname.' '.$counselor->othernames }} </h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('counselor.batches.assign') }}">
					<input type="hidden" name="counselorid" value="{{$counselor->id}}">
					<input type="hidden" name="counselorphone" value="{{$counselor->phone1}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12 col-md-7">
                        <select class="custom-select select2" required name="class" id="class">
                            <option value="">Select Batch/Class</option>
                            @foreach($classbatch as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
							<input type="hidden" name="classID" value="{{$class->id}}">
                        </select>
                    </div>
                    <div class="col-md-5">
                    	<p>Assingn A Class</p>
                    </div>
						
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<p align="justify">Assigning this class to the selected counselor automatically makes him/her the custodian of the class until its 6 weeks expires. He/She can also call for make up classes beyond the initial expiration.</p>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-xs">Assign</button>
				</div>
			</div>
		</div>
	</div>
</form>