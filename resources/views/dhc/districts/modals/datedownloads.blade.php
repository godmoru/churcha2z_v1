<div class="modal fade bt-white" id="datedownload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Download by date</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('converts.get_by_criterias') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>
									Date From:<span class="symbol required"></span>
								</label>
                                <input type="text" name="datefrom" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />

                                <label>
									Date To:<span class="symbol required"></span>
								</label>
                                <input type="text" name="dateto" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />

							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>
								Convert Category<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="converttype" id="converttype">
                                <option value="">Convert Type</option>
                                <option value="9999">All Categories</option>
                                @foreach($peoplecats as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label>
									Selected District<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="district" id="district">
                                <option value="">Desired District</option>
                                @foreach($districts as $dist)
                                <option value="{{$dist->id}}">{{$dist->dis_name}}</option>
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