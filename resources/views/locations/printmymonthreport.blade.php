
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
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{\Auth::user()->location->loc_name. ' Summmarized report for, '. date('F, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="27" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Weekly Report for {{ date('F, Y')}}</th>
                        </tr>
                        <tr>
                            <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Days/Weeks</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 1</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 2</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 3</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 4</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WK 5</td>
                            <td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">G. Total</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Att avg</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">NC</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">FT</td>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Remarks</td>
                        </tr>
                        <tr>
                            <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="2">Service Days/Weeks</td> -->
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">T</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">T</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">T</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">T</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">M</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">F</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">C</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">T</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3" style="text-transform: uppercase; font-weight: bold">Sunday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 1 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 2 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 3 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 4 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 5 -->


                            <td> <!-- Monthly SUnday Total-->
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
                            <td align="center"> <!-- Monthly SUnday Average-->

                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/1, 2)
                                }}

                                @else
                                0
                                @endif

                            </td>
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
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            
                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 1 -->
                            
                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 2 -->

                            <td align="center" colspan="4" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 3 -->


                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 4 -->

                            <td align="center" colspan="4" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 5 -->
                            <td style="font-weight: bold; text-transform: uppercase;" align="center"> 
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

                            <td align="center"> <!-- Monthly Sunday Income Average-->

                                
                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/1, 2)
                                }}

                                @else
                                0
                                @endif
                            </td>
                            <td colspan="3" rowspan="2" align="center" style="font-size: 14px; ">
                                {{

                                    (\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')) +
                                    (\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'))

                                }}
                            </td>
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Tithes</td>
                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 1 -->
                            
                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 2 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            
                            <!-- End Income WK 3 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 4 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            
                            <!-- End Income WK 5 -->
                            <td style="font-weight: bold; text-transform: uppercase;" align="center"> 
                                {{
                                    \App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>

                            <td align="center"> <!-- Monthly Sunday Income Average-->

                                
                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', '!=', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/1, 2)
                                }}

                                @else
                                0
                                @endif
                            </td>

                        </tr>

                        
                        <!-- End Sunday Services -->
                        <tr>
                            <td rowspan="3" style="text-transform: uppercase; font-weight: bold">Wed.</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 1 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 2 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 3 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
                            <td align="center">
                                {{
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') 
                                }} 
                            </td>
                            <!-- End Week 4 -->

                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male')  }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')    }}</td>
                            <td align="center">{{\App\WeeklyReport::where('week', 5)->where('service_type_id',5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')  }}</td>
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
                            <td align="center"> <!-- Monthly Wednesday Average-->

                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/1, 2)
                                }}

                                @else
                                0
                                @endif

                            </td>
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
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            
                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 1 -->
                            
                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 2 -->

                            <td align="center" colspan="4" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 3 -->


                            <td colspan="4" align="center" colspan="2" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 4 -->

                            <td align="center" colspan="4" style="font-weight: bold; text-transform: uppercase;">
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount')
                                }} 
                            </td>
                            <!-- End Income WK 5 -->
                            <td style="font-weight: bold; text-transform: uppercase;" align="center"> 
                                {{
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('service_type_id', 5)->where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>

                            <td align="center"> <!-- Monthly Sunday Income Average-->

                                
                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/1, 2)
                                }}

                                @else
                                0
                                @endif
                            </td>
                            <td colspan="3" rowspan="2" align="center" style="font-size: 14px; ">
                                {{

                                    (\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')) +
                                    (\App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount'))

                                }}
                            </td>
                        </tr>

                        
                        
                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Tithes</td>
                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 1)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 1 -->
                            
                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 2)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 2 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 3)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            
                            <!-- End Income WK 3 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 4)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            <!-- End Income WK 4 -->

                            <td colspan="4" style="font-weight: bold; text-transform: uppercase;" align="center">
                                {{
                                    \App\WeeklyReport::where('week', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>
                            
                            <!-- End Income WK 5 -->
                            <td style="font-weight: bold; text-transform: uppercase;" align="center"> 
                                {{
                                    \App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                                }} 
                            </td>

                            <td align="center"> <!-- Monthly Sunday Income Average-->

                                
                                @php
                                $weekx = \App\WeeklyReport::where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->pluck('week');
                                @endphp

                                @if(count($weekx) == 5)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id',  5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/5, 2)
                                }}

                                @elseif(count($weekx) == 4)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/4, 2)
                                }}

                                @elseif(count($weekx) == 3)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/3, 2)
                                }}

                                @elseif(count($weekx) == 2)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/2, 2)
                                }}

                                @elseif(count($weekx) == 1)
                                {{
                                    number_format((\App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 1)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 2)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 3)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +

                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 4)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') +


                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') +
                                    \App\WeeklyReport::where('week', 5)->where('service_type_id', 5)->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/1, 2)
                                }}

                                @else
                                0
                                @endif
                            </td>

                        </tr>

                        <!-- End Wednesday Services -->


                    </tbody>
                </table>
		</div>
    </body>
</html>
