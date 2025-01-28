<div class="modal fade bt-white" id="getattbydate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Get Attendance by service date(s)/service(s)</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('attendance.printpeopleservicesummarybydate') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-8">
							<div class="row clearfix">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Date From:<span class="symbol required"></span></label>
                                			<input type="text" name="datefrom" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        	<label>Date To:<span class="symbol required"></span></label>
                                			<input type="text" name="dateto" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>
								Service<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="svc" id="svc">
                                    <option value="">Service</option>
                                    <option value="999999">All Services</option>
                                    @foreach($services as $svc)
                                    <option value="{{$svc->id}}">{{$svc->name}}</option>
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