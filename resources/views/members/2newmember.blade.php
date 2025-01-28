<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New Member registration form</h4> <hr><br>
        <form class="form-material" action="{{ route('members.new') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="pid" id="pid">
            <div class="row clearfix">
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="surname" id="surname" required />
                            <label class="form-label"> Surnames</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="othernames" id="othernames" required />
                            <label class="form-label"> Other Names</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" />
                            <label class="form-label">eMail Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone1" required id="phone" onkeyup="FindPerson()" pattern="(0)([7,8,9])([0,1])(\d{8})"/>
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
                            <input type="text" name="dob" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                            <label class="form-label">Date of Birth</label>
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
                
                <div class="col-sm-2">
                    <select class="custom-select select2" required name="state" id="state">
                        <option value=""> State of Origin</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control" required name="lga" id="lga">
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <select class="custom-select select2" required name="dept" id="dept">
                            <option value=""> Workforce Department</option>
                            @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="custom-select select2" required name="homecell" id="homecell">
                            <option value=""> Home Cell/Unit</option>
                            @foreach($homecells as $homecell)
                            <option value="{{$homecell->id}}">{{$homecell->homecell_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                    <select class="custom-select select2" required name="fclass" id="fclass">
                        <option value="">Foud. Class</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <br><br>
                    <div class="form-group form-float form-group-sm" id="fclasswhen">
                        <div class="form-line">
                            <input type="text" name="fclass-when" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}">
                            <label class="form-label">Foundation Class When</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select select2" required name="dltc" id="dltc">
                        <option value="">DLTC</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <br><br>
                    <div class="form-group form-float form-group-sm" id="dltcwhen">
                        <div class="form-line">
                            <input type="text" name="dltc-when"  required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" />
                            <label class="form-label">DLTC When</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select select2" required name="dusom" id="dusom">
                        <option value="">DUSOM</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <br><br>
                    <div class="form-group form-float form-group-sm" id="dusomwhen">
                        <div class="form-line">
                            <input type="text" name="dusom-when" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" />
                            <label class="form-label">DUSOM When</label>
                        </div>
                    </div>
                </div>

                </div>
                <br>
                <div class="row clearfix">
                    
            </div>
            <br>
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="3" name="mresaddress" ></textarea>
                            <label class="form-label">Residential Addres <small style="color: red;">Give a detailed description as possible</small></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Member</button>
            </div>
        </form>
    </div>
</div>

<br>

