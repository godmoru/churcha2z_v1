
<div class="modal fade bt-white" id="updateLocHistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Update {{ $pastor->surname}}'s Location History</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('pastor.updatepostinginfo') }}">
					<input type="hidden" name="pastorId" value="{{ $pastor->id}}">
					{{ csrf_field() }}
					
					<div class="row clearfix">
                    <div class="col-sm-8">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <!-- <label class="form-label">Location</label> -->
                                <select class="custom-select select2" required name="location" id="location">
                                    <option value="">Select the Location</option>
                                    @foreach($locs as $loc)
                                    <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <select class="select2" name="type_id" required style="width: 100%;">
                                    <option value="">Position/Capacity</option>
                                    @foreach($psttype as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Date From</label>
                                <input type="text" name="dfrom" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Date To</label>
                                <input type="text" name="dto" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Numerical Attendance Average</label>
                                <!-- <input type="text" class="form-control" name="naa" placeholder="Attendance Avarage" /> -->
                                <select class="custom-select select2" required name="maa" id="maa">
                                    <option value="">Numerical Attendance Average</option>
                                    <option value="1">51 - 100</option>
                                    <option value="2">101 - 200</option>
                                    <option value="3">201 - 500</option>
                                    <option value="4">501 - 700</option>
                                    <option value="5">701 - 1, 000</option>
                                    <option value="6">1,500 - 2, 000</option>
                                    <option value="7">2,001 - 3, 000</option>
                                    <option value="8">3, 001 - 4, 000</option>
                                    <option value="9">4, 001 - 6, 000</option>
                                    <option value="9">7, 000 - 10, 000</option>
                                    <option value="10">11, 000 - 15, 000</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <select class="custom-select select2" required name="purchaseland" id="purchaseland">
                            <option value="">Purchase Landed Property?</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        <br><br>
                        <div class="form-group form-float form-group-sm" id="landsize">
                            <div class="form-line">
                                <input type="text" name="landsize" class="form-control" align="center" />
                                <label class="form-label">Size of Land <small>100 x 300 Sqr Ft.</small></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <select class="custom-select select2" required name="buildstructure" id="buildstructure">
                            <option value="">Built Structure?</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        <br><br>
                        <div class="form-group form-float form-group-sm" id="Structure">
                            <div class="form-line">
                                <select class="select2" name="built_type_id[]" multiple="" style="width: 100%;">
                                    <option value="">Structure Built</option>
                                    @foreach($Stype as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label">Structure Completed <small></small></label>
                            </div>
                        </div>
                        <div class="form-group form-float form-group-sm" id="unStructure">
                            <div class="form-line">
                                <select class="select2" name="unfinished_built_type_id[]" multiple="" style="width: 100%;">
                                    <option value="">Structure Built</option>
                                    @foreach($Stype as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label"> Work in progress<small></small></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <select class="custom-select select2" required name="renovatedstructure" id="renovatedstructure">
                            <option value="">Structure Renovation?</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        <br><br>
                        <div class="form-group form-float form-group-sm" id="RenStructure">
                            <div class="form-line">
                                <select class="select2" name="ren_type_id[]" multiple="" style="width: 100%;">
                                    <option value="">Structure Built</option>
                                    @foreach($Stype as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label">Structure Renovated <small></small></label>
                            </div>
                        </div>
                        <div class="form-group form-float form-group-sm" id="unRenStructure">
                            <div class="form-line">
                                <select class="select2" name="unfinished_ren_type_id[]" multiple="" style="width: 100%;">
                                    <option value="">Structure Built</option>
                                    @foreach($Stype as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <label class="form-label">Unfinished Renovation <small></small></label>
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
				Update Information
				</button>
			</div>
		</div>
	</div>
</div>
</form>