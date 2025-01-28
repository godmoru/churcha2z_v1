
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
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{'Summmary report for '. date('F, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="summary" border="2" style="border-style: all;" class="table table-hover" data-options='{ "paging": false; "searching":false}'>
                <thead>
                    <tr style="border-width: 1px;">
                        <td width="5%" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; font-size: 12px;">Serial #</td>
                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br>Branch</td>
                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> State</td>
                        <td rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;"><br> Day</td>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px; border-width: 1px;"> WEEK 1</td>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 2</td>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 3</td>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 4</td>
                        <td colspan="4" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> WEEK 5</td>
                        <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 12px;"> Summary</td>
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
                    @foreach($locations as $count => $location)
                    <tr style="border-style: all; border-width: 2px;">
                        <td rowspan="2" style="font-weight: bold; font-size: 11px;">{{++$count}}</td>
                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_name}}</td>
                        <td width="15%" rowspan="2" style="text-transform: uppercase; font-weight: bold; font-size: 11px;"><br>{{$location->loc_state->state}}</td>

                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">SUN.</td>
                        
                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children') }}</td>

                        <td align="center" style="font-weight: bold;"> <!-- Week 1 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <!-- End Week 1 -->

                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children') }}</td>

                        <!-- End Week 2 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 2 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children') }}</td>

                        <!-- End Week 3 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 3 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children') }}</td>

                        <!-- End Week 4 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 4 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_male') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_female')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', '!=', 5)->where('location_id', $location->id)->sum('attendance_children') }}</td>

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
                            {{
                                number_format((
                                \App\WeeklyReport::where('service_type_id', '!=',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/$mSundays, 2)
                            }}
                        </td>
                    </tr>


                        
                    <tr>
                        <td style="text-transform: uppercase; font-weight: bold; font-size: 11px;">WED.</td>

                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')   }}</td>

                        <td align="center" style="font-weight: bold;"> <!-- Week 1 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <!-- End Week 1 -->

                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')   }}</td>

                        <!-- End Week 2 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 2 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')   }}</td>

                        <!-- End Week 3 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 3 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')   }}</td>

                        <!-- End Week 4 -->
                        <td align="center" style="font-weight: bold;"> <!-- Week 4 Total--->
                            {{
                                number_format((\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')), 0) 
                            }} 
                        </td>

                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_male')   }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_female') }}</td>
                        <td align="center">{{\App\WeeklyReport::where('week',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('service_type_id', 5)->where('location_id', $location->id)->sum('attendance_children')   }}</td>

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
                            {{
                                number_format((
                                \App\WeeklyReport::where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_male') +
                                \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_female') +
                                \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', $location->id)->sum('attendance_children'))/$mWednesdays, 2)
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
    </body>
</html>
