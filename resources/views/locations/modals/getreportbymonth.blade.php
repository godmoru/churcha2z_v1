<div class="modal fade" id="getreportsbydate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Get Report by month/year</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('locations.get-reports-by-date') }}">
					{{ csrf_field() }}
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label>
								Service<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="month" id="month">
                                    <option value="">Month</option>
                                    <!-- <option value="999999">All Services</option> -->
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
						<div class="col-md-4">
							<div class="form-group">
								<label>
								Service<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="year" id="year">
                                    <option value="">Year</option>
                                    @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-orange">Get Data</button>
				</div>
			</div>
		</div>
	</div>
</form>