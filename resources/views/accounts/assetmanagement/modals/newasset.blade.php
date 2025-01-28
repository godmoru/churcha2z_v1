<div class="modal fade bt-white" id="newasset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel"> New Asset </h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('assets.new') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-3">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Asset Type</label>
                                            <select class="custom-select select2" required name="atype" id="atype">
                                                <option value="">Asset Type</option>
                                                @foreach($assetTypes as $aT)
                                                <option value="{{$aT->id}}">{{$aT->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Asset Name</label>

                                            <input type="text" name="name" class="form-control form-control-sm" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Model</label>

                                            <input type="text" name="model" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Serial</label>

                                            <input type="text" name="serial" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Manufacturer</label>
                                            <input type="text" name="manufacturer" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Vendor</label>
                                            <input type="text" name="vendor" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Purchase Invoice</label>
                                            <input type="text" name="purchaseinvoice" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Cost (if any)</label>
                                            <input type="number" value="0" align="center"  name="cost" class="form-control form-control-sm" style="text-align: center; ">
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-12 col-md-2">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Current Status</label>
                                            <select class="custom-select select2" required name="status" id="status">
                                                <option value="">Asset Type</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <label class="form-label">Item Description</label>
                                            <textarea class="form-control " name="description" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group form-float form-group-sm">
                                        <p class="text-justify"> Note: Submitting this item into the list of your physical assets. You are responsible to its availability or been depreciated in value already. If the item is no longer in use please select inactive status. </p>
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