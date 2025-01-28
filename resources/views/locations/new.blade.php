
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4>New Location/Branch</h4> <br>
            <form class="form-material" action="{{ route('locations.new') }}" method="POST">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="locName" placeholder="" />
                                <label class="form-label">Location/Branch Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="custom-select select2" required name="residentpastor" id="residentpastor">
                            <option value="">Resident Pastor</option>
                            @foreach($pastors as $pst)
                            <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dateplanted" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                                <label class="form-label">Date Planted</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                        <select class="custom-select select2" required name="plocation" id="plocation">
                            <option value="">Planting Branch</option>
                            @foreach($locations as $loc)
                            <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <select class="custom-select select2" required name="presidingpastor" id="presidingpastor">
                                <option value="">Presiding Pastor during planting</option>
                                @foreach($pastors as $pst)
                                <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                                @endforeach
                                <option value="99999999">No longer in commission - specify</option>
                            </select>
                            
                            <div id="pponame">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="presidingpastorothername"/>
                                    <label class="form-label">Pastor Name</label>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <select class="custom-select select2" required name="firstresidentpastor" id="firstresidentpastor">
                                <option value="">First Resident Pastor</option>
                                @foreach($pastors as $pst)
                                <option value="{{$pst->id}}">{{$pst->surname.' '. $pst->othernames}}</option>
                                @endforeach
                                <option value="99999999">No longer in commission - specify</option>
                            </select>
                            
                            <div id="firstresidentpastorothername">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="firstresidentpastorothername"/>
                                    <label class="form-label">Pastor Name</label>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="locMail" />
                                <label class="form-label">eMail Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone1"/>
                                <label class="form-label">Phone No 1</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone2" />
                                <label class="form-label">Phone No 2</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                     <div class="col-md-4">
                        <select class="custom-select select2" required name="country" id="country">
                            <option value="">Select Host Country</option>
                            @foreach($country as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-8">
                        <div class="row clearfix" id="localstate">
                            <div class="col-sm-6">
                                <select class="custom-select select2" name="state" id="state">
                                    <option value="">Select Host State</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->state}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" name="lga" id="lga">
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix" id="localprovince">
                            <div class="col-md-12">
                                <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="province" />
                                        <label class="form-label">Local Province/District</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="locAddress"></textarea>
                                <label class="form-label">Location Addres</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-primary btn-sm mt-2"> Create New Location</button>
                </div>
            </form>
        </div>
    </div>
<br>
<hr>