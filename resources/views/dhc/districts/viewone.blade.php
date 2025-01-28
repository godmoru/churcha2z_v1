@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-2">
                    <div class="pb-3">
                        <div>
                            <h3 class="p-t-10 text-center text-bold"><i class="icon-home2"></i> <strong>{{$district->dis_name}}</strong></h3>
                              <!-- <br> -->
                              <a data-toggle="modal" data-target="#NewZone" class="btn btn-warning btn-xs btn-block"><i class="icon-clipboard-edit"></i> Add New Zone</a>
                              <a data-toggle="modal" data-target="#assignC" class="btn btn-primary btn-xs btn-block"><i class="icon-assignment_ind"></i> Assign Class Counselor</a>
                              <a data-toggle="collapse" data-target="#deleteclass" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs btn-block"><i class="icon-trash"></i> Disable/Delete Class Batch</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                      <div class="p-t-b-12 container-fluid collapse col-md-12" id="deleteclass">
                        <!-- include('classes.fclass.delete') -->
                      </div>
                       <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="p-3 blue1 text-white">
                                <h5 class="font-weight-normal s-14">Total Members</h5>
                                <span class="s-48 font-weight-lighter text-primary bolder"> {{ number_format(count($district->getFirstTimers) + count($district->getNewConverts), 0) }} </span>
                                <div>  Growth %
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_downward"></i> 0%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                            <div class="p-3 blue lighten-3 text-white">
                                <h5 class="font-weight-normal text-white s-14">New In Converts </h5>
                                <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($district->getNewConverts), 0) }}</span>
                                <div> Global %
                                    <span class="text-white">
                                        <i class="icon icon-arrow_downward"></i>0 %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 red lighten-4 text-white">
                                <h5 class="font-weight-normal s-14">First In Timers</h5>
                                <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($district->getFirstTimers), 0) }}</span>
                                <div> Global % 
                                    <span class="text-white">
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
                      <a class="nav-link" id="v-pills-zones-tab" data-toggle="pill" href="#v-pills-zones" role="tab" aria-controls="v-pills-zones" aria-selected="false"><i class="icon icon-home2"></i>Zones</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-areas-tab" data-toggle="pill" href="#v-pills-areas" role="tab" aria-controls="v-pills-areas" aria-selected="false"><i class="icon icon-home2"></i>Areas</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-home-church-tab" data-toggle="pill" href="#v-pills-home-church" role="tab" aria-controls="v-pills-home-church" aria-selected="false"><i class="icon icon-home2"></i>Home Cells/Churches</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-members-tab" data-toggle="pill" href="#v-pills-members" role="tab" aria-controls="v-pills-members" aria-selected="false"><i class="icon icon-people_outline"></i>Established Members</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-list"></i>Attendance Chart</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-offerings" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-money"></i>Offerings Chart</a>
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
                               <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Full Names</strong> <span class="float-right s-12">{{ isset($district->counselor) ? $district->counselor->surname.' '.$district->counselor->othernames : " Not set"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{ isset($district->counselor) ? $district->counselor->phone1 : " Not set"}}</span></li>
                               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{ isset($district->counselor) ? $district->counselor->email : " Not set"}}</span></li>
                               <!-- <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{$district->loc_add}}</span></li> -->
                           </ul>
                       </div>
                       <br>
                         <div class="card">
                          <div class="card-header white">
                              <strong> Global Rating </strong>
                                  <span class=" float-right"><a href="#" style="font-size: 11px; font-style: italic; text-underline-position: all;">View Ratings</a></span>
                          </div>
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
                                      <h4 class="text-center text-uppercase">District Information Center</h4> <hr>
                                   </div>
                                   <div class="card-body">
                                    
                                   </div>
                               </div>
                           </div>
                      </div>
                  </div>
               </div>
           </div>
           <div class="tab-pane fade" id="v-pills-members" role="tabpanel" aria-labelledby="v-pills-members-tab">
            <div class="col-md-12">  
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header white">
                        <h4 class="text-center text-uppercase">Established Mebe from District</h4> <hr>
                      </div>
                      <div class="card-body">
                        <table id="example2" width="100%" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                          <tr>
                            <th rowspan="2" width="1%">S/No</th>
                            <th rowspan="2" width="10%" style="text-transform: uppercase;">Service Date</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase;">Zone</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase; text-align: center;"> Male</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase; text-align: center;"> Female</th>
                            <th rowspan="2" width="15%" style="text-transform: uppercase; text-align: center;"> Total</th>
                            <th width="35%" colspan="3" style="text-transform: uppercase; text-align: center;"> Offerings (N)</th>
                            
                            <th rowspan="2"  width="7%" style="text-transform: uppercase; text-align: center;"> Status</th>
                            </tr>

                            <tr>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Offering Amount</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Confirmed Offering</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Dispute Offering</th>
                            </tr>

                        </thead>
                         <tbody>
                            <tr class="odd gradeX">
                            @foreach($district->getZones as $count => $zone)
                            <td>{{ ++$count }}</td>  
                            <td> <b>{{ date('jS M, Y') }}</b></td>
                            <td><a href="{{route('dhc.zone.one', \Crypt::encrypt($zone->id)) }}"> <b>{{ $zone->zone_name }}</b></a></td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">
                              <a data-toggle="modal" data-target="#ConfirmOffering"class="btn btn-xs btn-success">Confirm Offering</a>
                              <a data-toggle="modal" data-target="#disputeOffering"class="btn btn-xs btn-warning">Disput Offering</a>
                              <!-- <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span> -->
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
           </div>

           <div class="tab-pane fade" id="v-pills-zones" role="tabpanel" aria-labelledby="v-pills-zones-tab">
            <div class="col-md-12">  
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header white">
                      <h4 class="text-center text-uppercase">District Zones</h4> <hr>
                    </div>
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                          <tr>
                            <th width="1%">S/No</th>
                            <th width="12%" style="text-transform: uppercase;">Zonal Name</th>
                            <th width="12%" style="text-transform: uppercase;"> Contact Name</th>
                            <th width="11%" style="text-transform: uppercase;"> Contact Phone</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;">No of Areas</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> Home Cells</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> New Converts</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> First Timers</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> Total population</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Status</th>
                            </tr>
                        </thead>
                         <tbody>
                            <tr class="odd gradeX">
                            @foreach($district->getZones as $count => $zone)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('dhc.zone.one', \Crypt::encrypt($zone->id)) }}"> <b>{{ strtoupper($zone->zone_name) }}</b></a></td>
                            <td align="">{{ $zone->name}}</td>
                            <td align="">{{ $zone->name}}</td>
                            <td align="center">{{ number_format(count($zone->getAreas),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">
                              @if($zone->status == 1)
                              <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                              @else
                              <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Closed Down</span></span>
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
           </div>

           <div class="tab-pane fade" id="v-pills-areas" role="tabpanel" aria-labelledby="v-pills-area-tab">
            <div class="col-md-12">  
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header white">
                        <h4 class="text-center text-uppercase">District Areas</h4> <hr>
                      </div>
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                          <tr>
                            <th width="1%">S/No</th>
                            <th width="12%" style="text-transform: uppercase;">Area Name</th>
                            <th width="12%" style="text-transform: uppercase;"> Contact Name</th>
                            <th width="11%" style="text-transform: uppercase;"> Contact Phone</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> Home Cells</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> New Converts</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> First Timers</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> Total population</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Status</th>
                            </tr>
                        </thead>
                         <tbody>
                            <tr class="odd gradeX">
                            @foreach($district->getZones as $count => $zones)
                            @foreach($zone->getAreas as $count => $area)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('dhc.districts.one', \Crypt::encrypt($zone->id)) }}"> <b>{{ strtoupper($area->name) }}</b></a></td>
                            <td align="">{{ $area->name}}</td>
                            <td align="">{{ $area->name}}</td>
                            <td align="center">{{ number_format(count($area->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($area->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($area->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($area->getHomeCells),0) }} </td>
                            <td align="center">
                              @if($area->status == 1)
                              <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                              @else
                              <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Closed Down</span></span>
                              @endif
                            </td>
                            @endforeach
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

           <div class="tab-pane fade" id="v-pills-home-church" role="tabpanel" aria-labelledby="v-pills-home-church-tab">
            <div class="col-md-12">  
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header white">
                        <h4 class="text-center text-uppercase">District Home Churches/Cell Units</h4> <hr>
                      </div>
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                          <tr>
                            <th width="1%">S/No</th>
                            <th width="12%" style="text-transform: uppercase;">Home Church Name</th>
                            <th width="12%" style="text-transform: uppercase;">Home Church Tag</th>
                            <th width="12%" style="text-transform: uppercase;"> Contact Name</th>
                            <th width="11%" style="text-transform: uppercase;"> Contact Phone</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> New Converts</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> First Timers</th>
                            <th width="5%" style="text-transform: uppercase; text-align: center;"> Total population</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Status</th>
                            </tr>
                        </thead>
                         <tbody>
                            <tr class="odd gradeX">
                            @foreach($district->getHomeCells as $count => $dhc)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('dhc.districts.one', \Crypt::encrypt($zone->id)) }}"> <b>{{ strtoupper($dhc->homecell_name) }}</b></a></td>
                            <td align="">{{ $dhc->seek_code}}</td>
                            <td></td>
                            <td></td>
                            <td align="center">{{ number_format(30,0) }} </td>
                            <td align="center">{{ number_format(12,0) }} </td>
                            <td align="center">{{ number_format(42,0) }} </td>
                            <td align="center">
                              @if($dhc->status == 1)
                              <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                              @else
                              <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Closed Down</span></span>
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
           </div>

           <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel" aria-labelledby="v-pills-attendance-tab">
            <div class="col-md-12">  
              <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header white">
                        <h4 class="text-center text-uppercase">Attenance & Offerings</h4> <hr>
                      </div>
                      <div class="card-body">
                        <table id="example2" width="100%" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                          <tr>
                            <th rowspan="2" width="1%">S/No</th>
                            <th rowspan="2" width="10%" style="text-transform: uppercase;">Service Date</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase;">Zone</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase; text-align: center;"> Male</th>
                            <th rowspan="2" width="20%" style="text-transform: uppercase; text-align: center;"> Female</th>
                            <th rowspan="2" width="15%" style="text-transform: uppercase; text-align: center;"> Total</th>
                            <th width="35%" colspan="3" style="text-transform: uppercase; text-align: center;"> Offerings (N)</th>
                            
                            <th rowspan="2"  width="7%" style="text-transform: uppercase; text-align: center;"> Status</th>
                            </tr>

                            <tr>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Offering Amount</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Confirmed Offering</th>
                            <th width="15%" style="text-transform: uppercase; text-align: center;"> Dispute Offering</th>
                            </tr>

                        </thead>
                         <tbody>
                            <tr class="odd gradeX">
                            @foreach($district->getZones as $count => $zonw)
                            <td>{{ ++$count }}</td>  
                            <td> <b>{{ date('jS M, Y') }}</b></td>
                            <td><a href="{{route('dhc.districts.one', \Crypt::encrypt($zone->id)) }}"> <b>{{ $zone->zone_name }}</b></a></td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">0</td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">{{ number_format(count($zone->getHomeCells),0) }} </td>
                            <td align="center">
                              <a data-toggle="modal" data-target="#ConfirmOffering"class="btn btn-xs btn-success">Confirm Offering</a>
                              <a data-toggle="modal" data-target="#disputeOffering"class="btn btn-xs btn-warning">Disput Offering</a>
                              <!-- <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span> -->
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
           </div>


       </div>
   </div>
   @include('dhc.districts.modals.newzone')
   @include('dhc.districts.modals.confirmoffering')
   @include('dhc.districts.modals.disputeoffering')
</div>
@endsection
@section('scripts')
<!-- Page Script  -->
@endsection