
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
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ 'Sumarized Weekly Report for - '. date('Y')}}  </p>
    </div>
    <div class="row container col-md-12">
        <div class="col-md-12">
			<table id="summary" style="border-style: all; border-width: 1px;" border="1.5" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
				<thead>
					<tr style="border-width: 1px;">
						<td  colspan="2" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
							<br>Branch Name
						</td>
						<td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
						<td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> Grand Summary</td>

					</tr>
					<tr>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JANUARY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FEBRUARY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MARCH</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">APRIL</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">MAY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">JUNE </td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> JULY</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">AUGUST</td>
						<td width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">SEPTEMBER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">OCTOBER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NOVEMVER</td>
						<td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">DECEMBER</td>
						<td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">G. Total</td>
						<td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">G. AVG</td>
						<!-- <td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">NC Total</td> -->
						<!-- <td width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;">FT Total</td> -->
						<!-- <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Rem.</td> -->
					</tr>
					<tr>

					</tr>
				</thead>
				<tbody>
					@foreach($locations as $location)
					<tr style="border-style: all; border-width: 2px; ">
						<td width="15%" rowspan="4" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
						<td width="7%" style="text-transform: uppercase; font-weight: bolder; font-size: 11px; background-color: #bbdefb;">Attendance</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Jan Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Feb Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Mar Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Apr Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--May Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Jun Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Jul Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Aug Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Sept Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Oct Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Nov Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td align="right" id="totalAtt" class="" style="background-color: #bbdefb; font-weight: bold;"> <!--Dec Total-->
							{{number_format(
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}} 
						</td>

						<td style="background-color: #bbdefb; font-weight: bolder; text-align: center;">
							
							{{number_format(

								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_children'), 0)
							}}


						</td>
						<td style="background-color: #bbdefb; font-weight: bolder; text-align: center;">
							{{number_format((

								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('attendance_children') +

								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_male') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_female') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('attendance_children'))/12, 2)
							}}
						</td>
					</tr>
					<tr style="text-transform: uppercase; background-color: #c8e6c9;">
						<td width="7%" style="text-transform: uppercase; font-weight: bold; font-size: 11px;">Incomes</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							&#8358;{{ number_format(
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>

						<td style="font-weight: bolder; text-align: center;">
							&#8358;{{ number_format(	
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('tithe_amount') , 0)
							}} 
						</td>
						<td style="font-weight: bolder; text-align: center;">
							{{ number_format((
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('tithe_amount') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('offering_amount') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('tithe_amount'))/12 , 0)
							}} 
						</td>
		
					</tr>

					<tr style="text-transform: uppercase; background-color: #fff3e0; font-weight: bolder;">
						<td width="7%" style="text-transform: uppercase; font-weight: bold; font-size: 11px;">New Converts</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('new_converts'),0) }}
						</td>

						<td style="font-weight: bolder; text-align: center;">
							{{number_format( 
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('new_converts'),0) 
							}}
							
						</td>
						<td style="font-weight: bolder; text-align: center;">
							{{number_format((
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('new_converts') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('new_converts'))/12,2) 
							}}
						</td>
					</tr>

					<tr style="text-transform: uppercase; background-color: #ffecb3;">
						<td width="7%" style="text-transform: uppercase; font-weight: bold; font-size: 11px; ">First Timers</td>
						
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 2)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"> 
							{{number_format( \App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('first_timers'),0) }}
						</td>

						<td style="font-weight: bolder; text-align: center;">
							{{number_format( 
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('first_timers'),0) 
							}}
							
						</td>
						<td style="font-weight: bolder; text-align: center;">
							{{number_format((
								\App\WeeklyReport::where('month', 1)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 3)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 4)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 5)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 6)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 7)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 8)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 9)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 10)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 11)->where('location_id', $location->id)->sum('first_timers') +
								\App\WeeklyReport::where('month', 12)->where('location_id', $location->id)->sum('first_timers'))/12,2) 
							}}
						</td>
						

					</tr>

					@endforeach
					<tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" rowspan="2"><br>Cummulative Totals</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="right"  colspan="13">Attendance</td>
						<td style="font-weight: bold; text-transform: uppercase;" align="center" >
							<b><span id="totalAttendance"> </span></b>
						</td>
						<td></td>
					</tr>
					<tr>
						<td style="font-weight: bold; text-transform: uppercase;" align="right" colspan="13" >Income</td>
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

