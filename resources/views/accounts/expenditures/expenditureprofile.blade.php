@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
       <div class="col-md-3">
           <div class="card ">
               <ul class="list-group list-group-flush">
                   <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{$location->phone1}}</span></li>
                   <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{$location->loc_email}}</span></li>
                   <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{$location->loc_add}}</span></li>
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
@include('accounts.expenditures.newtype')

@endsection
@section('scripts')

@endsection