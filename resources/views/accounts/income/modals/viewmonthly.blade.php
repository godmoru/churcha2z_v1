<div class="modal fade bt-white" id="vmonth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Get Desired Months Report</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('income.get-monthly-reports') }}">
					{{ csrf_field() }}
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label>
								Year<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="year" id="year">
									<option value="">Years</option>
									@foreach($years as $year)
										<option value="{{$year}}">{{$year}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>
								Month<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="month" id="month">
                                <option value="">-- Select Month --</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Location<span class="symbol required"></span></label>
								<select class="custom-select select2" required name="location" id="location">
                                <option value="">Desired Location</option>
                                <option value="9999">All Locations</option>
                                @foreach($locations as $loc)
                                <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
                                @endforeach
                            </select>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Get Result(s)</button>
				</div>
			</div>
		</div>
	</div>
</form>