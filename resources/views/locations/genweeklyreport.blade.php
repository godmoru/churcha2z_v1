@extends('layouts.master')

@section('content')
<div class="row collapse col-md-12" id="addweeklyreports">
    @include('locations.addweeklyreports')
</div>
<div class="row my-3 ">
    <div class="col-md-12">
    	
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> General Weekly Report </strong> 
                <div class="pull-right" align="right">
                	<!-- <a data-toggle="collapse" data-target="#addweeklyreports" aria-expanded="false" aria-controls="collapseExample" class="btn btn-xs btn-primary"> <i class="icon-plus"></i> Add Report</a> -->
                	<a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                	<!-- <a data-toggle="modal" data-target="#fetchLocationData" class="btn btn-xs btn-success"> <i class="icon-download"></i> Get By Location/Period</a> -->
                </div>
            </div>
            <div class="card-body">
            	

				<table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
					<thead>
						<tr>
							<th colspan="27" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
								<img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
							Summary of Weekly Reports - {{ date('F, Y')}}
						</th>
						</tr>
						<tr>
							<td  colspan="2" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
								<br>Branch Name
							</td>
							<td colspan="9" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Sunday"}}</td>
							<td colspan="9" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Wednesday"}}</td>
							<td colspan="13" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand Summary</td>

						</tr>

						<!-- <tr>
							<td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">Period</td>
							<td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold;">{{ date('F, Y')}}</td>
							<td colspan="13"></td>
						</tr> -->
						<tr>
							<!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 1</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 2</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 3</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 4</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 5</td>
							<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">Sub </td>
							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan=""> avg</td>
							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">NC</td>
							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">FT</td>

							<!-- Wednesday  -->
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 1</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 2</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 3</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 4</td>
							<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">WK 5</td>
							<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">Sub </td>
							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan=""> avg</td>

							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">NC</td>
							<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">FT</td>
							<td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
							<td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Remarks</td>
						</tr>
						<tr>

						</tr>
					</thead>
					<tbody>
						@foreach($locations as $location)
						<tr>
							<td width="30%" rowspan="2" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
							<td style="text-transform: uppercase; font-weight: bold">Attendance</td>
							<td align="center">
								{{
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 1 -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 2 -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 3 -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 4 -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 5 -->


							<td align="center"> 
								{{number_format(
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +


									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'), 0)
								}} 
							</td>
							<td class="orange lighten-4"></td>
							<td align="center">
								{{
									number_format(
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'),0) 
									}}
							</td>
							<td align="center">
								{{
									number_format(
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'),0) 

									}}
							</td>

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 1 Wed -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 2 Wed -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 3 Wed -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 4 Wed -->

							<td align="center">
								{{
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
								}} 
							</td>
							<!-- End Week 5 Wed -->

							<td align="center"> 
								{{number_format(
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +


									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') , 0)

								}} 
							</td>
							<!-- Wednesday Total -->


							<td class="light-blue accent-1"></td>
							<td align="center">
								{{
									number_format(
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'),0) 
									}}
							</td>
							<td align="center">
								{{
									number_format(
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'),0) 

									}}
							</td>

							<td style="text-transform: uppercase; font-weight: bold;" align="center">	
								{{ number_format(
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->where('service_type_id',5)->sum('attendance_male') +
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id',5)->where('location_id', $location->id)->sum('attendance_female') +
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id',5)->where('location_id', $location->id)->sum('attendance_children') , 0)
								}} 
							</td>
							<td></td>
						</tr>
						<tr>
							<td style="text-transform: uppercase; font-weight: bold;">Incomes</td>
							
							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 1 -->
							
							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 2 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 3 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 4 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 5 -->
							<td style="font-weight: bold; text-transform: uppercase;" align="center"> 
								&#8358;  {{ number_format(
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +


									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') , 0)
								}} 
							</td>
							<td class="orange accent-1"></td>
							<td colspan="2" class="green lighten-4" align="center" style="font-weight: bold; text-transform: uppercase;" align="center">X</td>

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 1 -->
							
							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 2 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 3 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 4 -->

							<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
								{{
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>
							<!-- End Income WK 5 -->
							<td style="font-weight: bold; text-transform: uppercase;" align="center"> 
								{{
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +


									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
								}} 
							</td>

							<td class="amber lighten-4"></td>
							<td colspan="2" class="orange lighten-4" style="font-weight: bold; text-transform: uppercase;" align="center">X</td>

							<td style="font-weight: bold; text-transform: uppercase;" align="center"> 
								&#8358;  {{number_format(

									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +


									\App\WeeklyReport::where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
									\App\WeeklyReport::where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'), 0)
								}} 
							</td>
							<td colspan="1"></td>
						</tr>
						@endforeach

						<!-- End Sunday Services -->
					</tbody>
				</table>

				<!-- <div class="h3 text-center jumbotron bg-light"> There are no attendance taken for today. You can select a date from <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#dategetATT">here </a> to modify or edit its record(s). Thank you.</div> -->

			</div>
		</div>
	</div>
	@include('locations.modals.getWeeklyReport')
	@include('locations.modals.addweeklyreport')
</div>

@endsection