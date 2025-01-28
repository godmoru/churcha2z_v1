<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-uppercase text-center">Provisioning new  DISTRICT</h4> <hr>
        <form class="form-material" action="{{ route('dhc.new.district') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="disname" />
                            <label class="form-label"> District Name</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="emailaddress" />
                            <label class="form-label">eMail Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="disphone1" placeholder=""/>
                            <label class="form-label">Phone No 1</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <select class="custom-select select2" required name="coordinator" id="coordinator">
                        <option value="">District Coordinator</option>
                        @foreach($pastors as $pst)
                        <option value="{{$pst->id}}">{{$pst->surname.' '.$pst->othernames}}</option>
                        @endforeach
                        <option value="909090909">Others - Specify</option>
                    </select>

                <div class="col-md" id="coordinator_other">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                          <input type="text" name="coordinator_other_name" class="form-control" placeholder="Coordinator Name" align="ccenter" />
                          <input type="text" name="coordinator_other_phone" class="form-control" placeholder="Coordinator Phone" align="ccenter" />
                        </div>
                    </div>
                </div> 
                </div>     
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="3" name="description"  placeholder=""></textarea>
                            <label class="form-label"> District Description</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Data</button>
            </div>
        </form>
    </div>
</div>
<br>
<hr>
