<div class="modal fade bt-white modal-lg" id="cpastor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Change Location Pastor</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('pastor.change-location') }}">
					<input type="hidden" name="location" value="{{ $location->id}}">
					{{ csrf_field() }}
					<div class="row clearfix">
						<div class="col-md-6">
							<select class="custom-select select2" required name="residentpastor" id="residentpastor">
	                            <option value="">New Resident Pastor</option>
	                            @foreach($pastors as $pst)
	                            <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
	                            @endforeach
	                        </select>
						</div>
						<div class="col-md-6">
							<select class="custom-select select2" required name="reasonType" id="reasonType">
	                            <option value="">Reason for the change</option>
	                            <option value="1">Normal Change (Transfer)</option>
	                            <option value="2">Other Change</option>
	                            <option value="3">Other Change</option>
	                        </select>
						</div>
					</div>
					<br>
					<div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Breif to this change</label>
                                <textarea class="form-control" rows="2" name="reason"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-primary">
				Change Pastor
				</button>
			</div>
		</div>
	</div>
</div>
</form>