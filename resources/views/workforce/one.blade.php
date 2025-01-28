@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow">
        <div class="container-fluid">
           <div class="row collapse" id="addMember">
            @include('members.newmember')
            </div>

            <div class="row collapse" id="deleteC">

            </div>
            <div class="row p-t-b-12 col-md-12 col-lg-12">
              <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="image m-3">

                            </div>
                            <div>
                                <h5 class="p-t-10">{{ $dept->dept_name}}</h5>
                                {{$dept->dept_email.',  '.$dept->dept_phone1}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2" align="center">
                  <p class="text-uppercase text-bold text-center"> HOD</p>
                  <p class="text-center text-uppercase h3 text-bold"><strong>{{ $dept->ActiveHod  }}</strong></p>
                  <p class="text-center text-uppercase h4">{!!DNS1D::getBarcodeHTML($dept->tag_no, "C128A",1);!!} <strong>{{$dept->tag_no}}</strong></p>
                </div>
                
                <div class="col-lg-5">
                <!-- @if (\Carbon\Carbon::parse($dept->dob)->isBirthday())
                Happy Birthday
                @else

                @endif -->

                </div>

                <div class="col-md-2">
                  <br><br>
                  <a data-toggle="modal" data-target="#editDept" class="btn btn-warning btn-xs btn-block"> Edit Info</a>
                  <a data-toggle="modal" data-target="#assignClass" class="btn btn-primary btn-xs btn-block"> Add HOD</a>
                  <a data-toggle="collapse" data-target="#addMember" class="btn btn-success btn-xs btn-block"> Add Member</a>
                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> 
                  <!-- <button data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-secondary btn-xs btn-block"> Print Data Card</button>  -->
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
                      <a class="nav-link" id="v-pills-mbers-tab" data-toggle="pill" href="#v-pills-mbers" role="tab" aria-controls="v-pills-mbers" aria-selected="false"><i class="icon icon-people_outline"></i>Members List</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-disciplinary-tab" data-toggle="pill" href="#v-pills-disciplinary" role="tab" aria-controls="v-pills-disciplinary" aria-selected="false"><i class="icon icon-gavel"></i>Disciplinary Record(s)</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-file-o"></i>Attendance</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="icon icon-cogs"></i>Settings</a>
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
                   <div class="col-md-12">
                      <div class="card">
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase">  Members of the Department</h4>
                            <small class="card-subtitle mb-2">Established Members of the department that have undergone the establishment classes and are actively in the department serving. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">

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
                        @if(count($dept->getMembers) > 0)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase">  Members of the Department</h4>
                            <small class="card-subtitle mb-2">Established Members of the department that have undergone the establishment classes and are actively in the department serving. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->

                                    <div class="responsive-table">
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                              <th style="text-transform: uppercase;" width="2%">S/No</th>
                                              <th style="text-transform: uppercase;" width="15%">Full Name</th>
                                              <th style="text-transform: uppercase;" width="17%">Location</th>
                                              <th style="text-transform: uppercase;"> e-Mail</th>
                                              <th style="text-transform: uppercase;" width="10%"> Phone No</th>
                                              <th style="text-transform: uppercase;" width="12%">Entry Category</th>
                                              <th style="text-transform: uppercase;">Workforce Dept</th>
                                              <th style="text-transform: uppercase; text-align: center;" width="8%">Found. Class</th>
                                              <th style="text-transform: uppercase; text-align: center;" width="8%">DLTC</th>
                                              <th style="text-transform: uppercase; text-align: center;"> Status</th>
                                              </tr>
                                          </thead>
                                           <tbody>
                                              <tr class="odd gradeX">
                                              @foreach($dept->getMembers as $count => $mbr)
                                                  <td>{{ ++$count }}</td>  
                                                  <td ><a href="{{route('members.one', \Crypt::encrypt($mbr->id)) }}"> <b>{{ strtoupper($mbr->sname.' '.$mbr->othernames) }}</b></a></td>
                                                  <td style="font-size: 14px;">{{ isset($mbr->getMembersLocation) ? $mbr->getMembersLocation->loc_name : " NA"}}</td>
                                                  <td>{{ $mbr->email }}</td>
                                                  <td>{{ $mbr->phone1 }}</td>
                                                  <td align="">{{isset($mbr->getCategory) ? $mbr->getCategory->short_name : "Not Defined" }}</td>
                                                  <td align="">{{isset($mbr->getdept) ? $mbr->getdept->dept_name : "Not Defined"}}</td>
                                                  <td align="center">
                                                      @if($mbr->fclass_status  == 1)
                                                      {{ $mbr->fclass_when }}
                                                      @else
                                                      No
                                                      @endif
                                                  </td>
                                                  <td align="center">
                                                      @if($mbr->dltc_status  == 1)
                                                      {{ $mbr->dltc_when }}
                                                      @else
                                                      No
                                                      @endif
                                                  </td>
                                                  <td align="center">
                                                      Estab.
                                                  </td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                    </table>
                                    </div>
                                   
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are member(s) in this department</center></span>
                            </div>
                          </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-disciplinary" role="tabpanel" aria-labelledby="v-pills-disciplinary-tab">
              <div class="row"> 
                   <div class="col-md-12">
                      <div class="card">
                        @if(count($dept->getMembers) > 0)
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase">  Members Disciplinary Actions</h4>
                            <small class="card-subtitle">Established Members of the department that have undergone the establishment classes and are actively in the department serving. </small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                    <!-- <div class="card-title">Simple usage</div> -->

                                    <div class="responsive-table">
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                              <th style="text-transform: uppercase;" width="2%">S/No</th>
                                              <th style="text-transform: uppercase;" width="10%">Full Name</th>
                                              <th style="text-transform: uppercase;" width="7%"> Phone No</th>
                                              <th style="text-transform: uppercase;" width="9%">Disciplinary Action Category</th>
                                              <th style="text-transform: uppercase; text-align: center;"> Remarks</th>
                                              </tr>
                                          </thead>
                                           <tbody>
                                              <tr class="odd gradeX">
                                              @foreach($dept->getMembers as $count => $mbr)
                                                  <td width="2%">{{ ++$count }}</td>  
                                                  <td width="18%" ><a href="{{route('members.one', $mbr->id) }}"> <b>{{ strtoupper($mbr->sname.' '.$mbr->othernames) }}</b></a></td>
                                                  <td width="10%">{{ $mbr->phone1 }}</td>
                                                  <td width="20%"></td>
                                                  <td></td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                    </table>
                                  </div> 
                                </div>
                            </div>
                          </div>
                          @else
                          <div class="card bg-primary text-white lighten-2">
                            <div class="pt-5 pb-2 pl-5 pr-5">
                                <span class="s-48 font-weight-lighter text-primary text-center"><center>There are member(s) in this department</center></span>
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
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase">  Attendance Portal</h4>
                            <small class="card-subtitle">Group Attendance for the department</small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                  <div class="responsive-table">
                                      <table class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                        <thead>
                                          <tr>
                                              <th style="text-transform: uppercase;" width="2%">S/No</th>
                                              <th style="text-transform: uppercase;" width="10%">Full Name</th>
                                              <th style="text-transform: uppercase;" width="7%"> Phone No</th>
                                              <th style="text-transform: uppercase;" width="7%">1<sup>st</sup> Meeting</th>
                                              <th style="text-transform: uppercase;" width="7%">2<sup>nd</sup> Meeting</th>
                                              <th style="text-transform: uppercase;" width="7%">3<sup>rd</sup> Meeting</th>
                                              <th style="text-transform: uppercase;" width="7%">4<sup>th</sup> Meeting</th>
                                              <th style="text-transform: uppercase;" width="7%">Monthly Remarks</th>
                                            </tr>
                                          </thead>
                                           <tbody>
                                              <tr class="odd gradeX">
                                              @foreach($dept->getMembers as $count => $mbr)
                                                  <td width="2%">{{ ++$count }}</td>  
                                                  <td width="18%" ><a href="{{route('members.one', $mbr->id) }}"> <b>{{ strtoupper($mbr->sname.' '.$mbr->othernames) }}</b></a></td>
                                                  <td width="10%">{{ $mbr->phone1 }}</td>
                                                  <td width="9%"><center><input type="checkbox" name="class_1[]" value="{{$mbr->id}}" id="selectedChk"/></center></td>
                                                  <td width="9%"><center><input type="checkbox" name="class_1[]" value="{{$mbr->id}}" id="selectedChk"/></center></td>
                                                  <td width="9%"><center><input type="checkbox" name="class_1[]" value="{{$mbr->id}}" id="selectedChk"/></center></td>
                                                  <td width="9%"><center><input type="checkbox" name="class_1[]" value="{{$mbr->id}}" id="selectedChk"/></center></td>
                                                  <td><center><input type="text" name="monthly_remark[]" class="form-control form-control-sm" /></center></td>
                                              </tr>
                                              @endforeach
                                          </tbody>
                                    </table>
                                  </div>
                                </div> 
                              </div>  
                            </div>   
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <div class="row"> 
                <div class="col-md-12">
                      <div class="card">
                          <div class="card-header white b-0 p-3">
                            <h4 class="card-title text-uppercase">  Settings Portal</h4>
                            <small class="card-subtitle">Group Attendance for the department</small>
                            <hr>
                          </div>
                          <div class="collapse show" id="invoiceCard">
                            <div class="card my-3 no-b">
                                <div class="card-body">
                                  
                                </div> 
                              </div>  
                            </div>   
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
   @include('workforce.depts.modals.edit')
</div>
@endsection
@section('scripts')
    <!-- Page Script  -->
     <?php
        $states = \App\State::all(); 
        $lgas = \App\Lga::all();
        $fos = \App\FieldOfStudy::all(); 
        $sfos = \App\SubFieldOfStudy::all();             
    ?>
    <script hidden="">
        var states = <?= json_encode($states); ?>;
        var lgas = <?= json_encode($lgas); ?>;
        var fos = <?= json_encode($fos); ?>;
        var sfos = <?= json_encode($sfos); ?>;
    </script>

<script type="text/javascript">
    //<!-- State & Lgas -->
         $("select[name=state]").on('change',function(){
            var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
                var options = '<option value="">Select LGA of Origin</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=lga]").replaceWith(select);
        });

        // Fields & Sub fields of studies //
         $("select[name=field_of_study]").on('change',function(){
            var select = '<select class="form-control" name="sub_field_of_study" id="sub_field_of_study" style="width: 100%;" required>';
                var options = '<option value="">Select Course Studied</option>' ;
                var options = '<option value="5000">None</option>' ;

                // var options2 = '<option value="1000">Other Course Specify</option>' ;
                for(var i in sfos){
                    if($(this).val() == sfos[i].field_of_study_id){
                      // alert(sfos[i].name);
                        options+='<option value="'+sfos[i].id+'">'+sfos[i].sub_fos_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=sub_field_of_study]").replaceWith(select);
        });


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