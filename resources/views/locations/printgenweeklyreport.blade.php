
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Electronic Membership Information Management System">
        <meta name="author" content="Umoru Godfrey, E.">
        <meta name="phone" content="2348165420728">
        <meta name="email" content="godfrey@gesusoft.com.ng">
        <link rel="icon" href="{{asset('img/dunamis.png')}}" type="image/x-icon">
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' ' .' Weekly Report for - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    	<!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->

    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ 'Sumarized Weekly Report for - '. date('F, Y')}}  </p>
    </div>
    <div class="row container col-md-12">
        <div class="col-md-12">
			<table id="summary" style="border-style: all; border-width: 1px;" border="1.5" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
				<thead>
					<tr style="border-width: 1px;">
						<td  colspan="2" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
							<br>Branch Name
						</td>
						<td colspan="9" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Sunday"}}</td>
						<td colspan="9" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Wednesday"}}</td>
						<td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> Grand Summary</td>

					</tr>
					<tr>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 1</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 2</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 3</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 4</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 5</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">Sub </td>
						<td width="4%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> avg</td>
						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NC</td>
						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FT</td>

						<!-- Wednesday  -->
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 1</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 2</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 3</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 4</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">WK 5</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">Sub </td>
						<td width="4%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> avg</td>

						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NC</td>
						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FT</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">G. Total</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">G. AVG</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NC Total</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FT Total</td>
						<!-- <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Rem.</td> -->
					</tr>
					<tr>

					</tr>
				</thead>
				<tbody>
					@foreach($locations as $location)
					<tr style="border-style: all; border-width: 2px;">
						<td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">Attendance</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 1 -->

						<td align="center">
							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 2 -->

						<td align="center">
							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 3 -->

						<td align="center">
							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 4 -->

						<td align="center">
							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') 
							}}
						</td>
						<!-- End Week 5 -->


						<td align="right" id="totalAtt" class="totalAtt"> 
							{{number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<!-- End Attendance Total  -->
						<td class="orange lighten-4" align="center">
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 5)
								
							{{number_format((

								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/5 , 2)
								}}

							@elseif(count($weeks)==4)
							
							{{number_format((

								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/4 , 2)
								}}
							@else
							0
							@endif

						</td>

						<!-- End Attendance Avarage -->

						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'),0) 
								}}
						</td>
						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'),0) 

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

						<td align="right" id="totalIncome" class="totalIncome"> 
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


						<td class="light-blue accent-1" align="center">
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp
							@if(count($weeks) == 5)
								{{number_format(( \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/5 , 2)
								}}
							@elseif(count($weeks)==4)
							
								{{number_format((

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/4 , 2)
								}}
								@else
								0
								@endif
						</td>

						<!-- End Wednesday Average -->

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

						<td style="text-transform: uppercase; font-weight: bold;" align="right">	
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center">

							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/9, 0)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/8, 0)
								}}
								@else
								0
								@endif

						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: blue" align="center"> <!-- Total New Converts-->
							{{
								number_format(
								\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('new_converts'),0) 
								}}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: green;" align="center"><!-- Total First Timers-->
							{{
								number_format(
								\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('first_timers'),0) 
								}}
						</td>
					</tr>
					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">Incomes</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 1 -->
						
						<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 2 -->

						<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 3 -->

						<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 4 -->

						<td style="font-weight: bold; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 5 -->
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +


								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>
						<td class="orange accent-1">
							<!-- Sunday Cash Avg -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp
							@if(count($weeks) == 5)
								{{number_format(( \App\WeeklyReport::where('service_type_id','!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('service_type_id','!=', 5)->where('month','!=', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/5 , 2)
								}}
							@elseif(count($weeks)==4)
							
								{{number_format((

								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('service_type_id','!=',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/4 , 2)
								}}
								@else
								0
								@endif

						</td>
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
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
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
						<td class="amber lighten-4">
							<!-- Wednesday Cash Avg -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp
							@if(count($weeks) == 5)
								{{number_format(( \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month','!=', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/5 , 2)
								}}
							@elseif(count($weeks)==4)
							
								{{number_format((

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount'))/4 , 2)
								}}
								@else
								0
								@endif
						</td>
						<td colspan="2" class="orange lighten-4" style="font-weight: bold; text-transform: uppercase;" align="center">X</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif


						</td>
						<td colspan="2" class="orange lighten-4" style="font-weight: bold; text-transform: uppercase;" align="center">X</td>

					</tr>
					@endforeach
					<tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="19">Attendance</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" >
							<b><span id="totalAttendance"> </span></b>
						</td>
						<td></td>
						<td style="font-weight: bold; text-transform: uppercase; font-size: 17px;" align="center" rowspan="2" colspan="2"><br>X</td>
					</tr>
					<tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="right" colspan="19" >Income</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" >0</td>
						<td></td>
					</tr>

					<!-- End Sunday Services -->
				</tbody>
			</table>
		</div>
    </div> 
    <script type="text/javascript" src="{{asset('js/app2.js')}}"></script>
    <script type="text/javascript">
    function sumcars() {
    $("#summary").on('display', '.totalAtt', function () {
       var TAtt = 0;
       $("#summary .totalAtt").each(function () {
           var parktotal = $(this).val();
           if ($.isNumeric(parktotal)) {
              TAtt += parseFloat(parktotal);
              }                  
            });
              $("#totalAttendance").text(TAtt.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
    </script>
    </body>
</html>

