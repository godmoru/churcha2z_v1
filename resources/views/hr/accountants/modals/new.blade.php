    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">New Accountant Provision form</h4> <hr>

            <!-- <div class="jumbotron">
                <p class="h3 text-uppercase text-center"> The form is under construction. Please check back shortly </p>
            </div> -->
            <form class="form-material" action="{{ route('accountants.new') }}" method="POST">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="surname" />
                                <label class="form-label"> Surname</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="othernames" />
                                <label class="form-label"> Other Names</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="tagno" value="DC-{{$tagno}}"/>
                                <label class="form-label"> ID/Tag No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dateordained" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                <label class="form-label"> Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <select class="custom-select select2" required name="confirmation_status" id="confirmation_status">
                            <option value="">Confirmation Status</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        <div class="form-group form-float form-group-sm" id="confirmed_status">
                            <div class="form-line">
                                <input type="text" name="dateconfirmed" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                <label class="form-label"> Date Confirmed</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-sm-3">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="email" />
                                <label class="form-label">eMail Address</label>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="row clearfix">
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone1" placeholder="" />
                                <label class="form-label">Phone No 1 <small>+2348012345678</small></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone2" />
                                <label class="form-label">Phone No 2</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dob" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                <label class="form-label"> Date of Birth</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <select class="custom-select select2" required name="gender" id="gender">
                            <option value="">Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                
                    <div class="col-sm-2">
                        <select class="custom-select select2" required name="mstatus" id="mstatus">
                            <option value="">Marital Status</option>
                            @foreach($mstatus as $mst)
                            <option value="{{$mst->id}}">{{$mst->name}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        <div class="form-group form-float form-group-sm" id="manniversory">
                            <div class="form-line">
                                <input type="text" name="manniversory" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                <label class="form-label">Marriage Anniversory</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <select class="custom-select select2" required name="state" id="state">
                            <option value="">Select Origin State</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <select class="form-control" required name="lga" id="lga">
                        </select>
                    </div>
                    </div>

                <div class="row clearfix">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>
                                Acct. Functional Type <span class="symbol required"></span>
                            </label>
                            <select class="select2" name="type_id[]" multiple="multiple" required="" style="width: 100%;">
                                <option value="">Select Type</option>
                                @foreach($acctType as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>
                                Transferable Status <span class="symbol required"></span>
                            </label>
                            <select class="select2" name="transferstatus" style="width: 100%;">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>
                                Location <span class="symbol required"></span>
                            </label>
                            <select class="select2" name="location" style="width: 100%;">
                                @foreach($locations as $loc)
                                    <option value="{{$loc->id}}">{{$loc->loc_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="biography"  placeholder=""></textarea>
                                <label class="form-label"> Accounant's Brief <small>Write litle note on the accountant being added to the list.</small></label>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="resaddress"></textarea>
                                <label class="form-label">Residential Addres</label>
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