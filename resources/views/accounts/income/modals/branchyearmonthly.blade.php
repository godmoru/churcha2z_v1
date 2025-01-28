<div class="modal fade bt-white" id="byearmonth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Get Desired Result By Year And Month</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('income.post.location-summary', $type) }}">
					{{ csrf_field() }}
					<div class="row">
						
						<div class="col-md-12">
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
								From <span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="fmonth" id="month">
                                    @foreach($bmonths as $key => $month)
                                        <option value="{{$key}}">{{$month}}</option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>
								To<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="emonth" id="month">
                                    @foreach($bmonths as $key => $month)
                                        <option value="{{$key}}">{{$month}}</option>
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