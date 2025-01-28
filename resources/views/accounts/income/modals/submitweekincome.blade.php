<div class="modal fade bt-white" id="newincome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel">Submit Income </h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('expenditure.types.new') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-3">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="svctype" id="svctype">
                                                <option value="">Service Type</option>
                                                @foreach($serviceTypes as $svcT)
                                                <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
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
                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" name="serviceDate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                            <label class="form-label">Service Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="week" id="week">
                                                <option value="">Week Under Review</option>
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                                <option value="5">Week 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-o">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>