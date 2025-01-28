<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4>Edit {{$location->loc_name}} Data</h4> <br>
            <form role="form" method="POST" action="{{ route('location.edit') }}">
                <input type="hidden" name="locId" value="{{$location->id}}">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-6">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <label class="form-label">Location/Branch Name</label>
                            <input type="text" class="form-control" name="locName" value="{{$location->loc_name}}" />
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">eMail Address</label>
                                <input type="text" class="form-control" name="locMail"  value="{{$location->loc_email}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Phone No 1</label>
                                <input type="text" class="form-control" name="phone1" value="{{$location->phone1}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <label class="form-label">Phone No 2</label>
                                <input type="text" class="form-control" name="phone2" value="{{$location->phone2}}"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <label class="form-label">Current Resident Pastor</label>
                        <select class="custom-select select2" required name="residentpastor" id="residentpastor">
                            <option value="">Resident Pastor</option>
                            @foreach($pastors as $pst)
                            <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>

            
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <label class="form-label">Location Addres</label>
                            <textarea class="form-control" rows="2" name="locAddress">{{$location->loc_add}}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Update Inormation</button>
            </div>
            </form>
        </div>
    </div>
<br>
<hr>