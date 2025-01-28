<div class="modal fade bt-white" id="transferMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">Posting {{ $member->sname.' '.$member->othernames }} </h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('member.posting') }}">
					<input type="hidden" name="memberId" value="{{$member->id}}">
					<input type="hidden" name="memberName" value="{{$member->sname.' '.$member->othernames}}">
					<input type="hidden" name="memberPhone" value="{{$member->phone1}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-sm-12 col-md-7">
                        <select class="custom-select select2" required name="newDept" id="newDept">
                            <option value="">Select New Dept</option>
                            @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                            @endforeach
							
                        </select>
                    </div>
                    <div class="col-md-5">
                    	<p>Post to department</p>
                    </div>
						
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<p align="justify">Posting {{ $member->sname.' '.$member->othernames }}  to the selected department automatically makes @if($member->gender == 1) him @else her @endif a member of the workforce in the department as well as this intial one.</p>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger btn-xs" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-outline-primary btn-xs">Post</button>
				</div>
			</div>
		</div>
	</div>
</form>