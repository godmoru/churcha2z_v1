
<div class="modal fade bt-white" id="updateCInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Update {{ $pastor->surname}}'s Contact Information</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('pastors.one.editContactInfo') }}">
					<input type="hidden" name="pastorId" value="{{ $pastor->id}}">
					{{ csrf_field() }}
					
					<div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label"> Surname</label>
                                    <input type="text" class="form-control" name="surname" value="{{ $pastor->surname}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label"> Other Names</label>
                                    <input type="text" class="form-control" name="othernames" value="{{ $pastor->othernames}}" />
                                </div>
                            </div>
                        </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">eMail Address</label>
                                <input type="text" class="form-control" name="email" value="{{ $pastor->email}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Phone No 1</label>
                                <input type="text" class="form-control" name="phone1" placeholder="" value="{{ $pastor->phone1}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Phone No 2</label>
                                <input type="text" class="form-control" name="phone2" value="{{ $pastor->phone2}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Residential Addres</label>
                                <textarea class="form-control" rows="2" name="resaddress">{{ $pastor->resaddress}}</textarea>
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