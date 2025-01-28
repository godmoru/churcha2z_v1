<div class="modal fade bt-white" id="expenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Expenditure incurred</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('expenditure.store') }}"> 
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>
								Amount<span class="symbol required"></span>
								</label>
								<input type="text" class="form-control" name="amount" required/>
							</div>
						</div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
								Expenditure Type <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="expenditure_type_id" id="expenditure_type_id">
                                    @foreach($expenditure_types as $key => $e)
                                        <option value="{{$e->id}}">{{$e->name .'--'.$e->description }}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
                        <input type="hidden" class="form-control" id="month" name="month" required />
                        <input type="hidden" class="form-control" id="year" name="year" required />
						<input type="hidden" class="form-control" id="current_total" name="current_total" required />
						<input type="hidden" class="form-control" id="type" name="type" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>
</form>