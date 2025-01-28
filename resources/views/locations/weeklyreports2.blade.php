@extends('layouts.master')

@section('content')
<div class="row my-3 ">
	<div class="col-md-12 col-xl-12">
                <div class="card no-b">
                    <div class="card-header blue lighten-2 text-white">
                        <h4><!-- Weekly Reports --></h4>
                        <div class="row justify-content-end">
                           <div class="col">
                            <ul id="myTab4" role="tablist" class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="tab1" data-toggle="tab" href="#v-pills-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Attendance</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tabft" data-toggle="tab" href="#v-pills-tabft" role="tab" aria-controls="tabft" aria-selected="false">First Timers</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tabnc" data-toggle="tab" href="#v-pills-tabnc" role="tab" aria-controls="tabnc" aria-selected="false">New Converts</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#v-pills-tab2" role="tab" aria-controls="tab2" aria-selected="false">Finance/Income</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#v-pills-tab3" role="tab" aria-controls="tab3" aria-selected="true">Converts</a> 
                                </li> -->
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                            	<!-- Locations Attendance Report -->
                                <div class="col-md-12">
					                <div class="card no-b">
					                  <div class="card-body">
					                      <div class="row">
					                          <div class="col-md-1">
					                          	<div class="d-flex justify-content-between">
						                            <div class="align-self-center">
						                                <ul class="nav nav-pills nav-icon-pills mb-3" role="tablist">
						                                    <li class="nav-item">
						                                        <a class="nav-link btn-fab active show mr-2" id="w8--tab1" data-toggle="tab" href="#v-pills-weekly" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true"><i class="icon-calendar-o p-0"></i></a>
						                                    </li>
						                                    <li class="nav-item">
						                                        <a class="nav-link btn-fab mr-2" id="w8--tab2" data-toggle="tab" href="#v-pills-monthly" role="tab" aria-controls="tab2" aria-selected="false"><i class="icon-calendar p-0"></i></a>
						                                    </li>
						                                    <li class="nav-item">
						                                        <a class="nav-link btn-fab mr-2" id="w8--tab3" data-toggle="tab" href="#v-pills-quarterly" role="tab" aria-controls="tab3" aria-selected="false"><i class="icon-perm_contact_calendar p-0"></i></a>
						                                    </li>
						                                    <li class="nav-item">
						                                        <a class="nav-link btn-fab mr-2" id="w8--tab3" data-toggle="tab" href="#v-pills-yearly" role="tab" aria-controls="tab3" aria-selected="false"><i class="icon-calendar2 p-0"></i></a>
						                                    </li>

						                                </ul>
						                            </div>
						                        </div>
					                              <!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					                                  <a class="nav-link active" id="v-pills-weekly-tab" data-toggle="pill" href="#v-pills-weekly" role="tab" aria-controls="v-pills-weekly" aria-selected="true">Weekly</a>
					                                  <a class="nav-link" id="v-pills-monthly-tab" data-toggle="pill" href="#v-pills-monthly" role="tab" aria-controls="v-pills-monthly" aria-selected="false">Monthly</a>
					                                  <a class="nav-link" id="v-pills-quarterly-tab" data-toggle="pill" href="#v-pills-quarterly" role="tab" aria-controls="v-pills-quarterly" aria-selected="false">Quarterly</a>
					                                  <a class="nav-link" id="v-pills-yearly-tab" data-toggle="pill" href="#v-pills-yearly" role="tab" aria-controls="v-pills-yearly" aria-selected="false">Yearly</a>
					                              </div> -->
					                          </div>
					                          <div class="col-md-11">
					                              <div class="tab-content" id="v-pills-tabContent">
					                                	<div class="tab-pane fade show active" id="v-pills-weekly" role="tabpanel" aria-labelledby="v-pills-weekly-tab">
					                              		<b class="text-uppercase">This Week Report for all Locations </b>
					                              		<div class="float-right" align="right">
										                	<a href="{{ route('locations.this-week-report') }}" class="btn btn-xs btn-primary" style="color: white;"> <i class="icon-print"></i> Print Report</a>
										                	<!-- <a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-danger"> <i class="icon-print"></i> Print Monthly Report</a> -->
										                	<!-- <a href="{{ route('locations.summarized-yearly-reports-print') }}" class="btn btn-xs btn-warning" style="color: white;"> <i class="icon-print"></i> Print Yearly Report</a> -->
										                </div>

					                                		<table id="summary" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
																<thead>
																	<tr style="border-width: 1px;">
																		<th rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Branch Name</th>

																		<th rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>State</th>
																		<th rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Service Day</th>
																		<th colspan="6" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK {{\Carbon\Carbon::now()->weekOfMonth}}</th>

																	</tr>
																	<tr>
																		<th width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MALE</th>
																		<th width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FEMALE</th>
																		<th width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">CHILDREN</th>
																		<th width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">TOTAL</th>
																		<th width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> avg</th>

																	</tr>
																</thead>
																<tbody>
																	@foreach($locations as $location)
																	<tr style="border-style: all; border-width: 2px;">
																		<td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
																		<td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_state->state}}</td>
																		<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">SUNDAY</td>
																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>
																		<td align="center">
																			{{
																				number_format((\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>
																		<td align="center">
																			{{
																				number_format((\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children'))/1, 0) 
																			}} 
																		</td>
																	</tr>
																	<tr>
																		<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">WEDNESDAY</td>

																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>
																		<td align="center">
																			{{
																				number_format((\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>
																		<td align="center">
																			{{
																				number_format((\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', \Carbon\Carbon::now()->weekOfMonth)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children'))/1, 0) 
																			}} 
																		</td>

																	</tr>
																	@endforeach
																	<!-- <tr>
																		<td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
																		<td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="5">Attendance</td>
																		<td style="font-weight: bold; text-transform: uppercase;" align="center" >
																			<b><span id="totalAttendance"> </span></b>
																		</td>
																		<td></td>
																		<td style="font-weight: bold; text-transform: uppercase; font-size: 17px;" align="center" rowspan="2" colspan="2"><br>X</td>
																	</tr> -->
																

																	<!-- End Sunday Services -->
																</tbody>
															</table>
					                                	</div>
					                                  	<div class="tab-pane fade" id="v-pills-monthly" role="tabpanel" aria-labelledby="v-pills-monthly-tab">
					                                      <b class="text-uppercase">This Month's Report for all Locations </b>
					                              		<div class="float-right" align="right">
										                	<a data-toggle="modal" data-target="#getreportsbydate" class="btn btn-xs btn-success"> <i class="icon-print"></i>Get Report By Date</a>
										                	<a href="{{ route('locations.this-month-report') }}" class="btn btn-xs btn-primary" style="color: white;"> <i class="icon-print"></i> Print Report</a>
										                	<!-- <a href="{{ route('locations.summarized-yearly-reports-print') }}" class="btn btn-xs btn-warning" style="color: white;"> <i class="icon-print"></i> Print Yearly Report</a> -->
										                </div>

					                                		<table id="summary" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
																<thead>
																	<tr style="border-width: 1px;">
																		<td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Branch</td>
																		<td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> State</td>
																		<td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> Day</td>
																		<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px; border-width: 1px;"> WEEK 1</td>
																		<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 2</td>
																		<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 3</td>
																		<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 4</td>
																		<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 5</td>
																	</tr>
																	<tr>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">M</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">F</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">C</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SUB</td>

																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">M</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">F</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">C</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SUB</td>

																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">M</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">F</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">C</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SUB</td>

																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">M</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">F</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">C</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SUB</td>

																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">M</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">F</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">C</td>
																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SUB</td>

																		<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">TOTAL</td>
																		<td width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> avg</td>
																	</tr>
																	
																</thead>
																<tbody>
																	@foreach($locations as $location)
																	<tr style="border-style: all; border-width: 2px;">
																		<td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
																		<td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_state->state}}</td>

																		<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">SUN.</td>
																		
																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<td align="center" style="font-weight: bold;"> <!-- Week 1 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<!-- End Week 1 -->

																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 2 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 2 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 3 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 3 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 4 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 4 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 5 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 5 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>


																		<td align="center" style="font-weight: bold;"> <!-- Month Total--->
																			{{
																				number_format((\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>


																		<td align="center"> <!-- Monthly SUnday Average-->

																			@php
																			$weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
																			@endphp

																			@if(count($weekx) == 5)
																			{{
																				number_format((


																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/5, 2)
																			}}

																			@elseif(count($weekx) == 4)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/4, 2)
																			}}

																			@elseif(count($weekx) == 3)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/3, 2)
																			}}

																			@elseif(count($weekx) == 2)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/2, 2)
																			}}

																			@elseif(count($weekx) == 1)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/1, 0)
																			}}

																			@else
																			0
																			@endif

																		</td>
																	</tr>


																		
																	<tr>
																		<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">WED.</td>

																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<td align="center" style="font-weight: bold;"> <!-- Week 1 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<!-- End Week 1 -->

																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 2 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 2 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 3 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 3 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 4 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 4 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>

																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female')	}}</td>
																		<td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')	}}</td>

																		<!-- End Week 5 -->
																		<td align="center" style="font-weight: bold;"> <!-- Week 5 Total--->
																			{{
																				number_format((\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>


																		<td align="center" style="font-weight: bold;"> <!-- Month Total--->
																			{{
																				number_format((\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
																				\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
																				\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
																			}} 
																		</td>


																		<td align="center"> <!-- Monthly Wednesday's Average-->

																			@php
																			$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
																			@endphp

																			@if(count($weekx) == 5)
																			{{
																				number_format((


																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/5, 2)
																			}}

																			@elseif(count($weekx) == 4)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/4, 2)
																			}}

																			@elseif(count($weekx) == 3)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/3, 2)
																			}}

																			@elseif(count($weekx) == 2)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/2, 2)
																			}}

																			@elseif(count($weekx) == 1)
																			{{
																				number_format((

																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
																				\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/1, 2)
																			}}

																			@else
																			0
																			@endif

																		</td>
																	</tr>
																	@endforeach
																	<!-- <tr>
																		<td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
																		<td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="5">Attendance</td>
																		<td style="font-weight: bold; text-transform: uppercase;" align="center" >
																			<b><span id="totalAttendance"> </span></b>
																		</td>
																		<td></td>
																		<td style="font-weight: bold; text-transform: uppercase; font-size: 17px;" align="center" rowspan="2" colspan="2"><br>X</td>
																	</tr> -->
																

																	<!-- End Sunday Services -->
																</tbody>
															</table>
					                                  	</div>
					                                  	<div class="tab-pane fade" id="v-pills-quarterly" role="tabpanel" aria-labelledby="v-pills-quarterly-tab">
					                                  		<b class="text-uppercase">Locations' Quarterly Report </b>
					                              		<div class="float-right" align="right">
					                              		    <!--locations.jan-to-march-report-->
					                              		    <div class="btn-group btn-block" >
                                                                <button class="btn btn-success btn-xs btn-flat btn-block ">Quarterly Print Options</button>
                                                                <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="{{ route('locations.jan-to-march-report') }}" class="btn"> <i class="icon-print"></i> Print 1 <sup>st</sup> Quarter's Report</a></li>
                                                                    <li><a href="{{ route('locations.april-to-june-report') }}" class="btn"> <i class="icon-print"></i> Print 2 <sup>nd</sup> Quarter's Report</a></li>
                                                                    <li><a href="{{ route('locations.july-to-sept-report') }}" class="btn"> <i class="icon-print"></i> Print 3 <sup>rd</sup> Quarter's Report</a></li>
                                                                    <li><a href="{{ route('locations.oct-to-dec-report') }}" class="btn"> <i class="icon-print"></i> Print 4 <sup>th</sup> Quarter's Report</a></li>
                                                                    <li class="divider"></li>
                                                                    <li> <a href="{{ route('locations.quarterly-report') }}" class="btn"> <i class="icon-print"></i> Print All Quarters</a> </li>
                                                                </ul>
                                                            </div>
										                	 
										                	<!-- <a href="{{ route('locations.summarized-yearly-reports-print') }}" class="btn btn-xs btn-warning" style="color: white;"> <i class="icon-print"></i> Print Yearly Report</a> -->
										                </div>

					                                		<table id="summary" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
												                <thead>
												                    <tr style="border-width: 1px;">
												                        <td width="3%" rowspan="2">#</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Branch</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> State</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> Day</td>
												                        <td colspan="13" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> AVERAGE BY MONTHS</td>
												                    </tr>
												                    <tr>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JAN</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FEB</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MAR</td>
												                        <td width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">avg</td>
												                    </tr>
												                    
												                </thead>
												                <tbody>
												                    @foreach($locations as $count => $location)
												                    <tr style="border-style: all; border-width: 2px;">
												                        <td rowspan="2">{{++$count}}</td>
												                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
												                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_state->state}}</td>

												                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">SUNDAY</td>

												                        <td align="center"> <!-- January's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id','!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id','!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id','!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}

												                        </td>

												                        <td align="center"> <!-- Feb's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- March's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>


												                        <td align="center"> <!-- Quarter's Average-->
												                            {{
												                                number_format(((
												                               \App\WeeklyReport::where('service_type_id', '!=',5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/4 +

												                                (\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4 +

												                                (\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/5)
												                               /3, 0)
												                                
												                            }}

												                        </td>
												                        
												                    </tr>
												                        
												                    <tr>
												                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">WEDNESDAY</td>
												                        <td align="center"> <!-- January's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}

												                        </td>

												                        <td align="center"> <!-- Feb's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- March's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Quarters Average-->
												                            {{
												                                number_format(((
												                               \App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/5 +

												                                (\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4 +

												                                (\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/4)
												                               /3, 0)
												                                
												                            }}

												                        </td>
												                    </tr>
												                    @endforeach
												                    <!-- <tr>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="5">Attendance</td>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="center" >
												                            <b><span id="totalAttendance"> </span></b>
												                        </td>
												                        <td></td>
												                        <td style="font-weight: bold; text-transform: uppercase; font-size: 17px;" align="center" rowspan="2" colspan="2"><br>X</td>
												                    </tr> -->
												                

												                    <!-- End Sunday Services -->
												                </tbody>
												            </table>
					                                  	</div>
					                                  	<div class="tab-pane fade" id="v-pills-yearly" role="tabpanel" aria-labelledby="v-pills-yearly-tab">
					                                      <b class="text-uppercase">Locations Yearly Report</b>
					                              		<div class="float-right" align="right">
										                	<a href="{{ route('locations.this-yearly-report') }}" class="btn btn-xs btn-primary" style="color: white;"> <i class="icon-print"></i> Print Report</a>
										                </div>

					                                		<table id="summary" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
												                <thead>
												                    <tr style="border-width: 1px;">
												                        <td width="5%" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; font-size: 12px;">Serial #</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Branch</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> State</td>
												                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> Day</td>
												                        <td colspan="13" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> AVERAGE BY MONTHS</td>
												                    </tr>
												                    <tr>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JAN</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FEB</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MAR</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">APR</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MAY</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JUN</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JUL</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">AUG</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SEP</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">OCT</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NOV</td>
												                        <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">DEC</td>
												                        <td width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">year's avg</td>
												                    </tr>
												                    
												                </thead>
												                <tbody>
												                    @foreach($locations as $count => $location)
												                    <tr style="border-style: all; border-width: 2px;">
												                        <td rowspan="2" style="font-weight: bold; font-size: 11px;">{{++$count}}</td>
												                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
												                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_state->state}}</td>

												                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">SUNDAY</td>

												                        <td align="center"> <!-- January's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}


												                        </td>

												                        <td align="center"> <!-- Feb's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- March's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- April's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- May's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        
												                        <td align="center"> <!-- June's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- July's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>


												                        <td align="center"> <!-- August's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>


												                        <td align="center"> <!-- Sept's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Oct's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Nov's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Dec's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Year's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_children'))/12, 0)
												                            }}

												                        </td>
												                        
												                    </tr>
												                        
												                    <tr>
												                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">WEDNESDAY</td>
												                        <td align="center"> <!-- January's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Feb's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- March's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- April's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 4)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- May's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 5)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        
												                        <td align="center"> <!-- June's Average-->

												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 6)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- July's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 7)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>


												                        <td align="center"> <!-- August's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 8)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>


												                        <td align="center"> <!-- Sept's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 9)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Oct's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 10)->where('location_id', $location->id)->sum('attendance_children'))/5, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Nov's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 11)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Dec's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('month', 12)->where('location_id', $location->id)->sum('attendance_children'))/4, 0)
												                            }}
												                        </td>

												                        <td align="center"> <!-- Year's Average-->
												                            {{
												                                number_format((
												                                \App\WeeklyReport::where('service_type_id',5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_male') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_female') +
												                                \App\WeeklyReport::where('service_type_id', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_children'))/12, 0)
												                            }}

												                        </td>
												                    </tr>
												                    @endforeach
												                    <!-- <tr>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="5">Attendance</td>
												                        <td style="font-weight: bold; text-transform: uppercase;" align="center" >
												                            <b><span id="totalAttendance"> </span></b>
												                        </td>
												                        <td></td>
												                        <td style="font-weight: bold; text-transform: uppercase; font-size: 17px;" align="center" rowspan="2" colspan="2"><br>X</td>
												                    </tr> -->
												                

												                    <!-- End Sunday Services -->
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
                            <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2">

                            	<div class="float-right" align="right">
				                	<a href="{{ route('locations.weekly-reports-print') }}" class="btn btn-xs btn-secondary" style="color: white;"> <i class="icon-print"></i> Print Report</a>
				                	<a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-danger"> <i class="icon-print"></i> Print Monthly Report</a>
				                	<a href="{{ route('locations.summarized-yearly-reports-print') }}" class="btn btn-xs btn-warning" style="color: white;"> <i class="icon-print"></i> Print Yearly Report</a>
				                </div>


                                <div class="table-responsive">
                                    <table class="table table-hover table-responsive">
                                        <thead class="no-b">
											<tr>
												<th colspan="27" style="text-align: center; text-transform: uppercase; font-weight: bold;" > {{ date('F, Y')}} Financial/Income Report by weeks</th>
											</tr>
											<tr>
												<td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">Branch Name</td>
												<td colspan="11" style="text-align: left; text-transform: uppercase; font-weight: bold;">{{ \App\Location::find(1)->loc_name}}</td>
												<td colspan="13" style="text-align: left; text-transform: uppercase; font-weight: bold;">Address: &emsp; {{ \App\Location::find(1)->loc_add}} </td>
											</tr>

											<tr>
												<td style="text-align: left; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Day</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 1</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 2</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 3</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 4</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 5</td>
												<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">G. Total</td>
												<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Att avg</td>
												<td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Remarks</td>
											</tr>
                                        </thead>
                                        <tbody>
											<tr>
												<td rowspan="" colspan="2" style="text-transform: uppercase; font-weight: bold;">Sunday</td>
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 1 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 2 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 3 -->
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 4 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 5 -->
												<td style="font-weight: bold; text-transform: uppercase;" align="center"> 
													{{
														number_format(
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'),0)
													}} 
												</td>

												<td align="center"> <!-- Monthly Sunday Income Average-->

													
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/4, 2)
													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/3, 2)
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/1, 2)
													}}

													@else
													0
													@endif
												</td>
												<td colspan=""></td>
											</tr>
											
											<!-- End Sunday Services -->
											<tr>
												<td colspan="2" style="text-transform: uppercase; font-weight: bold">Wednesday</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 1 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 2 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 3 -->
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 4 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="4" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
													}} 
												</td>
												<!-- End Income WK 5 -->
												<td style="font-weight: bold; text-transform: uppercase;" align="center"> 
													{{
														number_format(
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'),0)
													}} 
												</td>

												<td align="center"> <!-- Monthly Sunday Income Average-->

													
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/4, 2)
													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/3, 2)
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/1, 2)
													}}

													@else
													0
													@endif
												</td>

												<td>	
													
												</td>
											</tr>
											

											<!-- End Wednesday Services -->


										</tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3">
                            	<div class="float-right" align="right">
				                	<a href="{{ route('locations.weekly-reports-print') }}" class="btn btn-xs btn-secondary" style="color: white;"> <i class="icon-print"></i> Print Report</a>
				                	<a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-danger"> <i class="icon-print"></i> Print Monthly Report</a>
				                	<a href="{{ route('locations.summarized-yearly-reports-print') }}" class="btn btn-xs btn-warning" style="color: white;"> <i class="icon-print"></i> Print Yearly Report</a>
				                </div>
				                
                            	<div class="table-responsive">
                                    <table class="table table-hover table-responsive">
                                        <thead class="no-b">
											<tr>
												<th colspan="27" style="text-align: center; text-transform: uppercase; font-weight: bold;" > {{ date('F, Y')}} New Converts/First Timers Report by weeks</th>
											</tr>
											<br>

											<tr>
												<td style="text-align: left; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Day</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">WK 1</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">WK 2</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">WK 3</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">WK 4</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">WK 5</td>

												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2">FT Total</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2">FT AVG</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2">NC Total</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2">NC AVG</td>

												<!-- <td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">G. Total</td> -->
												<!-- <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Att avg</td> -->
												<td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Remarks</td>
											</tr>
											<tr>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FT</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">NC</td>

												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FT</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">NC</td>

												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FT</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">NC</td>

												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FT</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">NC</td>

												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FT</td>
												<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">NC</td>

											</tr>
                                        </thead>
                                        <tbody>
											<tr>
												<td rowspan="" colspan="2" style="text-transform: uppercase; font-weight: bold;">Sunday</td>
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 1 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 2 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 3 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 4 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 5 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<!-- FT Total -->

												<td align="center"> <!-- Monthly Sunday First Timers Average-->
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/4, 2)

													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/3, 2)	
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/1, 2)
													}}

													@else
													0
													@endif
												</td>
												<!-- FT AVG -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- NC Total -->

												<td align="center"> <!-- Monthly Sunday New Converts Average-->
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/4, 2)

													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/3, 2)	
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/1, 2)
													}}

													@else
													0
													@endif
												</td>
												<!-- FT AVG -->

												
												<td colspan=""></td>
											</tr>
											<!-- End Sunday Services -->
											<tr>
												<td colspan="2" style="text-transform: uppercase; font-weight: bold">Wednesday</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 1 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 2 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 3 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 4 -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- End Income WK 5 -->
												
												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') 
													}} 
												</td>
												<!-- FT Total -->

												<td align="center"> <!-- Monthly Sunday First Timers Average-->
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/4, 2)

													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/3, 2)	
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'))/1, 2)
													}}

													@else
													0
													@endif
												</td>
												<!-- FT AVG -->

												<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="" >
													{{
														\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') 
													}} 
												</td>
												<!-- NC Total -->

												<td align="center"> <!-- Monthly Sunday New Converts Average-->
													@php
													$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
													@endphp

													@if(count($weekx) == 5)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/5, 2)
													}}

													@elseif(count($weekx) == 4)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/4, 2)

													}}

													@elseif(count($weekx) == 3)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/3, 2)	
													}}

													@elseif(count($weekx) == 2)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/2, 2)
													}}

													@elseif(count($weekx) == 1)
													{{
														number_format((\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'))/1, 2)
													}}

													@else
													0
													@endif
												</td>
												<td>	
													
												</td>
											</tr>
											

											<!-- End Wednesday Services -->


										</tbody>
                                    </table>
                                </div>
                                <hr><br>
									<h3 class="text-uppercase">Analysis of Data</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @include('locations.modals.getreportbymonth')
            </div>
</div>

@endsection