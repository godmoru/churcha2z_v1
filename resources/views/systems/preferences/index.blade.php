@extends('layouts.master')

@section('content')
    
  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="row"> 
           <div class="col-md-3">
               <div class="card ">
                <div class="image mr-3  float-center">
                  <br>
                  <center>
                    <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u3.png')}}" alt="User Image">
                  </center>
                </div>
                <br>
                   <ul class="list-group list-group-flush">
                      
                       <!-- <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{'fdfdfd'}}</span></li> -->
                       <li class="list-group-item"> <a data-toggle="modal" data-target="#sysAdminSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><i class="icon icon-user text-primary"></i><strong class="s-12">System Admin</strong> <span class="float-right s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : " Umoru Godfrey"}} &ensp;</span></li>
                       <li class="list-group-item"> <a data-toggle="modal" data-target="#sysAdminSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{ isset($batch->counselor) ? $batch->counselor->phone1 : " 08165420728"}} &ensp;</span></li>
                       <li class="list-group-item"> <a data-toggle="modal" data-target="#sysAdminSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{ isset($batch->counselor) ? $batch->counselor->email : " support@a2z.church"}} &ensp;</span></li>

                   </ul>
               </div>
               <br>
           </div>
           <div class="col-md-5">  
            <div class="card">
              <div class="card-header white">
                <h6 class="text-uppercase"> SYSTEM e-Mail Configuration</h6>
              </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#eMailSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">Mail Driver:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "smtp"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#eMailSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">Mail Host:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "mail.a2z.church"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#eMailSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">Mail Port:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "587"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#eMailSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">Username:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "support@a2z.church"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#eMailSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">Password:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "*********"}}</span></li>
                </ul>
            </div>
          </div>
          <div class="col-md-4"> 
            <div class="card">
              <div class="card-header white">
                <h6 class="text-uppercase">NOTIFICATION SETTINGS</h6>
              </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"> <a data-toggle="modal" data-target="#notificationSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">SMS Notification:</strong> &emsp;&emsp;&emsp;&emsp;&emsp; &ensp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "Enabled"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#notificationSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">e-Mail Notification:</strong> &emsp;&emsp;&emsp;&emsp;&emsp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : " Enabled"}}</span></li>
                    <li class="list-group-item"> <a data-toggle="modal" data-target="#SMSSettings"><i class="icon icon-pencil text-primary float-right"> </i></a><strong class="s-12">SMS Provider API:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : "https://netbulksms.com/...."}}</span></li>

                    <li class="list-group-item"> <a data-toggle="modal" data-target="#SMSSettings"><i class="icon icon-pencil text-primary float-right"></i></a><strong class="s-12">SMS Username:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : " naanpam"}}</span></li>

                    <li class="list-group-item"> <a data-toggle="modal" data-target="#SMSSettings"><i class="icon icon-pencil text-primary float-right"></i></a><strong class="s-12">SMS Password:</strong> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; <span class="float-center s-12">{{ isset($batch->counselor) ? $batch->counselor->surname.' '.$batch->counselor->othernames : " *********"}}</span></li>
                </ul>
            </div>
          </div>

       </div>
       <hr>
       <div class="row">
         <div class="col-md-6">
          <div class="card border-info">
              <div class="card-header bg-info">
                <h5 class="card-title text-uppercase" style="color: white;">Support SMS Details</h5>
              </div>
              <div class="card-body">
                  <h5 class="card-title text-uppercase">New Converts</h5>
                  <p class="card-text">This decision to surrender your life to Christ marks a new begining in your life. Pls locate a Dunamis Home Church near U & enrol in foundation Class. Bless U.</p>
                  <p class="card-text">
                      <small class="text-muted">Last updated 3 mins ago</small>
                      <button data-toggle="modal" data-target="#editConvertSMS" class="btn btn-primary btn-xs float-right">Update</button>
                  </p>

                  <hr>
                  <h5 class="card-title text-uppercase">First Timers</h5>
                  <p class="card-text">Thank you for your presence in Dunamis Church today. We are sure God ministered to you. We hope to see more of you. God bless you richly in Jesus Name.</p>
                  <p class="card-text">
                      <small class="text-muted">Last updated 3 mins ago</small>
                      <button data-toggle="modal" data-target="#editFTSMS" class="btn btn-primary btn-xs float-right">Update</button>
                  </p>
              </div>
            </div>
         </div>
         <div class="col-md-6">
           <div class="card border-success">
            <div class="card-header bg-success">
              <h5 class="card-title text-uppercase" style="color: white;">Online Users</h5>
            </div>
              <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="text-align: left; font-weight: bold ; text-transform: uppercase;" width="10%">User</th>
                        <th style="text-align: left; font-weight: bold ; text-transform: uppercase;" width="8%">Current Page</th>
                        <th style="text-align: left; font-weight: bold ; text-transform: uppercase;" width="8%"> Action Performed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img class="user_image no-b no-p" src="{{asset('img/dummy/u3.png')}}" alt="User Image" style="height: 30px;"> &emsp; <a href="#">Moses Oloche</a></td>
                        <td>Integrated Dashboard</td>
                        <td> Dashboard</td>
                      </tr>
                      <tr>
                        <td><img class="user_image no-b no-p" src="{{asset('img/dummy/u2.png')}}" alt="User Image" style="height: 30px;"> &emsp; 
                          <a href="#">Markus Obande</a>
                        </td>
                        <td>Converts Registration </td>
                        <td> Convert Registration page</td>
                      </tr>
                      <tr>
                        <td><img class="user_image no-b no-p" src="{{asset('img/dummy/u9.png')}}" alt="User Image" style="height: 30px;"> &emsp; <a href="#">Ngozi Agbani</a></td>
                        <td>DIGC Kaduna Attendance</td>
                        <td> Attendance Index</td>
                      </tr>
                      <tr>
                        <td><img class="user_image no-b no-p" src="{{asset('img/dummy/u1.png')}}" alt="User Image" style="height: 30px;"> &emsp; <a href="#">Adaji Oloche</a></td>
                        <td>DIGC Makurdi Weekly Reports</td>
                        <td> Weekly Report - Monthly Summary</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
         </div>
       </div>
   </div>
   @include('systems.preferences.modals.options')
</div>
@endsection
@section('scripts')
<!-- Page Script  -->
<script type="text/javascript">

</script>
@endsection