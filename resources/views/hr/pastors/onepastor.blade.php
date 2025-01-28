@extends('layouts.master')

@section('content')

<?php
    $enlisted = new DateTime($pastor->date_ordained);
    $confirmed = new DateTime($pastor->date_confirmed);

    $to   = new DateTime('today');
    $fpath = public_path().'/images/pastors/'.$pastor->id.'.png';
?>




<header class="white pt-3 relative shadow">
        <div class="container-fluid">
           <div class="row collapse" id="editRecord">
              @include('hr.pastors.modals.edit')
            </div>

            <div class="row collapse" id="deleteC">
              @include('hr.pastors.modals.delete')
            </div>
            <div class="row collapse" id="assignLoc">
              @include('hr.pastors.modals.assignLocation')
            </div>
            <div class="row collapse" id="postToLoc">
              @include('hr.pastors.modals.postLocation')
            </div>

            <div class="row p-t-b-12 col-md-12 col-lg-12">
              <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="image m-3">
                              @if (file_exists($fpath))
                                  <img src="{{asset('images/pastors/'.$pastor->id.'.png')}}" class="user_avatar no-b no-p" style="height: 80px; width: 80px;"> 
                              @else
                                <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 80px; width: 80px;"> 
                              @endif
                            </div>
                            <div>
                            <!--<button data-toggle="collapse" data-target="#takeimage" aria-expanded="false" aria-controls="collapseExample" class="btn btn-xs btn-outline-warning"><i class="icon-photo_camera s-24 "></i></button>-->
                                <h5 class="p-t-10">{{ $pastor->surname .' '.$pastor->othernames}}</h5>
                                {{$pastor->email.',  '.$pastor->phone1}}<br>
                                <br>
                                <?php $pastortype = json_decode($pastor->pastor_type_id);?>
                                @foreach($pastortype as $ptype)
                                   {{App\PastorType::find($ptype)->name}} &nbsp; 
                                @endforeach
                                @role('administrator')
                                   <a href="#editType" data-toggle="collapse" data-target="#editType"><i class="icon-pencil"></i> </a><br>
                                @endrole
    
                                <div class="row collapse" id="editType" >
                                  @include('hr.pastors.modals.edittype')
                                </div>
                                
                                {{isset($pastor->category) ? $pastor->category->name.' pastor' : "Undefied"}}
                                @role('administrator')
                                   <a href="#editType" data-toggle="collapse" data-target="#editCategory"><i class="icon-pencil"></i> </a><br>
                                @endrole
                                <div class="row collapse" id="editCategory" >
                                  @include('hr.pastors.modals.editcategory')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-7" align="center">
                  <p class="text-uppercase text-bold text-center"> Current Location Information</p>
                  <div class="row">
                    <div class="col-md-4">
                        <p class="text-center text-uppercase h3 text-bold"><strong>{{ isset($pastor->get_loc) ? $pastor->get_loc->loc_name : " Not Posted Yet"}}</strong></p>
                        <p class="text-center text-uppercase h4">{!!DNS1D::getBarcodeHTML($pastor->tag_no, "C128A",1);!!} <strong>{{$pastor->tag_no}}</strong></p>
                    </div>
                    <div class="col-md-5">
                        <p align="justify" class="h6 text-bold">
                            <strong>Location Details:</strong> <br>
                            Parent Location: &nbsp;&nbsp;<b>{{isset($pastor->get_loc->parentLoc) ? $pastor->get_loc->parentLoc->loc_name : "Unspecified"}}</b><br>
                            Planted  By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@if($pastor->get_loc &&  $pastor->get_loc->presiding_pastor_id ==99999999)
                                <b>{{$pastor->get_loc->presiding_pastor_other_name}}</b>
                                @else
                                <a href="">{{isset($pastor->get_loc->plantingPst) ? $pastor->get_loc->plantingPst->surname.' '.$pastor->get_loc->plantingPst->othernames : "Unspecified"}}</a>
                                @endif  <br>
                            Date Planted:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>{{isset($pastor->get_loc) ? \Carbon\Carbon::parse($pastor->get_loc->date_planted)->format('l, jS \of F, Y')  : "Not set"}}</b>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p align="left" class="h6 text-bold">
                            <strong>Assistant Pastor:</strong> <br>
                            Name: {{ isset($pastor->get_loc->asstPst) ? $pastor->get_loc->asstPst->surname .' '.$pastor->get_loc->asstPst->othernames : "Unspecified yet"}}<br>   
                            Phone No: {{ isset($pastor->get_loc->asstPst) ? $pastor->get_loc->asstPst->phone1 : "-"}}<br>
                            eMail: {{ isset($pastor->get_loc->asstPst) ? $pastor->get_loc->asstPst->email : "-"}}
                        </p>
                    </div>
                  </div>
                  <hr>
                  <div  class="row clearfix" >
                    <div class="col-md-12">
                        <p align="center" class="h6 text-bold">
                            <strong>First Pioneering Pastor:</strong> <br>
                            Name: 
                            @if($pastor->get_loc && $pastor->get_loc->first_resident_pastor_id != null)
                                {{ isset($pastor->get_loc->pioneeringPst) ? $pastor->get_loc->pioneeringPst->surname .' '.$pastor->get_loc->pioneeringPst->othernames : ""}}
                                
                                @elseif(!$pastor->get_loc) Undefined
                                
                                @elseif($pastor->get_loc && $pastor->get_loc->first_resident_pastor_id == 99999999)
                                $pastor->get_loc->first_resident_pastor_other_name
                                @endif
                                
                                <br>   
                            Phone No: {{ isset($pastor->get_loc->pioneeringPst) ? $pastor->get_loc->pioneeringPst->phone1.' '.$pastor->get_loc->pioneeringPst->phone2 : "..."}}<br>
                            eMail: {{ isset($pastor->get_loc->pioneeringPst) ? $pastor->get_loc->pioneeringPst->email : "..."}}
                            
                            
                        </p>
                        </div>
                    </div>
                </div>
                
                
                <!--<div class="col-lg-4">
                 @if (\Carbon\Carbon::parse($pastor->dob)->isBirthday())
                Happy Birthday
                @else

                @endif 


                  <div class="row collapse" id="takeimage">

                  </div>
                </div>-->

                <div class="col-md-2">
                  <br><br>
                  <div class="btn-group btn-block" >
                      <button class="btn btn-success btn-xs btn-flat btn-block ">Update Information</button>
                      <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <li><a class="btn" data-toggle="modal" data-target="#updateCInfo" aria-expanded="false" aria-controls="collapseExample">Basic Info</a></li>
                          <li><a class="btn" data-toggle="modal" data-target="#updateLocHistory" aria-expanded="false" aria-controls="collapseExample">Location History</a></li>
                          <!--if($pastor->get_loc && $pastor->get_loc->parent_location_id !== null)-->
                          <li><a class="btn" data-toggle="modal" data-target="#updateEstabInfo" aria-expanded="false" aria-controls="collapseExample">Add Estab. Information</a></li>
                          <!--else-->
                            <!--endif-->
                          <li><a class="btn" data-toggle="modal" data-target="#updateMinfo" aria-expanded="false" aria-controls="collapseExample">Marital Info</a></li>
                          <!-- <li class="divider"></li> -->
                      </ul>
                  </div>
                  @role('administrator|sys-admin')
                  <div class="btn-group btn-block" >
                      <button class="btn btn-primary btn-xs btn-flat btn-block ">Location Posting/Assignment</button>
                      <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <!-- <li><a data-toggle="collapse" data-target="#assignLoc"> Assign Location</a></li> -->

                          <li><a class="btn" data-toggle="collapse" data-target="#assignLoc" aria-expanded="false" aria-controls="collapseExample">Assign Location</a></li>
                          <li class="divider"></li>
                          <li><a class="btn" data-toggle="collapse" data-target="#postToLoc" aria-expanded="false" aria-controls="collapseExample">Post to Location</a></li>

                      </ul>
                  </div>
                  <!--<a data-toggle="collapse" data-target="#assignLoc" class="btn btn-primary btn-xs btn-block"> Assign Location</a>-->
                    <button data-toggle="modal" data-target="#enableLogin" class="btn btn-outline-primary btn-xs btn-block"> Enable Login</button>
                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> 
                  @endrole
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
                      <a class="nav-link" id="v-pills-loc_history-tab" data-toggle="pill" href="#v-pills-loc_history" role="tab" aria-controls="v-pills-loc_history" aria-selected="false"><i class="icon icon-people_outline"></i>Location History </a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-loc_planted_history-tab" data-toggle="pill" href="#v-pills-loc_planted_history" role="tab" aria-controls="v-pills-loc_planted_history" aria-selected="false"><i class="icon icon-people_outline"></i>Location Planted History </a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-certificate2"></i>Awards & Recommendation</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-gavel"></i>Disciplinary Record(s)</a>
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
                   
                   <div class="col-md-9">
                    
                      <div class="row">
                          <div class="col-md-12">
                               <div class="card">
                                   <div class="card-header white">
                                       <h6>Location Growth Index <small>Per Month</small></h6>
                                   </div>
                                   <div class="card-body">
                                      
                                   </div>
                               </div>
                           </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                        <div class="card no-b p-3 my-0">
                          <div class="card-header white">
                              <strong> Current Location Performance</strong>
                          </div>
                            <p></p>
                            <div class="height-300">
                                <!--<canvas-->
                                <!--  data-chart="chartJs"-->
                                <!--  data-chart-type="pie"-->
                                <!--  data-dataset="[-->
                                <!--                  [89, 12],-->
                                <!--                  [75, 25],-->
                                <!--              ]"-->
                                <!--  data-labels="[['Presents'],['Absents']]"-->
                                <!--  data-dataset-options="[-->
                                <!--              {-->
                                <!--                  label: 'Presents',-->
                                <!--                  backgroundColor: [-->
                                <!--                      'rgba(255, 99, 132, 0.2)',-->
                                <!--                      'rgba(54, 162, 235, 0.2)',-->
                                <!--                  ],-->

                                <!--              },-->
                                <!--              {-->
                                <!--                  label: 'Absents',-->
                                <!--                  backgroundColor: [-->
                                <!--                  'rgba(255, 206, 86, 0.2)',-->
                                <!--                  'rgba(75, 192, 192, 0.2)',-->
                                <!--                  ],-->

                                <!--              },-->

                                <!--              ]" >-->
                                <!--</canvas>-->
                            </div>
                        </div>
                    </div>
               </div>

           </div>


           <div class="tab-pane fade show" id="v-pills-loc_history" role="tabpanel" aria-labelledby="v-pills-loc_history-tab">
              <div class="row"> 
                  <div class="col-md-12">
                    <div class="card">
                         <div class="card-header white">
                             <h6>History of Location(s) pastored</h6>
                         </div>
                         <div class="card-body">
                            <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                              <thead>
                                <tr>
                                  <th>Serial</th>
                                  <th>Location Name</th>
                                  <th>Serving From</th>
                                  <th>Serving To</th>
                                  <th>Position</th>
                                  <th>Duration</th>
                                  <th>Num. Attendance Average</th>
                                  <th>Purchase Land? <br>Size <small>0 for none</small></th>
                                  <th width="13%">Completed Projects</th>
                                  <th width="13%">Incomplete Projects</th>
                                  <th width="13%">Complete Renovation</th>
                                  <th width="13%">Incomplete Renovation</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr>
                                @foreach($locHis->where('pastor_id', $pastor->id) as $no => $locHis)
                                  <td>{{++$no}}</td>
                                  <td>{{ $locHis->location->loc_name }}</td>
                                  <td>{{ $locHis->date_from }}</td>
                                  <td>{{ $locHis->date_to }}</td>
                                  <td>
                                    @if($locHis->position == 7 )

                                    Resident Pastor
                                    @else

                                    Assistant Pastor

                                    @endif
                                  </td>
                                    @php 
                                      $dfrom = \Carbon\Carbon::createFromFormat("Y-m-d", $locHis->date_from);
                                      $dTo = \Carbon\Carbon::createFromFormat("Y-m-d", $locHis->date_to);
                                    @endphp
                                  <td>
                                    {{$dTo->diffInYears($dfrom)}} year(s)
                                  </td>
                                  <td align="center">
                                    @if($locHis->numberical_attendance_average ==1)
                                    51 - 100
                                    @elseif($locHis->numberical_attendance_average ==2)
                                    101 - 200
                                    @elseif($locHis->numberical_attendance_average ==3)
                                    201 - 500
                                    @elseif($locHis->numberical_attendance_average ==4)
                                    501 - 700
                                    @elseif($locHis->numberical_attendance_average ==5)
                                    701 - 1, 000
                                    @elseif($locHis->numberical_attendance_average ==6)
                                    1,500 - 2, 000
                                    @elseif($locHis->numberical_attendance_average ==7)
                                    2,001 - 3, 000
                                    @elseif($locHis->numberical_attendance_average ==8)
                                    3, 001 - 4, 000
                                    @elseif($locHis->numberical_attendance_average ==9)
                                    4, 001 - 6, 000
                                    @elseif($locHis->numberical_attendance_average ==10)
                                    7, 000 - 10, 000
                                    @elseif($locHis->numberical_attendance_average ==10)
                                    11, 000 - 15, 000
                                    @else
                                    Unspecified
                                    @endif
                                  </td>
                                  <td>
                                    @if($locHis->purchase_land ==1)
                                    {{$locHis->land_size}}
                                    @else
                                    None
                                    @endif
                                  </td>
                                  
                                  <?php $Stypes = json_decode($locHis->structure_type_id); $renStypes = json_decode($locHis->ren_structure_type_id);  $UnfStypes = json_decode($locHis->unfinished_structure_type_id); $UnStypes = json_decode($locHis->unfinished_ren_structure_type_id);?>
                                  <td>
                                    @if($locHis->built_structure ==1)
                                      @foreach($Stypes as $type)
                                        <ul>
                                          <li>{{App\StructureType::find($type)->name}}</li>
                                        </ul>
                                      @endforeach
                                    @else
                                    None
                                    @endif
                                  </td>
                                  
                                  <td>
                                    @if($locHis->unfinished_structure_type_id ==1)
                                      @foreach($UnfStypes as $type)
                                        <ul>
                                          <li>{{App\StructureType::find($type)->name}}</li>
                                        </ul>
                                      @endforeach
                                    @else
                                    None
                                    @endif
                                  </td>
                                  
                                  <td>
                                    @if($locHis->renovated_structure ==1)
                                      @foreach($renStypes as $type)
                                        <ul>
                                            <li>{{App\StructureType::find($type)->name}}</li>
                                        </ul>
                                      @endforeach
                                    @else
                                    None
                                    @endif
                                  </td>
                                  
                                  <td>
                                    @if($locHis->unfinished_ren_structure_type_id ==1)
                                      @foreach($UnStypes as $type)
                                        <ul>
                                          <li>{{App\StructureType::find($type)->name}}</li>
                                        </ul>
                                      @endforeach
                                    @else
                                    None
                                    @endif
                                  </td>
                                  

                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                         </div>
                     </div>
                 </div>
               </div>
           </div>

           <div class="tab-pane fade show" id="v-pills-loc_planted_history" role="tabpanel" aria-labelledby="v-pills-loc_planted_history-tab">
              <div class="row"> 
                  <div class="col-md-12">
                    <div class="card">
                         <div class="card-header white">
                             <h6>History of Location(s) Planted</h6>
                         </div>
                         <div class="card-body">
                            <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                              <thead>
                                <tr>
                                  <th>Serial</th>
                                  <th>Location Name</th>
                                  <th>Pioneering Pastor</th>
                                  <th>Date Planted</th>
                                </tr>
                              </thead>
                              <tbody>
                              <tr>
                                @foreach($pastor->plantedLoc as $no => $ploc)
                                  <td>{{++$no}}</td>
                                  <td>{{ $ploc->loc_name }}</td>
                                  
                                  <td>
                                    @if($ploc->poineeringPst &&  $ploc->poineeringPst->first_resident_pastor_id ==99999999)
                                        <b>{{$ploc->first_resident_pastor_other_name}}</b>
                                    @else
                                        <a href="">{{isset($ploc->poineeringPst) ? $ploc->poineeringPst->surname.' '.$ploc->poineeringPst->othernames : "Unspecified"}}</a>
                                    @endif  <br>
                                  </td>
                                  <td>{{ $ploc->date_planted }}</td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                         </div>
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
                          
                       </ul>
                   </div>
                   <!-- /.col -->
               </div>
           </div>
         
       </div>
   </div>
    @include('locations.modals.updateplantinginfo')
    @include('hr.pastors.modals.editContactInfo')
    @include('hr.pastors.modals.newlocationhistory')
    @include('systems.users.enableloginp')
    
    
</div>
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
    //<!-- State & Lgas -->
         $("select[name=state]").on('change',function(){
            var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
                var options = '<option value="">Select Host LGA</option>';
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