<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New Member registration form</h4> <hr><br>
        <form class="form-material" action="{{ route('members.new') }}" method="POST">
            <input type="hidden" name="deptId" value="{{ $dept->id }}">
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
                            <input type="text" class="form-control" name="phone1" required id="phone" onkeyup="FindPerson()" />
                            <!-- <input type="text" class="form-control" name="phone1" required id="phone" onkeyup="FindPerson()" pattern="(0)([7,8,9])([0,1])(\d{8})"/> -->
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

                    

                    <div class="col-sm-3">
                        <select class="custom-select select2" required name="homecell" id="homecell">
                            <option value=""> Home Cell/Unit</option>
                            @foreach($homecells as $homecell)
                            <option value="{{$homecell->id}}">{{$homecell->homecell_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
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
                <div class="col-sm-2">
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
                <div class="col-sm-2">
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
                <div class="col-sm-2">
                    <select class="custom-select select2" required name="waterbaptism" id="waterbaptism">
                        <option value="">Water Baptism</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                    <br><br>
                    <div class="form-group form-float form-group-sm" id="waterbaptism-when">
                        <div class="form-line">
                            <input type="text" name="waterbaptism-when" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" />
                            <label class="form-label">Water Baptism When</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <select class="custom-select select2" required name="employmentstatus" id="employmentstatus">
                        <option value=""> Employement Status</option>
                        <option value="1">None - Unemployed</option>
                        <option value="2">Student</option>
                        <option value="3">Self Employeed</option>
                        <option value="4">Employeed - Worked for Government, private firm etc</option>
                        <option value="5">Retireree</option>
                    </select>
                    <br><br>
                    <div class="form-group form-float form-group-sm" id="employmentdetails">
                        <div class="form-line">
                            <input type="text" name="employmentname" class="form-control" />
                            <label class="form-label">Office/Business Name</label>
                        </div>
                        <div class="form-line">
                            <input type="text" name="employmentaddress" class="form-control" />
                            <label class="form-label">Office/Business Address</label>
                        </div>

                    </div>
                </div>

                </div>
                <br>
            <div class="row clearfix">
               <div class="col-sm-2">
                    <select class="custom-select select2" required name="qual" id="qual">
                        <option value=""> Highest Education Qualification</option>
                        <option value="500">None</option>
                        @foreach($quals as $qual)
                        <option value="{{$qual->id}}">{{$qual->description}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="form-group col-md-4">
                    <!-- <label for="">Field of Study</label> -->
                    <select class="custom-select select2" id="field_of_study" style="width:100%;" name="field_of_study" required="">
                        <option value="">Select Field of Study</option>
                        <option value="500">None</option>
                        @foreach($fos as $fos)
                        <option value="{{$fos->id}}">{{$fos->fos_name}}</option>
                        @endforeach
                        <!-- <option value="2000">Others</option> -->
                    </select>
                    <!-- <div class="" id="field_of_study_other">
                        <label for="">Field of Study Name</label>
                        <input type="text" class="form-control" name="school_other">
                    </div> -->
                </div>

                <div class="form-group col-md-4">
                    <!-- <label for="">Course Studied</label> -->
                    <select class="form-control" id="sub_field_of_study" style="width:100%;" name="sub_field_of_study" required="">
                    
                    </select>  

                     <div class="" id="course_other">
                        <label for="">Specify Other Course</label>
                        <input type="text" class="form-control" name="course_other">
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select select2" required name="year" id="year">
                        <option value=""> Year Obtained</option>
                        <option value="500">None</option>
                        @foreach($years as $year)
                        <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                </div>
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

            <div class="row">
                <h4 class="text-uppercaset">Next of Kin's Information</h4>
            </div>
            <div class="row clearfix">
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="noksurname" id="noksurname" required />
                            <label class="form-label"> Surnames</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nokothernames" id="nokothernames" required />
                            <label class="form-label"> Other Names</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="email" class="form-control" name="nokemail" />
                            <label class="form-label">eMail Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nokphone1" required id="phone"/>
                            <label class="form-label">Phone No 1</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <select name="nokRel" class="custom-select select2" required="" style="width: 100%;">
                       <option value="">NOK Relationship</option>  
                          <option value="1">Son</option>  
                          <option value="2">Daughter</option>  
                          <option value="3">Brother</option>  
                          <option value="4">Sister</option>  
                          <option value="5">Parent</option>  
                          <option value="6">Husband</option>  
                          <option value="7">Wife</option>  
                          <option value="500">Others (Specify)</option> 
                    </select>
                    <div class="" id="nok_rel_other">
                        <input type="text" name="nok_other_name" class="form-control" placeholder="Cousin">    
                        <label for="">Other Relationship</label>
                    </div>
                </div>

                    
                </div>

                <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="2" name="nokresaddress" ></textarea>
                            <label class="form-label">Next of Kin'sResidential Addres <small style="color: red;">Give a detailed description as possible</small></label>
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

