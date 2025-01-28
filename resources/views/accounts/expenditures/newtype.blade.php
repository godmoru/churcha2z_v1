<div class="modal fade bt-white" id="newtype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel">New Expenditure Type</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('expenditure.types.new') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Category:<span class="symbol required"></span></label>
                                            <select class="custom-select select2" required name="category" id="category">
                                                <option value="">Type</option>
                                                @foreach($expCats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Name:<span class="symbol required"></span></label>
                                            <input type="text" name="name" required class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Description:<span class="symbol required"></span></label>
                                            <textarea class="form-control" name="description" rows="2"></textarea>
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