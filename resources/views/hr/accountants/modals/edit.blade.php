
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">Editing accountant's Information</h4> <hr>
            <form class="form-material" action="{{ route('accountant.edit') }}" method="POST">
                <input type="hidden" name="accountantid" value="{{$accountant->id}}">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-sm-3">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="surname" value="{{$accountant->surname}}" />
                                <label class="form-label"> Surname</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="othernames"value="{{$accountant->othernames}}" />
                                <label class="form-label"> Other Names</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="tagno" value="{{$accountant->tag_no}}"/>
                                <label class="form-label"> Tag No</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dob" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter"  value="{{$accountant->dob}}" />
                                <label class="form-label"> Date of Birth</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <select class="custom-select select2" required name="gender" id="gender">
                            <option value="">Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    
                </div>
                <div class="row clearfix">
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="emailaddress" value="{{$accountant->email}}"  />
                                <label class="form-label">eMail Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone1" value="{{$accountant->phone1}}" />
                                <label class="form-label">Phone No 1</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="phone2"value="{{$accountant->phone2}}"  />
                                <label class="form-label">Phone No 2</label>
                            </div>
                        </div>
                    </div>
                   <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dateenlisted" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" value="{{$accountant->date_enlisted}}" />
                                <label class="form-label"> Date Provisioned</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="dateconfirmed" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" value="{{$accountant->date_confirmed}}" />
                                <label class="form-label"> Date Confirmed</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
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
                                <input type="text" name="manniversory" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" value="{{$accountant->manniversary}}" />
                                <label class="form-label">Marriage Anniversory</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <select class="custom-select select2" required name="state" id="state">
                            <option value="">Select Host State</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <select class="form-control" required name="lga" id="lga">
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="hometown" value="{{$accountant->home_town}}" />
                                <label class="form-label"> Home Town</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="biography"  placeholder="Write litle note about this accountant being added to the system.">{{$accountant->biography}}</textarea>
                                <label class="form-label"> accountant's Brief</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="resaddress">{{$accountant->resaddress}}</textarea>
                                <label class="form-label">Residential Addres</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-primary btn-sm mt-2"> Update Data</button>
                </div>
            </form>
        </div>
    </div>
<br>
<hr>