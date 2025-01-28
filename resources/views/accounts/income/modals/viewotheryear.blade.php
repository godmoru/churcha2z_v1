<div class="modal fade bt-white" id="oyear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" >
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Get Year Report</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('income.get-yearly-reports') }}">
					{{ csrf_field() }}
					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group">
								<label>
								Year<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="year" id="year">
                                <option value="">Years</option>
                                {{--  <option value="9999">All years</option>  --}}
                                @foreach($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
							</div>
						</div>

						<div class="col-md-6">
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