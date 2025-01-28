@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
  <!--include('members.converts.modals.addtofclass')-->
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-3 col-md-2">
                    <div class="pb-3">
                      <div class="card-body text-center">
                            <div class="image m-3">
                                <!-- <img class="user_avatar no-b no-p r-5" src="assets/img/dummy/u1.png" alt="User Image"> -->
                                <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 120px; width: 110px;" align="center">
                            </div>
                            <div>
                                <h6 class="p-t-10">{{ $convert->fullnames}}</h6>
                                {{ $convert->email.' '.$convert->phone1}}<br>
                                {{ $convert->getCategory->cat_name }}
                                {{ $convert->serviceT->name }}
                                 <hr>
                                <i class="icon-home2"></i> {{ isset($convert->getAddressDistrict)? $convert->getAddressDistrict->dis_name : "Not Selected"}} <br> {{ $convert->res_address}}

                            </div>
                            <hr>
                            <!-- <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a> <br> -->
                            @if($convert->fclass_status == 1)
                              @else
                              <a data-toggle="modal" data-target="#addfclass" class="btn btn-warning btn-xs btn-block"><i class="icon-user-plus"></i> Add to Foundation Class</a>
                              @endif
                              <a data-toggle="modal" data-target="#updatePinfo" class="btn btn-primary btn-xs btn-block"><i class="icon-user-plus"></i> Add to Maturity Class (DLTC)</a>
                              <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs btn-block"><i class="icon-group_add"></i> Confirm as Member</a>
                                                            <a data-toggle="collapse" data-target="#deleteconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs btn-block"><i class="icon-group_add"></i> Delete Data</a>

                              <!-- <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs btn-block"><i class="icon-group_add"></i> Workforce Posting</a> -->
                        </div>
                    </div>
                    <div class="card">
                    <!-- <div class="card-header white">
                        <strong> DHC WIDGET </strong>
                    </div> -->
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="icon icon-home text-blue"></i> DHC Name:
                                <span class="float-right mt-2 font-weight-bold"> N/A</span>
                            </li>
                            <li class="list-group-item">
                                <i class="icon icon-user text-yellow"></i>DHC Leader:
                                <span class="float-right mt-2 font-weight-bold"> N/A</span>
                            </li>
                            <li class="list-group-item">
                                <span class="float-right mt-2 font-weight-bold">N/A</span>
                                <i class="icon icon-phone text-purple"></i>DHC Contact 1: 
                            </li>
                            <li class="list-group-item">
                                <i class="icon icon-phone text-red"></i>DHC Contact 2: 
                                <span class="float-right mt-2 font-weight-bold">N/A</span>

                            </li>
                            <li class="list-group-item">
                                <i class="icon icon-home text-green"></i>DHC Status: Member
                                <span class="float-right mt-2 font-weight-bold"> 
                                  @if($convert->fclass_status == 1)
                                  In Found. Class
                                  @else
                                  Convert
                                  @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                  </div>
                  <!-- <div style="border-left: 3px solid #42a5f5; height: absolute;"></div> -->
                  <div class="col-lg-9 col-md-10" align="center" style="align-content: center;"> 
                    <div class="row">
                       <div class="w">
                          <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                              <li>
                                  <a class="nav-link active" id="v-pills-home1-tab" data-toggle="pill" href="#v-pills-home1" role="tab" aria-controls="v-pills-home1" aria-selected="false"><i class="icon icon-home2"></i>Home</a>
                              </li>
                              <li>
                                  <a class="nav-link" id="v-pills-class-history-tab" data-toggle="pill" href="#v-pills-class-history" role="tab" aria-controls="v-pills-class-history" aria-selected="false"><i class="icon icon-user-o"></i>Class History</a>
                              </li>
                              @role("administrator")
                              <!-- <li><a class="nav-link" id="v-pills-home-church-tab" data-toggle="pill" href="#v-pills-home-church" role="tab" aria-controls="v-pills-home-church" aria-selected="false"><i class="icon icon-home"></i>Home Church History</a></li> -->
                              @endrole
                              <!-- <li><a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-gift"></i>Welfare History</a></li> -->

                              <li>
                                  <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i class="icon icon-agenda"></i>Timeline</a>
                              </li>
                              <li>
                                  <a class="nav-link" id="v-pills-update-location-tab" data-toggle="pill" href="#v-pills-update-location" role="tab" aria-controls="v-pills-update-location" aria-selected="false"><i class="icon icon-cog"></i>Edit Info</a>
                              </li>
                          </ul>
                      </div>
                      <br><br><br><hr>
                      <div class="container-fluid animatedParent animateOnce my-6">
                        <div class="animated fadeInUpShort">
                           <div class="tab-content" id="v-pills-tabContent">
                               <div class="tab-pane show active" id="v-pills-home1" role="tabpanel" aria-labelledby="v-pills-home1-tab">
                                  <div class="row"> 
                                      <div class="p-t-b-12 container-fluid collapse col-md-12" id="newconvert">

                                      </div>
                                      <div class="p-t-b-12 container-fluid collapse col-md-12" id="addmember">

                                      </div>
                                       
                                       <div class="col-md-12">
                                          <div class="row">
                                              <div class="col-md-6">
                                                   <div class="card border-info">
                                                       <div class="card-body">
                                                        <div class="text-center">
                                                            <i class="icon-certificate2 s-48"></i>
                                                            <h3 class="my-3">Foundation Class Status</h3>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Date Started</p>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Tent. Finishing</p>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Actual Finishing</p>
                                                            </div>
                                                            <div>
                                                                <p><i class="icon-angle-double-down text-red mr-2"></i>
                                                                  @foreach($convert->getFClassAttendance as $fclassAtt)
                                                                  {{ date('jS F, Y', strtotime($fclassAtt->class_1_dated)) }}
                                                                </p>
                                                                <p><i class="icon-angle-double-up text-green mr-2"></i>
                                                                  {{ \Carbon\Carbon::createFromFormat('Y-m-d',$fclassAtt->class_1_dated)->addWeeks(6)->format('jS F, Y') }}

                                                                </p>
                                                                <p><i class="icon-angle-double-up text-green mr-2"></i>
                                                                  @if($fclassAtt->class_6_dated == null)

                                                                  Unknown Finishing Date
                                                                  @else
                                                                  {{ date('jS F, Y', strtotime($fclassAtt->class_6_dated)) }}
                                                                  @endif
                                                                </p>
                                                                  @endforeach
                                                            </div>
                                                        </div>
                                                       </div>
                                                   </div>
                                               </div>

                                               <div class="col-md-6">
                                                   <div class="card border-success">
                                                       <div class="card-body">
                                                         <div class="text-center">
                                                            <i class="icon-certificate2 s-48"></i>
                                                            <h3 class="my-3">DLTC Status</h3>
                                                        </div>
                                                        @if($convert->dltc_status == 1)
                                                       <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Date Started</p>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Tent. Finishing</p>
                                                                <p><i class="icon-circle-o text-green mr-2"></i>Actual Finishing</p>
                                                            </div>
                                                            <div>
                                                                <p><i class="icon-angle-double-down text-red mr-2"></i>14th September., 2018</p>
                                                                <p><i class="icon-angle-double-up text-green mr-2"></i>14th September., 2018</p>
                                                                <p><i class="icon-angle-double-up text-green mr-2"></i>14th September., 2018</p>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="jumbotron" style="height: 60px;">
                                                          <h4 class="text-uppercase text-center"> This convert has not been enrolled in DLTC class yet. thank you.</h4>
                                                        </div>
                                                        @endif
                                                       </div>
                                                   </div>
                                               </div>
                                          </div>
                                          <br>
                                           @if($convert->fclass_status == 1)
                                  
                                          <div class="row">
                                            <div class="col-md-12">
                                                   <div class="card border-warning">
                                                       <div class="card-body">
                                                         
                                                         <div class="junbotron">
                                                           <h2>This convert has been enrolled in the foundation class already.</h2>
                                                         </div>

                                                       </div>
                                                   </div>
                                               </div>
                                          </div>
                                            @else
                                            <div class="row">
                                            <div class="col-md-12">
                                                   <div class="card border-warning">
                                                       <div class="card-body">
                                                         
                                                         <div class="junbotron">
                                                           <h2>This convert has not been enrolled in the foundation class or in any home church/cell yet.</h2>
                                                         </div>

                                                       </div>
                                                   </div>
                                               </div>
                                          </div>
                                            @endif
                                      </div>
                                   </div>
                               </div>

                              <div class="tab-pane fade" id="v-pills-class-history" role="tabpanel" aria-labelledby="v-pills-class-history-tab">
                                   <div class="row">
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                          <thead>
                                            <tr>
                                                <th>S/No</th>
                                                <th>Class 1</th>
                                                <th>Class 2</th>
                                                <th>Class 3</th>
                                                <th>Class 4</th>
                                                <th>Class 5</th>
                                                <th>Class 6</th>
                                                
                                                </tr>
                                            </thead>
                                             <tbody>
                                                <tr class="odd gradeX">
                                                    @foreach($convert->getFClassAttendance as  $count => $fclassAtt)
                                                        <td>{{ ++$count }}</td>  
                                                        <td>{{ $fclassAtt->class_1_status }}</td>
                                                        <td>{{ $fclassAtt->class_2_status }}</td>
                                                        <td>{{ $fclassAtt->class_3_status }}</td>
                                                        <td>{{ $fclassAtt->class_4_status }}</td>
                                                        <td>{{ $fclassAtt->class_5_status }}</td>
                                                        <td>{{ $fclassAtt->class_6_status }}</td>
                                                    </tr>
                                                  @endforeach
                                            </tbody>
                                      </table>   

                                   </div>
                               </div>
                               <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">
                                   <div class="row">
                                      
                                   </div>
                               </div>
                               <div class="tab-pane fade" id="v-pills-update-location" role="tabpanel" aria-labelledby="v-pills-update-location-tab">
                                <div class="card my-3 col-md-12">
                                    <div class="card-body">
                                        <div class="card my-3 col-md-12">
                                          <div class="card-body">
                                              <h4 class="text-center text-uppercase"> Convert Information Update form</h4> <hr><br>
                                              <form class="form-material" action="{{ route('converts.updateinfo') }}" method="POST">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" class="form-control" name="convertId" required value="{{$convert->id}}" />

                                                  <div class="row clearfix">
                                                      <div class="col-sm-3">
                                                          <div class="form-group form-float form-group-sm">
                                                              <div class="form-line">
                                                                  <input type="text" class="form-control" name="fullname" required value="{{$convert->fullnames}}" />
                                                                  <label class="form-label"> Full Names</label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <div class="form-group form-float form-group-sm">
                                                              <div class="form-line">
                                                                  <input type="email" class="form-control" name="email" value="{{$convert->email}}" />
                                                                  <label class="form-label">eMail Address</label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <div class="form-group form-float form-group-sm">
                                                              <div class="form-line">
                                                                  <input type="text" class="form-control" name="phone1" required value="{{$convert->phone1 }}" />
                                                                  <label class="form-label">Phone No 1</label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <div class="form-group form-float form-group-sm">
                                                              <div class="form-line">
                                                                  <input type="text" class="form-control" name="phone2" value="{{$convert->phone2}}" />
                                                                  <label class="form-label">Phone No 2</label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <select class="custom-select select2" required name="gender" id="gender">
                                                              <option value="">Gender</option>
                                                              <option value="1">Male</option>
                                                              <option value="2">Female</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <select class="custom-select select2" required name="mstatus" id="mstatus">
                                                              <option value="">Marital Status</option>
                                                              @foreach($mstatus as $mst)
                                                              <option value="{{$mst->id}}">{{$mst->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>


                                                      <div class="col-sm-3">
                                                          <select class="custom-select select2" required name="svc" id="svc">
                                                              <option value="">Service</option>
                                                              @foreach($services as $svc)
                                                              <option value="{{$svc->id}}">{{$svc->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                      <div class="col-sm-3">
                                                          <select class="custom-select select2" required name="converttype" id="converttype">
                                                              <option value="">Convert Type</option>
                                                              @foreach($peoplecats as $cat)
                                                              <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                      <br><br><br>
                                                      <div class="col-sm-12">
                                                          <div class="form-group form-float form-group-sm">
                                                              <div class="form-line">
                                                                  <textarea class="form-control" rows="3" name="resaddress" required>{{$convert->res_address}}</textarea>
                                                                  <label class="form-label">Residential Addres <small style="color: red;">Give a detailed description as possible</small></label>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  <br>
                                                  </div>

                                                  <div class="col-sm-12" align="center">
                                                      <button type="submit" class="btn btn-primary btn-sm mt-2"> Update Convert</button>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                      <br>
                                    </div>
                                </div>
                            <br>
                               </div>
                           </div>
                       </div>
                    </div>
                    </div>
                  </div>
                </div>
            </div>
            <hr>
         
        </div>
    </header>
    
 <!--   -->
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