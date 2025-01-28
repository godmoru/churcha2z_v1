
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' ' .' Yearly Report for - '. date('Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    	<!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->

    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ 'Summary of Reports for the year - '. date('Y')}}  </p>
    </div>
    <div class="row container col-md-12">
        <div class="col-md-12">
			<table id="summary" style="border-style: all; border-width: 1px;" border="1.5" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
				<thead>
					<tr style="border-width: 1px;">
						<td  colspan="2" rowspan="3" style="text-align: left; text-transform: uppercase; font-weight: bold;">
							<br>Branch Name
						</td>
						<td colspan="48" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
						<td colspan="8" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> Grand Summary</td>

					</tr>
					<tr>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">JANUARY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">FEBRUARY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">MARCH</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">APRIL</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">MAY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">JUNE </td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4"> JULY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">AUGUST</td>
						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">SEPTEMBER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">OCTOBER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">NOVEMVER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">DECEMBER</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="2">G. Total</td>
						<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="2">G. AVG</td>
					</tr>
					<tr style="text-transform: uppercase;">
						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>AVG</th>
						<th>INC (&#8358;)</th>
						<th>AVG</th>

						<th>ATT.</th>
						<th>INC (&#8358;)</th>

						<th>ATT.</th>
						<th>INC (&#8358;)</th>
					</tr>
				</thead>
				<tbody>
					<tr style="border-style: all; border-width: 2px; " >
					@foreach($locations as $location)
						<td width="19%" rowspan="" style="text-transform: uppercase; font-weight: bold; font-size: 11px;" colspan="2"><br>{{$location->loc_name}}</td>
						<!-- <td width="7%" style="text-transform: uppercase; font-weight: bolder; font-size: 11px; background-color: #bbdefb;">Attendance</td> -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- JAN -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month',2)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month',2)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month',2)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 2)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- FEB -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 3)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- MAR -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 4)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- APR -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 5)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- MAY -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 6)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- JUN -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 7)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- JUL -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 8)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- AUG -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 9)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- SEP -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 10)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- OCT -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 11)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- NOV -->

						<td align="center">
							{{ number_format(
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td align="center">
							<!-- CUM ATT AVG -->
							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month',12)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)

								}}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children'))/9, 2)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format( (\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 1 )->where('location_id', $location->id)->sum('attendance_children'))/8, 2)
								}}
								@else
								0
								@endif
						</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount')), 0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase; color: red;" colspan="" align="center">
							<!-- CUM CASH AVG -->

							@php
								$weeks = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->pluck('week');
								$weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->pluck('week');
							@endphp

							@if(count($weeks) == 4 && count($weekx) == 5)
								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount'))/9, 0) }}
							@elseif(count($weeks)==5 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount'))/9, 0)
								}}

								@elseif(count($weeks)==4 && count($weekx)== 4)


								{{number_format((\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +

								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('service_type_id', 5)->where('month', 12)->where('location_id', $location->id)->sum('offering_amount'))/8, 0)
								}}
								@else
								0
								@endif
						</td>
						<!-- DEC -->

						<td>
							{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_male') +
							\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_female') +
							\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}
						</td>
						<td>
							{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('tithe_amount'), 0)
								}}
						</td>
						<!-- YRT -->

						<td>
							{{number_format((\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_male') +
							\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_female') +
							\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('attendance_children'))/12, 2)
							}}
						</td>
						<td>
							{{number_format((\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', $location->id)->sum('tithe_amount'))/12, 2)
								}}
						</td>

						<!-- YRAVG -->


					</tr>
				
					@endforeach
					<tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="49">Attendance</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" >
							<b><span id="totalAttendance"> </span></b>
						</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<!-- <tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="right" colspan="13" >Income</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" >0</td>
						<td></td>
					</tr> -->
					<!-- End Sunday Services -->
				</tbody>
			</table>
			<hr style="border-width: 1px;">
			<div class="row col-md-12">
				<div class="col-md-4">
					<b style="text-align: center;">5 Top Performing Locations</b>
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="col-md-4">
					<b style="text-align: center;">5 Mid Range Performing Locations</b>
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="col-md-4">
					<b style="text-align: center;">5 Least Performing Locations</b>
					<ul>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
						<li></li>
					</ul>
				</div>
			</div>
		</div>
    </div> 
    <!-- <script type="text/javascript" src="{{asset('js/app2.js')}}"></script> -->
    <script type="text/javascript">
    	 var summary = document.getElementById("summary"), sumVal = 0;
            
            for(var i = 1; i < summary.rows.length; i++)
            {
                sumVal = sumVal + parseInt(summary.rows[i].cells[2].innerHTML);
            }
            document.getElementById("totalAttendance").innerHTML = "Sum Value = " + sumVal;
            console.log(sumVal);
    </script>
    </body>
</html>