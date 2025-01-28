@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-2">
                    <div class="pb-3">
                        <div class="image mr-3  float-left">
                            <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
                        </div>
                        <div>
                            <h6 class="p-t-10"><i class="icon-people"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->surname.' '.$location->get_loc_pst->othernames : " Not set"}}</h6>
                            <i class="icon-envelope"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->email : " Not set"}}<br> 
                            <?php $pastortype = json_decode($location->get_loc_pst->pastor_type_id);?>
                              @foreach($pastortype as $ptype)
                              <i class="icon-cubes"></i>   {{App\PastorType::find($ptype)->name}}<br>
                              @endforeach
                            <i class="icon-phone"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->phone1.', '.$location->get_loc_pst->phone2 : " Not set"}} <br>
                              <!-- <a data-toggle="modal" data-target="#cpastor" class="btn btn-warning btn-xs"><i class="icon-user-times"></i> Min.</a>
                              <a data-toggle="modal" data-target="#updatePinfo" class="btn btn-primary btn-xs"><i class="icon-clipboard-edit"></i> Min. Info</a>
                              <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs"><i class="icon-user-plus"></i> Convert</a>
                              <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs"><i class="icon-user-plus"></i> Member</a> -->
                              <br>
                              <div class="btn-group btn-block" >
                                <button class="btn btn-success btn-xs btn-flat btn-block ">Location Actions Center</button>
                                <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="btn" data-toggle="modal" data-target="#cpastor" aria-expanded="false" aria-controls="collapseExample">Change Pastor</a></li>
                                    <li><a class="btn" data-toggle="collapse" data-target="#editLocation" aria-expanded="false" aria-controls="collapseExample">Edit Info</a></li>
                                    <li><a class="btn" data-toggle="modal" data-target="#updateEstabInfo" aria-expanded="false" aria-controls="collapseExample">Add Estab. Information</a></li>
                                    <li><a class="btn" data-toggle="modal" data-target="#deleteLoc">Delete</a></li>
                                    <li class="divider"></li>
                                    <li><a class="btn" data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample">Add New Convert or First Timer</a></li>
                                    <li><a class="btn" data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample">Add A Member</a></li>
                                </ul>
                            </div>

                          </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                       <!-- <div class="row" align="center">
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="card r-3 bg-green text-white">
                                   <div class="p-4">
                                       <div class="float-right">
                                           <span class="icon-people_outline s-48"></span>
                                       </div>
                                       <div class="counter-title">Members </div>
                                       <h5 class="sc-counter mt-3">{{ number_format(count($location->loc_members) + count($location->loc_converts),0) }}</h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="card r-3 bg-info text-white">
                                   <div class="p-4">
                                       <div class="float-right"><span class="icon-people s-48"></span>
                                       </div>
                                       <div class="counter-title ">Convert </div>
                                       <h5 class="sc-counter mt-3">{{ number_format(count($location->loc_converts), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="white card bg-lime text-white">
                                   <div class="p-4">
                                       <div class="float-right"><span class="icon-orders s-48"></span>
                                       </div>
                                       <div class="counter-title">Estab. Classes</div>
                                       <h5 class="sc-counter mt-3">{{ number_format(count($location->getTotalFClass), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                           <div class="col-lg-3 col-md-4 col-sm-12">
                               <div class="white card">
                                   <div class="p-4 deep-orange lighten-2 text-white">
                                       <div class="float-right"><span class="icon-home s-48"></span>
                                       </div>
                                       <div class="counter-title">Home Church</div>
                                       <h5 class="sc-counter mt-3">{{ number_format(count($location->gethomecells), 0) }}</h5>
                                   </div>
                               </div>
                           </div>
                       </div> -->

                       <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="p-3 blue1 text-white">
                                <h5 class="font-weight-normal s-14">Total Members</h5>
                                <span class="s-48 font-weight-lighter text-primary bolder">{{ number_format(count($location->loc_members), 0) }}</span>
                                <div>  Growth %
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_downward"></i> {{number_format(count($location->loc_members) * count($locs)/100, 2)}} %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                            <div class="p-3 blue lighten-3 text-white">
                                <h5 class="font-weight-normal text-white s-14">New Converts</h5>
                                <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($location->getnewconverts), 0) }}</span>
                                <div> Global %
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_downward"></i> {{number_format( count($location->getnewconverts) * count($locs) /100, 2)}} %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="p-3 white">
                                <h5 class="font-weight-normal s-14">First Timers</h5>
                                <span class="s-48 font-weight-lighter amber-text bolder">{{ number_format(count($location->getfirsttimers), 0) }}</span>
                                <div> Global % 
                                    <span class="amber-text">
                                        <i class="icon icon-arrow_downward"></i> {{number_format(count($location->getfirsttimers) * count($locs) / 100, 2)}} %</span>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="p-3  blue lighten-4 text-white">
                                <h5 class="font-weight-normal s-14 text-white">Foundation Class</h5>
                                <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($location->getTotalFClass), 0) }}</span>
                                <div> Global %
                                    <span class="text-white">
                                        <i class="icon icon-arrow_downward"></i> {{number_format(count($location->getTotalFClass) * count($locs) / 100, 2)}} %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="p-3 white">
                                <h5 class="font-weight-normal s-14">DLTC</h5>
                                <span class="s-48 font-weight-lighter pink-text bolder">{{ number_format(count($location->getTotalDLTC), 0) }}</span>
                                <div> Global %
                                    <span class="pink-text">
                                        <i class="icon icon-arrow_downward"></i> {{number_format(count($location->getTotalDLTC) * count($locs) / 100, 2)}} %</span>
                                </div>
                            </div>
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
                      <a class="nav-link" id="v-pills-pastors-tab" data-toggle="pill" href="#v-pills-pastors" role="tab" aria-controls="v-pills-pastors" aria-selected="false"><i class="icon icon-people_outline"></i>Pastorate History</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-mbers-tab" data-toggle="pill" href="#v-pills-mbers" role="tab" aria-controls="v-pills-mbers" aria-selected="false"><i class="icon icon-people_outline"></i>Established Members</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-loc-converts-tab" data-toggle="pill" href="#v-pills-loc-converts" role="tab" aria-controls="v-pills-loc-converts" aria-selected="false"><i class="icon icon-user-o"></i>Converts History</a>
                  </li>
                  @role("administrator")
                  <li>
                      <a class="nav-link" id="v-pills-home-church-tab" data-toggle="pill" href="#v-pills-home-church" role="tab" aria-controls="v-pills-home-church" aria-selected="false"><i class="icon icon-home"></i>Home Church</a>
                  </li>
                  @endrole
                  <li>
                      <a class="nav-link" id="v-pills-pastor-posting-tab" data-toggle="pill" href="#v-pills-pastor-posting" role="tab" aria-controls="v-pills-pastor-posting" aria-selected="false"><i class="icon icon-list"></i>Pastors/Structures History</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-list"></i>Attendance History</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i class="icon icon-agenda"></i>Timeline</a>
                  </li>
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
                    @include('members.converts.modals.newconvert')
                  </div>
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="addmember">
                    <!-- include('members.newmember') -->
                  </div>
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="editLocation">
                    @include('locations.modals.edit')
                  </div>
                   <div class="col-md-3">
                       <div class="card ">
                           <ul class="list-group list-group-flush">
                               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{$location->phone1}}</span></li>
                               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{$location->loc_email}}</span></li>
                               <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{$location->loc_add}}</span></li>
                               @role('administrator')
                               <li class="list-group-item">
                                  <a class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#enableLogin" >Enable Location Admin</a>
                               </li>
                               @endrole
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
                                  <small>{{number_format(count($locs)/100*count($location->loc_members), 2)}}% Members</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-success" role="progressbar" style="width: {{number_format(count($location->loc_members) * count($locs)/100, 2)}}%;" aria-valuenow="{{number_format(count($location->loc_members)*count($locs)/100, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>{{number_format(count($locs)/100 * count($location->loc_converts), 2)}}% Converts & First Timers</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: {{number_format(count($locs)/100 * count($location->loc_converts), 2)}}%;" aria-valuenow="{{number_format(count($locs)/100 * count($location->loc_converts), 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>6% Establishment Classes</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-warning" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>7% Home Churches</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>10% General Atteandance</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
                   <div class="col-md-9">
                    
                      <div class="row">
                          <div class="col-md-8">
                               <div class="card">
                                   <!-- <div class="card-header white">
                                       <h6>Attendance <small>Sessions</small></h6>
                                   </div> -->
                                   <div class="card-body">
                                       <div id="mainb" class="height-300"></div>
                                   </div>
                               </div>
                           </div>

                           <div class="col-md-4">
                               <div class="card">
                                  <!--  <div class="card-header white">
                                       <h6>People <small>Breakdown</small></h6>
                                   </div> -->
                                   <div class="card-body">
                                       <div id="echart_pie" class="height-300"></div>
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
                        @if(count($location->loc_members) > 0)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> Location Members </h4>
                            <small class="card-subtitle mb-2">Established Members of the location that have undergone the establishment classes and are actively in the homechurch. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->
                                    <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
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
                                          @foreach($location->loc_members as $no => $member)
                                            <td>{{++$no}}</td>
                                            <td>{{ $member->seek_code }}</td>
                                            <td><a href="{{route('converts.one', $member->id)}}">{{ $member->sname. ' '.$member->othernames }}</a></td>
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
            <div class="tab-pane fade" id="v-pills-pastor-posting" role="tabpanel" aria-labelledby="v-pills-pastor-posting-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        @if(count($location->getPostingHistory) > 0)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase"> Location Members </h4>
                            <small class="card-subtitle mb-2">Established Members of the location that have undergone the establishment classes and are actively in the homechurch. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->
                                    <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                            <th>Serial</th>
                                            <th>Pastor</th>
                                            <th>Landed Property Purchased</th>
                                            <th>Completed Structures</th>
                                            <th>Unfinished Structures</th>
                                            <th>Renovated Structures</th>
                                            <th>Numberical Attendance</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                          @foreach($location->getPostingHistory as $no => $pastorHistory)

                                            <td>{{++$no}}</td>
                                            <td>{{ isset($pastorHistory->pastor) ? $pastorHistory->pastor->surname. ' '.$pastorHistory->pastor->othernames : "Not defined"}}</td>
                                            <td>
                                              {{isset($pastorHistory->land_size) ? $pastorHistory->land_size : "None Purchased"}}
                                            </td>
                                            <td>

                                                <?php $locStr = json_decode($pastorHistory->structure_type_id);?>
                                                @if(isset($locStr))
                                                  @foreach($locStr as $stype)
                                                  <ul>
                                                    <li>
                                                     {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                                                    </li>
                                                  </ul>
                                                  @endforeach
                                                  @else
                                                  None
                                                  @endif
                                            </td>
                                            <td>

                                                <?php $locStr = json_decode($pastorHistory->unfinished_structure_type_id);?>
                                                @if(isset($locStr))
                                                  @foreach($locStr as $stype)
                                                  <ul>
                                                    <li>
                                                     {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                                                    </li>
                                                  </ul>
                                                  @endforeach
                                                  @else
                                                  None
                                                  @endif
                                            </td>

                                            <td>

                                                <?php $locStr = json_decode($pastorHistory->ren_structure_type_id);?>
                                                @if(isset($locStr))
                                                  @foreach($locStr as $stype)
                                                  <ul>
                                                    <li>
                                                     {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                                                    </li>
                                                  </ul>
                                                  @endforeach
                                                  @else
                                                  None
                                                  @endif
                                            </td>


                                            <td>
                                                <ul>
                                                  <li>
                                                    @if($pastorHistory->numberical_attendance_average ==1)
                                                    51 - 100
                                                    @elseif($pastorHistory->numberical_attendance_average ==2)
                                                    101 - 200
                                                    @elseif($pastorHistory->numberical_attendance_average ==3)
                                                    201 - 500
                                                    @elseif($pastorHistory->numberical_attendance_average ==4)
                                                    501 - 700
                                                    @elseif($pastorHistory->numberical_attendance_average ==5)
                                                    701 - 1, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==6)
                                                    1,500 - 2, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==7)
                                                    2,001 - 3, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==8)
                                                    3, 001 - 4, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==9)
                                                    4, 001 - 6, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==10)
                                                    7, 000 - 10, 000
                                                    @elseif($pastorHistory->numberical_attendance_average ==10)
                                                    11, 000 - 15, 000
                                                    @else
                                                    Unspecified
                                                    @endif
                                                  </li>
                                                </ul>
                                            </td>
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
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are pastor(s) posting or any structure(s) added alongside such posting in this location</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
           <div class="tab-pane fade" id="v-pills-loc-converts" role="tabpanel" aria-labelledby="v-pills-loc-converts-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                         @if(count($location->loc_converts) > 0)
                           <div class="card-header white b-0 p-3">
                            <div class="col-md-4">
                               <h4 class="card-title text-uppercase"> Location Converts </h4>
                            </div>
                            <div class="col-md-8">
                              <div class="">
                                      <a href="{{route('converts.print') }}" class="btn btn-warning btn-xs"> <i class="icon-download"></i> Download This List</a>
                                      <a href="{{route('converts.printtodays') }}" class="btn btn-success btn-xs"> <i class="icon-download"></i> Download Query Result</a>
                                      <a data-toggle="collapse" data-target="#searchConverts" class="btn btn-outline-success btn-xs"> <i class="icon-search"></i> Filter Records</a>
                                    </div>
                            </div>
                               <small class="card-subtitle mb-2">Converts who have not fully transitioned to members or established in any homecell or establish classes by dates. </small>
                               <hr>
                           </div>
                           <div class="collapse show" id="invoiceCard">
                               <div class="card my-3 no-b">
                                  <div class="card-body">
                                    <div class="row collapse col-md-12" id="searchConverts">
                                      @include('members.converts.modals.searchconverts')
                                  </div>
                                    
                                      <!-- <div class="card-title">Simple usage</div> -->
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                          <thead>
                                            <tr>
                                              <th>Serial</th>
                                              <th>Seek Code</th>
                                              <th>Full Names</th>
                                              <th>Phone No</th>
                                              <!-- <th>DOB</th> -->
                                              <th>Date of Joined</th>
                                              <th>Memb. Decision</th>
                                              <th>Found. Class Status</th>
                                              <th>DLTC Status</th>
                                              <th>Category</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                            @foreach($location->loc_converts as $no => $convert)
                                              <td>{{++$no}}</td>
                                              <td>{{ $convert->seek_code }}</td>
                                              <td><a href="{{route('converts.one', $convert->id)}}">{{ $convert->fullnames }}</a></td>
                                              <td>{{ $convert->phone1 }}</td>
                                              <!-- <td>{{ $convert->dob}}</td> -->
                                              <td>{{ date_format($convert->created_at, "jS M, Y") }}</td>
                                              <td>
                                                @if($convert->membership_decision == 1)
                                                Decided Yes
                                                @else
                                                Not deicided yet
                                                @endif
                                              </td>
                                              <td>
                                                @if($convert->fclass == 1)
                                                Already Enrolled
                                                @else
                                                Not enrolled yet
                                                @endif
                                              </td>
                                              <td>
                                                @if($convert->dltc == 1)
                                                Already Enrolled
                                                @else
                                                Not enrolled yet
                                                @endif
                                              </td>
                                              <td>{{ $convert->getCategory->cat_name}}</td>
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
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are convert(s) in this location</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-home-church" role="tabpanel" aria-labelledby="v-pills-home-church-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        @if(count($location->gethomecells) > 0)
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
                                          @foreach($location->gethomecells as $no => $hcell)
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
                        @if(count($location->gethomecells) > 0)
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
            <div class="card my-3 col-md-12">
                <div class="card-body">
                    <h4>Editing {{ $location->loc_name }}</h4> <br>
                    <form class="form-material" action="{{ route('location.edit') }}" method="POST">
                    <input type="hidden" class="form-control" name="locId" value="{{$location->id}}" />

                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="locName" value="{{$location->loc_name}}" />
                                        <label class="form-label">Location/Branch Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <select class="custom-select select2" required name="residentpastor" id="residentpastor">
                                    <option value="">Resident Pastor</option>
                                    <option selected="" value="{{isset($location->get_loc_pst) ? $location->get_loc_pst->id : "1"}}">{{isset($location->get_loc_pst) ? $location->get_loc_pst->surname .' '.$location->get_loc_pst->othernames : "Select from the list"}}</option>
                                    @foreach($pastors as $pst)
                                    <option value="{{$pst->id}}">{{$pst->pst_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="locMail" value="{{$location->loc_email}}" />
                                        <label class="form-label">eMail Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone1" value="{{$location->phone1}}"/>
                                        <label class="form-label">Phone No 1</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone2" value="{{$location->phone2}}"/>
                                        <label class="form-label">Phone No 2</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                             <div class="col-sm-4">
                                <select class="custom-select select2" required name="zone" id="zone">
                                    <option value="">Select Host Zone</option>
                                    <option selected="" value="{{isset($location->loc_zone) ? $location->loc_zone->id : "1"}}">{{isset($location->loc_zone) ? $location->loc_zone->zone_name : "Select from the list"}}</option>

                                    @foreach($zones as $zone)
                                    <option value="{{$zone->id}}">{{$zone->zone_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <select class="custom-select select2" required name="state" id="state">
                                    <option value="">Select Host State</option>
                                    <option selected="" value="{{isset($location->loc_state) ? $location->loc_state->id : "1"}}">{{isset($location->loc_state) ? $location->loc_state->state : "Select from the list"}}</option>
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->state}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">

                                <select class="form-control" required name="lga" id="lga">
                                    <option selected="" value="{{isset($location->loclga) ? $location->loclga->id : "1"}}">{{isset($location->loclga) ? $location->loclga->lga_name : "Select from the list"}}</option>

                                </select>
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
           </div>
       </div>
   </div>
</div>

 <!--include('locations.modals.updateplantinginfo')-->
 @include('locations.modals.enablelogin')
 @include('locations.modals.changepastor')
 @include('locations.modals.updatePinfo')
 @include('locations.modals.edit')
 @include('locations.modals.delete')

@endsection
@section('scripts')
<!-- Page Script  -->
 <?php
    $states = \App\State::all(); 
    $lgas = \App\Lga::all();            
?>
<script hidden="">
  var states = <?= json_encode($states); ?>;
  var lgas = <?= json_encode($lgas); ?>;
</script>

<script type="text/javascript">

       // $("#manniversory").hide();
     
    //<!-- State & Lgas -->
     $("select[name=state]").on('change',function(){
        var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
            var options = '<option value=""> LGA of Origin</option>';
            for(var i in lgas){
                if($(this).val() == lgas[i].state_id){
                    options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                }
           }
           select+=options+'</select>';
           $("select[name=lga]").replaceWith(select);
        });
</script>
@endsection