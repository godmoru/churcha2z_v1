
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
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{\Auth::user()->location->loc_name. ' Report Summmary for the year '. date('Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example2" class="table table-bordered table-hover table-responsive" border="1" width="100%" data-options='{ "paging": false; "searching":false}'>
            <thead>
               
                <tr>
                    <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="" colspan="">Weeks/Month</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="6">Attendance by weeks</td>
                    <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="6">Income by weeks</td>
                    <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="" colspan="4">Summary</td>
                </tr>
                
            </thead>
            <tbody>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;" rowspan="" colspan="">Month</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 1</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 2</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 3</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 4</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 5</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">Total</td>
                    <!-- End Attendance -->
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 1</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 2</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 3</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 4</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WK 5</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">Total</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">Att Total</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">Income Total</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">ATT AVG</td>
                    <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">INCOME AVG</td>
                    <!-- End Income -->
                </tr>
                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">January</td>
                    <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <!-- <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 2)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 3)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 4)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 5)->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td> -->

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                     <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>

                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">February</td>
                    <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">March</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>

                     <!-- End Summary -->

                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">April</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>
                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->

                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">May</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">June</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>
                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">July</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">August</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>

                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">September</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">October</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                     <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>

                     <!-- End Summary -->

                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">November</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>
                     <!-- End Summary -->
                </tr>

                <tr>
                    <td style="font-weight: bold; text-transform: uppercase;">December</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>


                     <!-- end attendance -->

                     <!-- begin Income -->

                     <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 1)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 1)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>
                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 2)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 2)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 3)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 3)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 4)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 4)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                    <td align="center">{{number_format(
                            \App\WeeklyReport::where('week', 5)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + 
                            \App\WeeklyReport::where('week', 5)->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                         ,0) }}
                    </td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <!-- end Income -->

                    <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/9
                     ,2) }}</td>

                     <td align="center">{{number_format((\App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/9
                     ,2) }}</td>

                     <!-- End Summary -->

                </tr>  

                <tr style="font-weight: bold; text-transform: uppercase;">
                    <td>Sub Total</td>
                    <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 1)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 1)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 2)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 2)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>
                    <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 4)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 4)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('week', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('week', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                    <td align="center">{{number_format(\App\WeeklyReport::where('week', 1)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 2)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 3)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>
                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 4)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 4)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('week', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('week', 5)->where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>

                    <td align="center">{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount') 
                     ,0) }}</td>

                     <!-- begin Summary -->
                     <td align="center" style="font-weight: bold;">{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children')
                     ,0) }}</td>

                     <td align="center">{{number_format(\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount')
                     ,0) }}</td>

                     <td align="center" style="font-weight: bold;">{{number_format((\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_male') +
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_female')+
                    \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('attendance_children'))/12
                     ,2) }}</td>


                     <td align="center">{{number_format((\App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('offering_amount') + \App\WeeklyReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('location_id', \Auth::user()->location_id)->sum('tithe_amount'))/12
                     ,2) }}</td>

                     <!-- End Summary -->

                </tr>

            </tbody>
            </table>
		</div>
    </body>
</html>
