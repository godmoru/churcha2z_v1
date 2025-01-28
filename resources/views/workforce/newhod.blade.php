<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-uppercase text-center">Provisioning new  HOD</h4> <hr>
        <form class="form-material" action="{{ route('workforce.depts.hods-new') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
            	<div class="col-sm-12 col-md-4 col-lg-4">
                    <select class="custom-select select2" required name="dept" id="dept">
                        <option value="">Select Department</option>
                        @foreach($depts as $dept)
                        <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-4">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="surname" />
                            <label class="form-label"> Surname</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="othernames" />
                            <label class="form-label"> Other Names</label>
                        </div>
                    </div>
                </div>
                

                <div class="col-sm-2">
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
                            <input type="text" class="form-control" name="phone1" placeholder="" pattern="(0)([7,8,9])([0,1])(\d{8})"/>
                            <label class="form-label">Phone No 1</label>
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

                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="dob" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
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
               <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="dateenlisted" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                            <label class="form-label"> Date Provisioned</label>
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="row clearfix">
                 
            </div>

            <div class="row clearfix">
                <div class="col-sm-4">
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
                
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <select class="custom-select select2" required name="state" id="state">
                        <option value="">Select Origin State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <select class="form-control" required name="lga" id="lga">
                    </select>
                </div>
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="2" name="biography"  placeholder=""></textarea>
                            <label class="form-label"> HOD's Brief</label>
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
