@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <!-- <div class="card-header white"> -->
                        <!-- <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> Converts Registration Portal </strong>  -->
                    <!-- </div> -->
                    <div class="card-body">
                         <h4 class="text-center text-uppercase">Add weekly report</h4> <hr><br>
                        <form class="form-material" action="{{ route('locations.weekly-reports-add') }}" method="POST">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-3">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="svctype" id="svctype">
                                                <option value="">Service Type</option>
                                                @foreach($serviceTypes as $svcT)
                                                <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="svc" id="svc">
                                                <option value="">Service</option>
                                                <option value="999999">All Services</option>
                                                @foreach($services as $svc)
                                                <option value="{{$svc->id}}">{{$svc->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" name="serviceDate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                            <label class="form-label">Service Date</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="week" id="week">
                                                <option value="">Week Under Review</option>
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                                <option value="5">Week 5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3" align="">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="preacher" id="preacher">
                                                <option value="">Preacher</option>
                                                @foreach($pastors as $pst)
                                                <option value="{{$pst->id}}">{{$pst->surname.' '.$pst->othernames}}</option>
                                                @endforeach
                                                <option value="909090909">Others - Specify</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md" id="preacher_other">
                                      <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                          <input type="text" name="preacher_other_name" class="form-control" placeholder="Preacher Name" align="ccenter" />
                                          <input type="text" name="preacher_other_ministry" class="form-control" placeholder="Preacher Ministry" align="ccenter" />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4" align="">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                          <input type="text" name="messagetitle" required class="form-control" placeholder="Message Title here" align="ccenter" />
                                        </div>
                                    </div>
                                </div>
                        <br>
                            </div>
                        </div>
                        <hr>
                        
                        
                        <div class="col-md-5 form-group">
                        <h5 class="text-uppercase text-center">Attendance</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Male</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Female</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Children</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add male" name="male" id="male" value="0" align="center" onkeyup="sumup();" onchange="sumup()" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add female" name="female" id="female" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add children" name="children" id="children" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                        </td> 
                                        <td align="center">
                                          <b style="text-align: center; font-size: "><span id="grandT"></span></b>
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-4 form-group">
                        <h5 class="text-uppercase text-center">Offerings/Tithes</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Offerings Total</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Title Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm offerings" name="offerings" id="offerings" value="0" align="center" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm tithes" name="tithes" id="tithes" value="0" align="center" style="text-align: center; " />
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-3" align="center">
                          <h5 class="text-uppercase text-center">New Converts/First Timers</h5>
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">New Converts</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">First Timers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm newconverts" name="newconverts" id="newconverts" value="0" align="center" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm firsttimers" name="firsttimers" id="firsttimers" value="0" align="center" style="text-align: center; " />
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12" align="center">
                        <!-- <hr> -->
                          <button type="submit" class="btn btn-success">Submit Report</button>
                        </div>
                    </div>
                    </form>
                </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="card ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <div class="card-body">
                        <h4 class="text-center text-uppercase"> 
                            <span class="float-right">  
                                <a href="{{ route('locations.week-reports-print') }}" class="btn btn-success btn-xs"> <i class="icon icon-print"></i> This Report</a>
                                <a href="{{ route('locations.monthly-reports') }}" class="btn btn-primary btn-xs"> <i class="icon icon-print"></i> Monthly Report</a>
                                <a href="{{ route('locations.yearly-reports') }}" class="btn btn-warning btn-xs"> <i class="icon icon-print"></i> Year Report</a>
                            </span> 
                            Summmary report week {{ isset(\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->first()->week) ? \Carbon\Carbon::now()->weekNumberInMonth : \Carbon\Carbon::now()->weekNumberInMonth.', '. date('F, Y')}}</h4>  <hr><br>
                    <table id="example2" class="table table-bordered table-hover table-responsive" border="1" width="100%" data-options='{ "paging": false; "searching":false}'>
                    <thead>

                        <tr>
                            <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Days/Weeks</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WEEK {{ isset(\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->first()->week) ? \Carbon\Carbon::now()->weekNumberInMonth : \Carbon\Carbon::now()->weekNumberInMonth}} </td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">New Converts</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">First Timers</td>
                        </tr>
                        <tr>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WEEK TOTAL</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" style="text-transform: uppercase; font-weight: bold">Sunday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 1 -->
                            
                            <td align="center">
                                {{
                                    number_format(
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts'),0) 
                                    }}
                            </td>
                            <td align="center">
                                {{
                                    number_format(
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers'),0) 

                                    }}
                            </td>

                            <!-- <td>    
                                
                                
                            </td> -->
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="4" align="center" style="font-size:  18px; font-weight: bolder;">{{
                                    number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'), 0)
                                }}</td>
                             <td colspan="3" rowspan="2" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{
                                number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') + \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'), 0)
                            }}
                            </td>

                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="4" align="center" style="font-size: 18px;font-weight: bolder;">{{
                                    number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'), 0)
                                }}
                            </td>
                        </tr>
                        <!-- End Sunday Services -->
                        
                        <tr>
                            <td rowspan="3" style="text-transform: uppercase; font-weight: bold">Wednesday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth )->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            
                            <td align="center" style="color: white; background-color: #a5d6a7;">
                                {{
                                    number_format(
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts'),0) 
                                    }}
                            </td>
                            <td align="center" style="color: white; background-color: #a5d6a7;">
                                {{
                                    number_format(
                                    \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers'),0) 

                                    }}
                            </td>

                            <!-- <td>    
                                
                                
                            </td> -->
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="4" align="center" style="font-size:  18px; font-weight: bolder;">{{
                                    number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'), 0)
                                }}</td>
                            <td colspan="3" rowspan="2" align="center" style="color: white;  background-color: #c8e6c9; font-size:  24px; font-weight: bolder;">
                                &#8358; {{
                                    number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') + \App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'),0)
                                }}
                            </td>

                        </tr>
                        
                        <tr>
                        <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                        <td colspan="4" align="center" style="font-size: 18px;font-weight: bolder;">{{
                                number_format(\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekNumberInMonth)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'), 0)
                            }}
                        </td>
                        
                    </tr>
                        <!-- End Wednesday Services -->

                    </tbody>
                </table>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- Page Script  -->


<script type="text/javascript">
   function sumup() {
    $("#humanCount").on('input', '.add', function () {
     var GTotal = 0;
     $("#humanCount .add ").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }
</script>

@endsection