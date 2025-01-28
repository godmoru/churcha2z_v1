<div class="modal fade bt-white" id="locationexpenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
								Withdrawal Purpose <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="expenditure_type_id" id="expenditure_type_id">
                                    @foreach($expenditure_types as $key => $e)
                                        <option value="{{$e->id}}">{{$e->name .'--'.$e->description }}</option>
                                    @endforeach
                                </select>
							</div>
                        </div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
                                Withdrawal Purpose Description<span class="symbol required"></span>
								</label>
								<input type="text" class="form-control" name="expenditure_type_other_name"/>
							</div>
						</div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
                                Church council approval <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="church_council_approval" id="church_council_approval">
                                    {{-- @foreach($expenditure_types as $key => $e) --}}
                                        <option value="">-- Select ---</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    {{-- @endforeach --}}
                                </select>
							</div>
                        </div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
                                Pastor approval <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="pastor_approval" id="pastor_approval">
                                    {{-- @foreach($expenditure_types as $key => $e) --}}
                                        <option value="">-- Select ---</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    {{-- @endforeach --}}
                                </select>
							</div>
                        </div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
                                Hq approval <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="hq_approval" id="hq_approval">
                                    {{-- @foreach($expenditure_types as $key => $e) --}}
                                        <option value="">-- Select ---</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    {{-- @endforeach --}}
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