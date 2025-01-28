
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
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' ' .' Weekly Report for - '. date('F, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">

			<table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
				<thead>
					<tr>
						<th colspan="27" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" >Weekly Report</th>
					</tr>
					<tr>
							<td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">Branch:</td>
							<td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold;">{{ \App\Location::find(\Auth::user()->location_id)->loc_name}}</td>
							<td colspan="13" style="text-align: left; text-transform: uppercase; font-weight: bold;">Address: {{ \App\Location::find(\Auth::user()->location_id)->loc_add}} </td>
						</tr>

						<tr>
							<td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"> Pastor:</td>
							<td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold;">{{   isset(\App\Location::find(\Auth::user()->location_id)->get_loc_pst) ? \App\Location::find(\Auth::user()->location_id)->get_loc_pst->surname.' '.\App\Location::find(\Auth::user()->location_id)->get_loc_pst->othernames : "Not Set"}}</td>
							<td colspan="13" style="text-align: left; text-transform: uppercase; font-weight: bold;">Period: {{ date('F, Y')}}</td>

						</tr>

					<!-- <tr>
						<td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; font-size: 12px;">Period</td>
						<td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; font-size: 12px;">{{ date('F, Y')}}</td>
						<td colspan="13"></td>
					</tr> -->
					<tr>
						<td style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="2">Service Days/Weeks</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">WK 1</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">WK 2</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">WK 3</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">WK 4</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="4">WK 5</td>
						<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">G. Total</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">Att avg</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">NC</td>
						<td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">FT</td>
						<td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" rowspan="2" colspan="">Rem.</td>
					</tr>
					<tr>
						<!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="2">Service Days/Weeks</td> -->
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">M</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">F</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">C</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">T</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">M</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">F</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">C</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">T</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">M</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">F</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">C</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">T</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">M</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">F</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">C</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">T</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">M</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">F</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">C</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;" colspan="">T</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="4" style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Sun.</td>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">ATT</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 1 -->

						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 2 -->

						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 3 -->

						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 4 -->

						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 5 -->


						<td align="center"> 
							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<td>STotal</td>
						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts'),0) 
								}}
						</td>
						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers'),0) 

								}}
						</td>

						<td>	
							
							
						</td>
					</tr>
					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Incomes</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 1 -->
						
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 2 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 3 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 4 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 5 -->
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center"> 
							{{
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>

						<td></td>
						<td colspan="3"></td>
					</tr>

					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">msg Title</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="5"></td>

					</tr>

					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Min.</td>
						<td colspan="4">
							@php
							echo $weklyreport = \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->get(['preacher']);
							@endphp
							
						</td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="5"></td>
					</tr>
					<!-- End Sunday Services -->
					<tr>
						<td rowspan="4" style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Wed.</td>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">ATT</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 1 -->

						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 2 -->

						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 3 -->

						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 4 -->

						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')	}}</td>
						<td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')	}}</td>
						<td align="center">
							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<!-- End Week 5 -->


						<td align="center"> 
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
							}} 
						</td>
						<td></td>
						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('new_converts'),0) 
								}}
						</td>
						<td align="center">
							{{
								number_format(
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('first_timers'),0) 

								}}
						</td>

						<td>	
							
							
						</td>
					</tr>
					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Incomes</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 1 -->
						
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 2 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 3 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 4 -->

						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center">
							Tithe <br>

							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<td align="center" colspan="2" style="font-weight: bold; font-size: 12px; text-transform: uppercase;">OffR<br>
							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
							}} 
						</td>
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center" colspan="">
							{{
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>
						<!-- End Income WK 5 -->
						<td style="font-weight: bold; font-size: 12px; text-transform: uppercase;" align="center"> 
							{{
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
								\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
							}} 
						</td>

						<td></td>
						<td colspan="3"></td>
					</tr>

					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">msg Title</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="4">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('message_title') }}</td>
						<td colspan="5"></td>

					</tr>

					<tr>
						<td style="text-transform: uppercase; font-weight: bold; font-size: 12px;">Min.</td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="4"></td>
						<td colspan="5"></td>
					</tr>
					<!-- End Wednesday Services -->


				</tbody>
			</table>
		</div>
    </div> 
    </body>
</html>
