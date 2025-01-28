
<div class="modal fade bt-white" id="editClass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title text-center text-uppercase" id="">Editing {{ $batchname->name }} </h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('class.batches.assign') }}">
					<input type="hidden" name="classID" value="{{$batchname->id}}">
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