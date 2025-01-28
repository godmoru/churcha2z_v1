
@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-2">
                    <div class="pb-3">
                        <div>
                            <h3 class="p-t-10 text-center text-bold"><i class="icon-cube"></i> <strong>{{$batchname->name}}</strong></h3>
                              <!-- <br> -->
                              <a data-toggle="modal" data-target="#editClass" class="btn btn-warning btn-xs btn-block"><i class="icon-clipboard-edit"></i> Edit Class Info</a>
                              <a data-toggle="modal" data-target="#assignC" class="btn btn-primary btn-xs btn-block"><i class="icon-assignment_ind"></i> Assign Class Counselor</a>
                              <a data-toggle="collapse" data-target="#deleteclass" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs btn-block"><i class="icon-trash"></i> Disable/Delete Class Batch</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                      <div class="p-t-b-12 container-fluid collapse col-md-12" id="deleteclass">
                        @include('classes.fclass.delete')
                      </div>
                       <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="p-3 blue1 text-white">
                                <h5 class="font-weight-normal s-14">Total Participants</h5>
                                <span class="s-48 font-weight-lighter text-primary bolder"> {{ number_format(count($batchname->participants), 0) }} </span>
                                <div>  Growth %
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_downward"></i> 0%</span>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-3">-->
                            
                        <!--    <div class="p-3 blue lighten-3 text-white">-->
                        <!--        <h5 class="font-weight-normal text-white s-14">New In Converts </h5>-->
                        <!--        <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($batchname->participants->where('people_category_id', 1)), 0) }}</span>-->
                        <!--        <div> Global %-->
                        <!--            <span class="text-white">-->
                        <!--                <i class="icon icon-arrow_downward"></i>0 %</span>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-2">-->
                        <!--    <div class="p-3 blue lighten-4 text-white">-->
                        <!--        <h5 class="font-weight-normal s-14">First In Timers</h5>-->
                        <!--        <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($batchname->participants->where('people_category_id', 2)), 0) }}</span>-->
                        <!--        <div> Global % -->
                        <!--            <span class="text-white">-->
                        <!--                <i class="icon icon-arrow_downward"></i> 0 %</span>-->

                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-md-4">
                            <div class="p-3  green lighten-3 text-white">
                                <h5 class="font-weight-normal s-14 text-white">Graduated</h5>
                                <span class="s-48 font-weight-lighter text-white bolder">0</span>
                                <div> Global %
                                    <span class="text-white">
                                        <i class="icon icon-arrow_downward"></i> 0 %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 red lighten-3 text-white">
                                <h5 class="font-weight-normal s-14">Non Graduated</h5>
                                <span class="s-48 font-weight-lighter pink-text bolder">0</span>
                                <div> Global %
                                    <span class="pink-text">
                                        <i class="icon icon-arrow_downward"></i> 0 %</span>
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
                      <a class="nav-link" id="v-pills-mbers-tab" data-toggle="pill" href="#v-pills-mbers" role="tab" aria-controls="v-pills-mbers" aria-selected="false"><i class="icon icon-people_outline"></i>Established Members From Batch</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-list"></i>DHC Attendance</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i class="icon icon-agenda"></i>Timeline</a>
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
                   <div class="col-md-3">
                       <div class="card ">
                        <div class="image mr-3  float-center">
                          <br>
                          <center>
                            <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
                          </center>
                        </div>
                        <br>
                           <ul class="list-group list-group-flush">
                               <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Full Names</strong> <span class="float-right s-12">{{ isset($batchname->counselor) ? $batchname->counselor->surname.' '.$batchname->counselor->othernames : " Not set"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{ isset($batchname->counselor) ? $batchname->counselor->phone1 : " Not set"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{ isset($batchname->counselor) ? $batchname->counselor->email : " Not set"}}</span></li>
                               <!-- <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{$batchname->loc_add}}</span></li> -->
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
                                  <small>0% Members</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>0% Converts & First Timers</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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
                          <div class="col-md-12">
                               <div class="card">
                                   <div class="card-header white">
                                        <h4 class="text-center text-uppercase">foundation class registration form/Class roster</h4> <hr>
                                    <form class="form-material" action="{{ route('classes.fclass.addFClass1') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row clearfix"><br>
                                            <div class="col-sm-3">
                                                <div class="form-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="fullnames" id="fullnames" required />
                                                        <input type="hidden" class="form-control" name="pid" id="pid" required />
                                                        <input type="hidden" class="form-control" name="classId" id="" value="{{ $batchname->id}}" required />
                                                        <label class="form-label"> Full Names</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="phone" id="phone" required onchange="FindPerson();" />
                                                        <label class="form-label">Phone No 1</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input type="text" name="dsfclass" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                                        <label class="form-label">Date Class Started</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- <div class="col-md-1"></div> -->
                                            @role('counselor-hod|fc-coordinator|administrator|resident-pastor|senior-pastor|fd-supervisor')
                                            <div class="col-ms-4 text-center pull-right" align="right">
                                                <div class="pull-right">
                                                  <button type="submit" class="btn btn-primary btn-xs mt-2 "> Add To Class</button>
                                                  <div class="btn-group mt-2" >
                                                      <button class="btn btn-warning btn-xs ">Class Further Download</button>
                                                      <button class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>

                                                      <ul class="dropdown-menu">
                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass2presents', \Crypt::encrypt($batchname->id))}}">Class 2 Present</a></li>
                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass2absents', \Crypt::encrypt($batchname->id))}}">Class 2 Absent</a></li>

                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass3presents', \Crypt::encrypt($batchname->id))}}">Class 3 Present</a></li>
                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass3absents', \Crypt::encrypt($batchname->id))}}">Class 3 Absent</a></li>

                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass4presents', \Crypt::encrypt($batchname->id))}}">Class 4 Present</a></li>
                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass4absents', \Crypt::encrypt($batchname->id))}}">Class 4 Absent</a></li>

                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass5presents', \Crypt::encrypt($batchname->id))}}">Class 5 Present</a></li>
                                                          <li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass5absents', \Crypt::encrypt($batchname->id))}}">Class 5 Absent</a></li>

                                                          <!--<li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass6presents', \Crypt::encrypt($batchname->id))}}">Class 6 Present</a></li>-->
                                                          <!--<li><a class="btn" target="_blank" href="{{route('classes.fclass.getclass6absents', \Crypt::encrypt($batchname->id))}}">Class 6 Absent</a></li>-->
                                                      </ul>
                                                  </div>
                                                  <a href="{{route('classes.fclass.printClass1', \Crypt::encrypt($batchname->id))}}" class="btn btn-success btn-xs mt-2 pull-right"> <i class="icon-download"></i> Download Class List </a>
                                                </div>
                                            </div>
                                            @endrole
                                        </div>
                                      </form>
                                   </div>
                                   <div class="card-body">
                                    <form  class="form-material" role="form" method="POST" action="{{ route('classes.fclass.submitAttendance') }}">
                                    <input type="hidden" class="form-control" name="classId" id="" value="{{ $batchname->id}}" required />
                                    {{ csrf_field() }}
                                      <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                                          <thead>
                                              <tr>
                                                  <th width="5%">S/No</th>
                                                  <th width="25%">Full Names</th>
                                                  <th width="10%">Phone No</th>
                                                  <!-- <th width="15%">Start Dated</th> -->
                                                  <!-- <th width="12%"> Classes Taken</th> -->
                                                  @role('counselor-hod|fc-coordinator|administrator|resident-pastor|senior-pastor|fd-supervisor')
                                                  <th style="text-align: center;" width="10%"> Class 1 </th>
                                                  <th style="text-align: center;" width="10%"> Class 2 </th>
                                                  <th style="text-align: center;" width="10%"> Class 3 </th>
                                                  <th style="text-align: center;" width="10%"> Class 4 </th>
                                                  <th style="text-align: center;" width="10%"> Class 5 </th>
                                                  @endrole
                                                  <th>Status</th>
                                              </tr>
                                          </thead>
                                           <tbody>
                                              @foreach($batch as $count => $class)
                                              <tr>
                                                  <td>{{ ++$count }}</td>  
                                                  <td><a href="{{route('converts.one', \Crypt::encrypt($class->PId)) }}"> <b>{{ $class->fullnames }}</b></a></td>
                                                  <td>{{ $class->Phone1 }}</td>
                                                   @role('counselor-hod|fc-coordinator|administrator|resident-pastor|senior-pastor|fd-supervisor')
                                                   <td>
                                                      <center>
                                                          @if($class->class_1_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <!-- <input type="hidden" name="class_1_status[]" value="{{$class->PId}}"> -->
                                                          @else
                                                          <input type="checkbox" name="class_1_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>
                                                  <td>
                                                      <center>
                                                          @if($class->class_2_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <input type="hidden" name="class_2_status[]" value="{{$class->PId}}">
                                                          @else
                                                          <input type="checkbox" name="class_2_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>

                                                  <td>
                                                      <center>
                                                          @if($class->class_3_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <input type="hidden" name="class_3_status[]" value="{{$class->PId}}">
                                                          @else
                                                          <input type="checkbox" name="class_3_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>
                                                  <td>
                                                      <center>
                                                          @if($class->class_4_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <input type="hidden" name="class_4_status[]" value="{{$class->PId}}">

                                                          @else
                                                          <input type="checkbox" name="class_4_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>
                                                  <td>
                                                      <center>
                                                          @if($class->class_5_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <input type="hidden" name="class_5_status[]" value="{{$class->PId}}">
                                                          @else
                                                          <input type="checkbox" name="class_5_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>
                                                  <td>
                                                      <center>
                                                          @if($class->class_6_status == 1)
                                                          <input type="checkbox" checked disabled="" value="{{$class->PId}}" id="selectedChk"/>
                                                          <input type="hidden" name="class_6_status[]" value="{{$class->PId}}">
                                                          @else
                                                          <input type="checkbox" name="class_6_status[]" value="{{$class->PId}}" id="selectedChk"/>
                                                          @endif
                                                      </center>
                                                  </td>

                                                  @endrole
                                                  <td>
                                                    @if($class->class_1_status == 1)
                                                      <div class="my-0">
                                                          <small>16.7% </small>
                                                          <div class="progress" style="height: 3px;">
                                                              <div class="progress-bar success" role="progressbar" style="width: 16.7%;" aria-valuenow="16.7" aria-valuemin="0" aria-valuemax="16.7"></div>
                                                          </div>
                                                      </div>
                                                    @elseif($class->class_2_status == 1)
                                                    <div class="my-0">
                                                          <small>33.4% </small>
                                                          <div class="progress" style="height: 3px;">
                                                              <div class="progress-bar success" role="progressbar" style="width: 33.4%;" aria-valuenow="33.4" aria-valuemin="0" aria-valuemax="16.7"></div>
                                                          </div>
                                                      </div>
                                                    @elseif($class->class_3_status == 1)
                                                    <div class="my-0">
                                                          <small>45.5% </small>
                                                          <div class="progress" style="height: 3px;">
                                                              <div class="progress-bar success" role="progressbar" style="width: 45.5%;" aria-valuenow="45.5" aria-valuemin="0" aria-valuemax="16.7"></div>
                                                          </div>
                                                      </div>
                                                  @else
                                                  @endif
                                                  </td>

                                                  <!-- <td>{{ isset($classname->counselor) ? $classname->counselor->sur_name : " In class participating"}}</td> -->
                                              </tr>

                                              @endforeach
                                              <tr>
                                                <td colspan="4"></td>
                                                <td colspan="" align="center"><button value="1" name="class_2_button" type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                                <td colspan="" align="center"><button value="1" name="class_3_button" type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                                <td colspan="" align="center"><button value="1" name="class_4_button" type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                                <td colspan="" align="center"><button value="1" name="class_5_button" type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                                <td colspan="" align="center"><button value="1" name="class_6_button" type="submit" class="btn btn-primary btn-xs btn-block">Submit</button></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                    </form>
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
                        Class Batches
                      </div>
                   </div>
               </div>
           </div>
           
           <div class="tab-pane fade" id="v-pills-home-church" role="tabpanel" aria-labelledby="v-pills-home-church-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        
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
         
       </div>
   </div>
</div>
@include('classes.fclass.assignCounselor')
@include('classes.fclass.edit')
@endsection
@section('scripts')
<!-- Page Script  -->
<script type="text/javascript">
    function FindPerson() {
    obj = new Object();
    obj._token = "{{csrf_token() }}";
    obj.phone = document.getElementById("phone").value;
    $.ajax({
        url:"{{ route('findConvert') }}",
        method:"post",
        data:obj,
        success:function(resp){
            var objects = JSON.parse(resp);
            for(var i in objects){
                // alert(document.getElementById("fullnames").value = objects[i].fullnames);
                document.getElementById("fullnames").value = objects[i].fullnames
                document.getElementById("pid").value = objects[i].id
                document.getElementById("phone").value = objects[i].phone1
            }
        }
        // error:function(resp){
        //     alert('The record do not match any of the persons registered before now. You can add him/her to the class directly from here.');
        // }
    });
}
</script>
@endsection