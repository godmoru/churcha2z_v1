<div class="modal fade bt-white" id="fetchLocationData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Fetch Weekly Report By Period/Year</h4>
			</div>
			<div class="modal-body">
			<form  class="form-material" role="form" method="POST" action="{{ route('locations.deleteCountArea', 'do-delete') }}">
				{{ csrf_field() }}
				<div class="row clearfix">
		                <div class="col-sm-12 col-md-6">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="locations" id="locations">
                                        <option value="">Locations</option>
                                        <option value="9999">All Locations</option>
                                         @foreach($locations as $loc)
				                        <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
				                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="locations" id="locations">
                                        <option value="">Period</option>
                                        <option value="9999">Whole Year</option>
                                        <option value="1">Januuary</option>
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
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="locations" id="locations">
                                        <option value="">Year</option>
                                        <option value="9999">All Years</option>
                                        @foreach($years as $yr)
                                        <option value="{{$yr}}">{{$yr}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
		            </div>
	               <br>
					<div class="col-md-12" align="center">
                        <button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Fetch Data</button>
	               	</div>
	            </div>
			</div>
		</div>
	</div>
</div>
</form>