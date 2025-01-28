
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : 'Yaerly Report for - '. date('Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{'locations\' Summmary report for '. date('Y')}}  </p>
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
    </body>
</html>
