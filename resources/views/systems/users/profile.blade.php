@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow">
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
                                <h6 class="p-t-10">{{ $user->first_name.' '.$user->last_name}}</h6>
                               <a mailto="{{$user->email}}">{{$user->email}}, {{$user->phone_no}}</a><br>
                            </div>
                            <hr>
                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                  <!-- <a  data-toggle="collapse" data-target="#takeimage" aria-expanded="false" aria-controls="collapseExample" class="btn-fab btn-fab-md shadow btn-primary"><i class="icon-camera"></i></a> -->
                                  <a data-toggle="modal" data-target="#addRole" class="btn btn-success btn-xs btn-block"><i class="icon-user-plus"></i> Add More Role(s)</a>
                                  <a data-toggle="modal" data-target="#revokeRole" class="btn btn-primary btn-xs btn-block"><i class="icon-user-plus"></i> Revoke Role(s)</a>
                                </div>
                                <div class="col-md-6 col-sm-12 col-lg-6">
                                  <a data-toggle="modal" data-target="#editUser" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-xs btn-block"><i class="icon-group_add"></i> Edit Details</a>
                                  <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs btn-block"><i class="icon-group_add"></i> Delete User</a>
                                </div><br>
                                <a data-toggle="modal" data-target="#resendDetails" class="btn btn-warning btn-xs btn-block"><i class="icon-user-plus"></i> Resend Login Details</a>

                              </div>
                        </div>
                    </div>
                    <div class="card">
                    <!-- <div class="card-header white">
                        <strong> DHC WIDGET </strong>
                    </div> -->
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="icon icon-key text-blue"></i> Active Roles:
                                <span class="float-right mt-2 font-weight-bold"> 
                                  <?php $roles = $user->getRoles(); ?>
                                  <ul>
                                  @if(count($roles)>0)
                                    
                                    @foreach($roles as $role)
                                      <li><a href="{{route('role.profile', \Crypt::encrypt(1))}}">{{ UCfirst($role) }}</a></li><br />
                                    @endforeach
                                  </ul>
                                    @else
                                    <h5>No Role(s) found for <strong>{{$user->surname}}</strong></h5>
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
                      <div class="row collapse" id="takeimage">
                          <!-- include('systems.users.takepic') -->
                      </div>
                       <div class="w">
                          <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                              <li>
                                  <a class="nav-link active" id="v-pills-home1-tab" data-toggle="pill" href="#v-pills-home1" role="tab" aria-controls="v-pills-home1" aria-selected="false"><i class="icon icon-home2"></i>Home</a>
                              </li>
                              <li>
                                  <a class="nav-link" id="v-pills-class-history-tab" data-toggle="pill" href="#v-pills-class-history" role="tab" aria-controls="v-pills-class-history" aria-selected="false"><i class="icon icon-user-o"></i>Audit History</a>
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
                                                 
                                               </div>

                                               <div class="col-md-6">
                                                   
                                               </div>
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-12">
                                                   <div class="card border-warning">
                                                       <div class="card-body">
                                                         
                                                         <div class="junbotron">
                                                           <h2>This user account has not been activated yet</h2>
                                                         </div>

                                                       </div>
                                                   </div>
                                               </div>
                                          </div>
                                      </div>
                                   </div>
                               </div>

                              <div class="tab-pane fade" id="v-pills-class-history" role="tabpanel" aria-labelledby="v-pills-class-history-tab">
                                   <div class="row">
                                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                          <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th width="10%">Dated</th>
                                                <th>Action Group</th>
                                                <th>Activity</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                          <?php $no = 1;?>
                                          @foreach($user->getLogs as $no => $logs)
                                            <tr>
                                              <td>{{++$no}}</td>
                                              <td><strong>{{date_format($logs->created_at, "jS F, Y" ." --@-- ". "h:m:s a")}}</strong></td>
                                              <td>{{$logs->action_group}}</td>
                                              <td>{{$logs->action}}</td>
                                              <td width="40%">{{$logs->comment}}</td>
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
        @include('systems.users.edit')
        @include('systems.users.editaddrole')
        @include('systems.users.editremoverole')
        @include('systems.users.resendDetails')
    </header>


 <!--   -->
@endsection
@section('scripts')
<!-- Page Script  -->

@endsection