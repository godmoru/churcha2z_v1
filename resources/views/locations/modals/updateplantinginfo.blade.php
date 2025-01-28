<div class="modal fade bt-white" id="updateEstabInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Location Planting Details</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('location.updateplantinginfo') }}">
					<input type="hidden" name="location" value="{{ isset($pastor->get_loc) ? $pastor->get_loc->id : "1"}}">
					{{ csrf_field() }}
					<div class="row clearfix">
						
						<div class="col-md-4">
                            <label class="form-label"> Parent Location</label>
							<select class="custom-select select2" required name="parentlocation" id="parentlocation">
	                            <!-- <option value="">Parent Location</option> -->
	                            <!-- <option value="1">Normal Change (Transfer)</option> -->
	                            @foreach($locs as $loc)
	                            <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
	                            @endforeach
	                        </select>
						</div>

						<div class="col-md-4">
                        <div class="form-group form-float form-group-sm">
                            <label class="form-label">Parent Location Resident Pastor</label>
                            <select class="custom-select select2" name="presidingpastor" id="presidingpastor">
                                <option value="">Parent Location Pastor</option>
                                @foreach($pastors as $pst)
                                <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                                @endforeach
                                <option value="99999999">No longer in commission - specify</option>
                            </select>
                            
                            <div id="pponame">
                                <div class="form-line">
                                    <label class="form-label">Pastor Name</label>
                                    <input type="text" class="form-control" name="presidingpastorothername"/>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
					<div class="col-md-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Date Planted</label>
                                <input type="text" name="dateplanted" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                            </div>
                        </div>
                    </div>

				</div>
				<div class="row clearfix">
				    <div class="col-md-6">
                        <div class="form-group form-float form-group-sm">
                            <select class="custom-select select2" required name="firstresidentpastor" id="firstresidentpastor">
                                <option value="">First Resident Pastor</option>
                                @foreach($pastors as $pst)
                                <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                                @endforeach
                                <option value="99999999">No longer in commission - specify</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6" >
                        <div id="firstresidentpastorothername">
                            <div class="form-line">
                                <input type="text" class="form-control" name="firstresidentpastorothername"/>
                                <label class="form-label">Pastor Name</label>
                            </div>
                        </div>
                    </div>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">
					Close
				</button>
				<button type="submit" class="btn btn-primary">
				Update Information
				</button>
			</div>
		</div>
	</div>
</div>
</form>