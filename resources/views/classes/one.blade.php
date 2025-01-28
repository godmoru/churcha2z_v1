@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-3">
                    <!-- <div class="pb-3">
                        <div class="image mr-3  float-left">
                            <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
                        </div>
                        <div>
                            <h6 class="p-t-10">{{ isset($class->get_loc_pst) ? $class->get_loc_pst->pst_name : " Not set"}}</h6>
                            {{ isset($class->get_loc_pst) ? $class->get_loc_pst->pst_email : " Not set"}}<br> {{ isset($class->get_loc_pst) ? $class->get_loc_pst->pst_phone1.', '.$class->get_loc_pst->pst_phone2 : " Not set"}} <br>
                              <a data-toggle="modal" data-target="#cpastor" class="btn btn-warning btn-xs"><i class="icon-user-times"></i> Min.</a>
                              <a data-toggle="modal" data-target="#updatePinfo" class="btn btn-primary btn-xs"><i class="icon-clipboard-edit"></i> Min. Info</a>
                              <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs"><i class="icon-user-plus"></i> Convert</a>
                              <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs"><i class="icon-user-plus"></i> Member</a>
                          </div>
                        </div> -->
                    </div>
                    <div class="col-lg-9">
                       <div class="row" align="center">
                           <!--  -->
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="card r-3 bg-info text-white">
                                   <div class="p-4">
                                       <div class="float-right"><span class="icon-people s-48"></span>
                                       </div>
                                       <div class="counter-title "> Gen. Participants </div>
                                       <h5 class="sc-counter mt-3">{{ number_format(($class->loc_converts), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="white card bg-green text-white">
                                   <div class="p-4">
                                       <div class="float-right"><span class="icon-people s-48"></span>
                                       </div>
                                       <div class="counter-title">Finished Converts</div>
                                       <h5 class="sc-counter mt-3">{{ number_format(($class->getTotalFClass), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="white card">
                                   <div class="p-4 deep-orange lighten-2 text-white">
                                       <div class="float-right"><span class="icon-people s-48"></span>
                                       </div>
                                       <div class="counter-title">Unfinished Converts</div>
                                       <h5 class="sc-counter mt-3">{{ number_format(($class->gethomecells), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                          <div class="col-lg-3 col-md-4 col-sm-12 text-centered" align="center">
                            <center>
                              
                             <form class="form-inline" action="#" method="post">
                                  <label> Search Class partiipatoin here</label>
                                 <input type="text" name="startdate" required class="date-time-picker form-control form-control-sm" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" style="width: 50%;" />
                                 <input type="text" name="enddate" required class="date-time-picker form-control form-control-sm" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" style="width: 50%;" />
                                  <button type="submit" class="btn btn-primary mt-2 btn-block btn-xs"><i class="icon-search mr-2"></i>Search</button> 
                                  <!-- <a href="{{url('/class/start/new/23')}}" class="btn btn-primary mt-2 btn-block btn-xs"> Start Class</a>  -->
                              </form>
                            </center>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <hr>
          <div class="w">
              <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                  <li>
                      <a class="nav-link active" id="v-pills-home1-tab" data-toggle="pill" href="#v-pills-home1" role="tab" aria-controls="v-pills-home1" aria-selected="false"><i class="icon icon-home2"></i>Home</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-batches-tab" data-toggle="pill" href="#v-pills-batches" role="tab" aria-controls="v-pills-batches" aria-selected="false"><i class="icon icon-cubes"></i>Batches</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-active-student-tab" data-toggle="pill" href="#v-pills-active-student" role="tab" aria-controls="v-pills-active-student" aria-selected="false"><i class="icon icon-people_outline"></i>Active Students</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-graduated-student-tab" data-toggle="pill" href="#v-pills-graduated-student" role="tab" aria-controls="v-pills-graduated-student" aria-selected="false"><i class="icon icon-people_outline"></i>Graduated</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-non-graduated-student-tab" data-toggle="pill" href="#v-pills-non-graduated-student" role="tab" aria-controls="v-pills-non-graduated-student" aria-selected="false"><i class="icon icon-people_outline"></i>Non Graduated</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-mbers-tab" data-toggle="pill" href="#v-pills-mbers" role="tab" aria-controls="v-pills-mbers" aria-selected="false"><i class="icon icon-people_outline"></i> Members</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-converts-tab" data-toggle="pill" href="#v-pills-converts" role="tab" aria-controls="v-pills-converts" aria-selected="false"><i class="icon icon-user-o"></i>Converts History</a>
                  </li>
                  @role("administrator")
                  <li>
                      <a class="nav-link" id="v-pills-home-church-tab" data-toggle="pill" href="#v-pills-home-church" role="tab" aria-controls="v-pills-home-church" aria-selected="false"><i class="icon icon-home"></i>Home Church Participation</a>
                  </li>
                  @endrole
                  <li>
                      <a class="nav-link" id="v-pills-update-location-tab" data-toggle="pill" href="#v-pills-update-location" role="tab" aria-controls="v-pills-update-location" aria-selected="false"><i class="icon icon-cog"></i>Edit Info</a>
                  </li>
              </ul>
          </div>
        </div>
    </header>
    
  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
       <div class="tab-content" id="v-pills-tabContent">
           <div class="tab-pane fade show active" id="v-pills-home1" role="tabpanel" aria-labelledby="v-pills-home1-tab">
              <div class="row"> 
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="newconvert">

                  </div>
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="addmember">

                  </div>
                   
                   <div class="col-md-9">
                      <div class="row">
                          <div class="col-md-12">
                               <div class="card">
                                   <!-- <div class="card-header white">
                                       <h6>Attendance <small>Sessions</small></h6>
                                   </div> -->
                                   <div class="card-body">
                                       <!-- <div id="mainb" class="height-300"></div> -->
                                   </div>
                               </div>
                           </div>

                      </div>
                  </div>
                  <div class="col-md-3">
                       <div class="card ">
                           <ul class="list-group list-group-flush">
                               <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Cordinator</strong> <span class="float-right s-12">{{ isset($class->getCordinator) ? $class->getCordinator->pst_name : " NA"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{ isset($class->getCordinator) ? $class->getCordinator->pst_phone1 : " NA"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{ isset($class->getCordinator) ? $class->getCordinator->pst_email : " NA"}}</span></li>
                           </ul>
                       </div>
                       <br>
                         <div class="card">
                          <!-- <div class="card-header white">
                              <strong> Global Rating </strong>
                                  <span class=" float-right"><a href="#" style="font-size: 11px; font-style: italic; text-underline-position: all;">View Rating</a></span>
                          </div> -->
                          <div class="card-body pt-0">
                              <div class="my-3">
                                  <small>65% Members</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-success" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>80% Converts</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>56% Establishment Classes</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-warning" role="progressbar" style="width: 56%;" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>77% Home Churches</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 77%;" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>79% DUSOM</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar" role="progressbar" style="width: 79%;" aria-valuenow="79" aria-valuemin="0" aria-valuemax="10"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
               </div>
           </div>
            <div class="tab-pane fade" id="v-pills-batches" role="tabpanel" aria-labelledby="v-pills-batches-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                            
                          </div>
                          <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                              <thead>
                                <tr>
                                  <th width="5%">Serial</th>
                                  <th width="10%">Batch Name</th>
                                  <th width="9%">Date Created</th>
                                  <th width="12%">Counselor Assigned</th>
                                  <th width="7%">Phone No</th>
                                  <th width="5%"> Participants</th>
                                  <th width="5%">Graduated</th>
                                  <th width=8%">Non Graduated</th>
                                  <th width=5%">ABS C1</th>
                                  <th width=5%">ABS C2</th>
                                  <th width=5%">ABS C3</th>
                                  <th width=5%">ABS C4</th>
                                  <th width=5%">ABS C5</th>
                                  <th width=5%">ABS C6</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($batches as $no => $batch)
                              <tr>
                                  <td>{{++$no}}</td>
                                  <td><a href="{{route('classes.class.batches', \Crypt::encrypt($batch->id))}}">{{ $batch->name }}</a></td>
                                  <td>{{ date_format($batch->created_at, "jS M, Y") }}</td>
                                  <td>{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : " NA"}}</td>
                                  <td>{{ isset($batch->counselor) ? $batch->counselor->phone1 : " NA"}}</td>
                                  <td align="center">{{ isset($batch->participants) ? number_format(count($batch->participants),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->scopeGrad) ? number_format(count($batch->scopeGrad),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->scopeNonGrad) ? number_format(count($batch->scopeNonGrad),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC1) ? number_format(count($batch->AbsentC1),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC2) ? number_format(count($batch->AbsentC2),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC3) ? number_format(count($batch->AbsentC3),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC4) ? number_format(count($batch->AbsentC4),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC5) ? number_format(count($batch->AbsentC5),0) : "0"}}</td>
                                  <td align="center">{{ isset($batch->AbsentC6) ? number_format(count($batch->AbsentC6),0) : "0"}}</td>
                              </tr>
                              @endforeach
                              </tbody>
                            </table>
                          </div>
                      </div>
                   </div>
               </div>
           </div> 
           <div class="tab-pane fade" id="v-pills-active-student" role="tabpanel" aria-labelledby="v-pills-active-student-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> Active Students </h4>
                            <small class="card-subtitle mb-2">Established Members of the location that have undergone the establishment classes and are actively in the homechurch. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                  <form class="form">
                                    <div class="form-body">
                                      <table class="table table-striped table-bordered table-hover" id="sample_2">
                                      <thead>
                                      <tr>
                                        <th> S/No. </th>
                                        <th> Name </th>
                                        <th style="text-align: center;"> Class 1 - 15th Oct, 2018 </th>
                                        <th style="text-align: center;"> Class 2 </th>
                                        <th style="text-align: center;"> Class 3 </th>
                                        <th style="text-align: center;"> Class 4 </th>
                                        <th style="text-align: center;"> Class 5 </th>
                                        <th style="text-align: center;"> Class 6 </th>

                                      </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($participants as $count => $part)
                                        <tr class="odd gradeX">
                                          <td align="center">{{++$count}}</td>
                                          <td> {{$part->fullnames}}</td>
                                          <td><center><input type="checkbox" name="class-1" id="class-1"/></center></td>
                                          <td><center><input type="checkbox" name="class-2" id="class-2"/></center></td>
                                          <td><center><input type="checkbox" name="class-3" id="class-3"/></center></td>
                                          <td><center><input type="checkbox" name="class-4" id="class-4"/></center></td>
                                          <td><center><input type="checkbox" name="class-5" id="class-5"/></center></td>
                                          <td><center><input type="checkbox" name="class-6" id="class-6"/></center></td>
                                        @endforeach
                                        </tr>
                                      </tbody>
                                      </table>
                                      </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                       </div>
                   </div>
               </div>
           </div>
            <div class="tab-pane fade" id="v-pills-mbers" role="tabpanel" aria-labelledby="v-pills-mbers-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        @if($class->loc_members)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> Location Members </h4>
                            <small class="card-subtitle mb-2">Established Members of the location that have undergone the establishment classes and are actively in the homechurch. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->
                                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                            <th>Serial</th>
                                            <th>Seek Code</th>
                                            <th>Full Names</th>
                                            <th>Phone No</th>
                                            <th>DOB</th>
                                            <th>Date of Joined</th>
                                            <th>Found. Class Status</th>
                                            <th>DLTC Status</th>
                                            <th>School of Ministry</th>
                                            <th>Workforce Dept</th>
                                            <th>Homecell/Unit</th>
                                            <th>Entry Mode</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          @foreach($class->loc_members as $no => $member)
                                            <td>{{++$no}}</td>
                                            <td>{{ $member->seek_code }}</td>
                                            <td><a href="{{route('converts.one', \Crypt::encrypt($member->id))}}">{{ $member->sname. ' '.$member->othernames }}</a></td>
                                            <td>{{ $member->phone1 }}</td>
                                            <td>{{ $member->dob}}</td>
                                            <td>{{ date_format($member->created_at, "jS M, Y") }}</td>
                                            <td>
                                              @if($member->fclass_status == 1)
                                               Enrolled
                                              @else
                                              Not enrolled yet
                                              @endif
                                            </td>
                                            <td>
                                              @if($member->dltc_status == 1)
                                               Enrolled
                                              @else
                                              Not enrolled yet
                                              @endif
                                            </td>
                                            <td>
                                              @if($member->dusom_status == 1)
                                               Enrolled
                                              @else
                                              Not enrolled yet
                                              @endif
                                            </td>
                                            <td>{{ $member->getdept->dept_name }}</td>
                                            <td>{{ $member->gethomecell->homecell_name }}</td>
                                            <td>{{ "Full Member" }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are member(s) in this location</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
           <div class="tab-pane fade" id="v-pills-converts" role="tabpanel" aria-labelledby="v-pills-converts-tab">
               <div class="row">
                   <div class="col-md-12">
                       <div class="card">

                           <div class="card-header white b-0 p-3">
                               <h4 class="card-title text-uppercase"> Location Converts </h4>
                               <small class="card-subtitle mb-2">Converts who have not fully transitioned to members or established in any homecell or establish classes by dates. </small>
                               <hr>
                           </div>
                           <div class="collapse show" id="invoiceCard">
                               <div class="card my-3 no-b">
                                  <div class="card-body">
                                      <!-- <div class="card-title">Simple usage</div> -->
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                          <thead>
                                            <tr>
                                              <th>Serial</th>
                                              <th>Seek Code</th>
                                              <th>Full Names</th>
                                              <th>Phone No</th>
                                              <th>DOB</th>
                                              <th>Date of Joined</th>
                                              <th>Memb. Decision</th>
                                              <th>Found. Class Status</th>
                                              <th>DLTC Status</th>
                                              <th>Category</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                            
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                           </div>

                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are convert(s) in this location</center></span>
                            </div>
                          </div>


                       </div>
                   </div>
               </div>
           </div>
           <div class="tab-pane fade" id="v-pills-home-church" role="tabpanel" aria-labelledby="v-pills-home-church-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        @if($class->gethomecells)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> 
                              Location Home Churches/Cells Units
                            </h4>
                            <small class="card-subtitle mb-2">Established Members of the location that have undergone the establishment classes and are actively in the homechurch. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->
                                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                            <th>Serial</th>
                                            <th>Seek Code</th>
                                            <th>Homecell Name</th>
                                            <th>Cell Leader</th>
                                            <th>Date EstablsishedB</th>
                                            <th>Area</th>
                                            <th style="text-align: center;">Total Members</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          @foreach($class->gethomecells as $no => $hcell)
                                            <td>{{++$no}}</td>
                                            <td>{{ $hcell->seek_code }}</td>
                                            <td><a href="{{route('converts.one', $hcell->id)}}">{{ $hcell->homecell_name }}</a></td>
                                            <td>{{ $hcell->cell_leader }}</td>
                                            <td>{{ date_format($hcell->created_at, "jS M, Y") }}</td>
                                            <td>
                                              @if($hcell->dltc == 1)
                                              Already Enrolled
                                              @else
                                              Not enrolled yet
                                              @endif
                                            </td>
                                            <td align="center">{{ number_format(count($hcell->getmembers),0)}}</td>
                                        </tr> 
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are homehurch/cell(s) in this location</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel" aria-labelledby="v-pills-attendance-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        @if($class->gethomecells)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> 
                              Location Attendance History
                            </h4>
                            <small class="card-subtitle mb-2">Members attendance per service and by date in descending order. Using the last in first out model. </small>
                            <hr>
                            <div class="pull-right" align="right">
                              <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs pull-right"><i class="icon-user-plus"></i> Take Attendance</a>
                            </div>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card no-b">
                                <div class="card-body">
                                  <table class="table table-hover data-tables">
                                    <thead>
                                      <!-- <tr>
                                        <th colspan="6" style="text-align: center; text-transform: uppercase;">Location Attendance Analysis</th>
                                      </tr> -->
                                    </thead>
                                        <tbody>
                                          <tr>
                                            <td rowspan="8"><a href="">7th October, 2018</a> <br> October Blessing Sunday</td>
                                            <td colspan="2" style="text-align: center;">Services </td>
                                            <td style="text-align: center;">FT</td>
                                            <td style="text-align: center;">NC</td>
                                            <td style="text-align: center;">TV/Radio</td>
                                            <td style="text-align: center;">Facebook</td>
                                            <td style="text-align: center;">YouTube</td>
                                            <td style="text-align: center;">Online</td>
                                                <td style="text-align: center;">SMS/Calls</td>
                                                <td style="text-align: center;">Home Cell</td>
                                                <td style="text-align: center;">% FT</td>
                                                <td style="text-align: center;">% NC</td>
                                          </tr>
                                          <tr>
                                            <td>1st Serv.</td>
                                            <td align="center">75</td>
                                            <td align="center">20</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">25</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>2nd Serv.</td>
                                            <td align="center">65</td>
                                            <td align="center">43</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>3rd Serv.</td>
                                            <td align="center">58</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">15</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>4th Serv.</td>
                                            <td align="center">87</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">15</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>5th Serv.</td>
                                            <td align="center">43</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">15</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>6th Serv.</td>
                                            <td align="center">143</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">55</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr style="font-weight: bolder;">
                                            <td>Total</td>
                                            <td align="center">234</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">23</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>

                                          <tr>
                                            <td rowspan="8"><a href="">4th October, 2018 </a><br>Communion Service</td>
                                          </tr>
                                          <tr>
                                            <td>1st Serv.</td>
                                            <td align="center">75</td>
                                            <td align="center">20</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">25</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr>
                                            <td>2nd Serv.</td>
                                            <td align="center">65</td>
                                            <td align="center">43</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          <tr style="font-weight: bolder;">
                                            <td>Total</td>
                                            <td align="center">234</td>
                                            <td align="center">43</td>
                                            <td align="center">23</td>
                                            <td align="center">66</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">12</td>
                                            <td align="center">23</td>
                                            <td align="center">4.3%</td>
                                            <td align="center">5.1%</td>
                                          </tr>
                                          
                                        <!-- <tr class="no-b">
                                            <td class="w-10">
                                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                                    <img src="assets/img/dummy/u6.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>Sara Kamzoon</h6>
                                                <small class="text-muted">Marketing Manager</small>
                                            </td>
                                            <td>25</td>
                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td class="w-10">
                                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                                    <img src="assets/img/dummy/u9.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>Sara Kamzoon</h6>
                                                <small class="text-muted">Marketing Manager</small>
                                            </td>
                                            <td>25</td>
                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td class="w-10">
                                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                                    <img src="assets/img/dummy/u9.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>Sara Kamzoon</h6>
                                                <small class="text-muted">Marketing Manager</small>
                                            </td>
                                            <td>25</td>
                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td class="w-10">
                                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                                    <img src="assets/img/dummy/u9.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>Sara Kamzoon</h6>
                                                <small class="text-muted">Marketing Manager</small>
                                            </td>
                                            <td>25</td>
                                            <td>$250</td>
                                        </tr>
                                        <tr>
                                            <td class="w-10">
                                                <a href="panel-page-profile.html" class="avatar avatar-lg">
                                                    <img src="assets/img/dummy/u9.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6>Sara Kamzoon</h6>
                                                <small class="text-muted">Marketing Manager</small>
                                            </td>
                                            <td>25</td>
                                            <td>$250</td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are homehurch/cell(s) in this location</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>


           <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">
               <div class="row">
                   <div class="col-md-12">
                       <!-- The time line -->
                       <ul class="timeline">
                           <!-- timeline time label -->
                           <li class="time-label">
                            <span class="badge badge-danger r-3">
                              10 Feb. 2014
                            </span>
                           </li>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-envelope bg-primary"></i>
                               <div class="timeline-item card">
                                   <div class="card-header white"><a href="#">Support Team</a> sent you an email    <span class="time float-right"><i class="ion icon-clock-o"></i> 12:05</span></div>
                                   <div class="card-body">
                                       Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                       weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                       jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                       quora plaxo ideeli hulu weebly balihoo...
                                   </div>
                                   <div class="card-footer">
                                       <a class="btn btn-primary btn-xs">Read more</a>
                                       <a class="btn btn-danger btn-xs">Delete</a>
                                   </div>
                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-user yellow"></i>

                               <div class="timeline-item  card">

                                   <div class="card-header white"><h6><a href="#">Sarah Young</a> accepted your friend request<span class="float-right"><i class="ion icon-clock-o"></i> 5 mins ago</span></h6></div>


                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-comments bg-danger"></i>

                               <div class="timeline-item  card">


                                   <div class="card-header white"><h6><a href="#">Jay White</a> commented on your post   <span class="float-right"><i class="ion icon-clock-o"></i> 27 mins ago</span></h6></div>

                                   <div class="card-body">
                                       Take me to your leader!
                                       Switzerland is small and neutral!
                                       We are more like Germany, ambitious and misunderstood!
                                   </div>
                                   <div class="card-footer">
                                       <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                   </div>
                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline time label -->
                           <li class="time-label">
                          <span class="badge badge-success r-3"> 3 Jan. 2014</span>
                           </li>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                          
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           
                           <!-- END timeline item -->
                           <li>
                               <i class="ion icon-clock-o bg-gray"></i>
                           </li>
                       </ul>
                   </div>
                   <!-- /.col -->
               </div>
           </div>
           <div class="tab-pane fade" id="v-pills-update-location" role="tabpanel" aria-labelledby="v-pills-update-location-tab">
        <br>
           </div>
       </div>
   </div>
</div>
@endsection
@section('scripts')
<!-- Page Script  -->

@endsection