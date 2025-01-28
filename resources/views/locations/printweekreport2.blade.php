
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
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{\Auth::user()->location->loc_name. ' Summmary report week ' . $reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->week.', '. date('F, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
        	<table id="example2" class="table table-bordered table-hover table-responsive" border="1" width="100%" data-options='{ "paging": false; "searching":false}'>
                    <thead>

                        <tr>
                            <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Days/Weeks</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WEEK {{ isset(\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->first()->week) ? \Carbon\Carbon::now()->weekNumberInMonth : \Carbon\Carbon::now()->weekNumberInMonth}} </td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">New Converts</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">First Timers</td>
                        </tr>
                        <tr>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">MALE</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FEMALE</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">CHILDREN</td>
                            <td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WEEK TOTAL</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                //Sundays//
                                $sMATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;
                                $sFATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;
                                $sCATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0;
                                
                                $sNC = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $sFT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;

                                $sTithe = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount : 0;

                                $sOffering = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_amount) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_amount : 0;

                                 $offcashS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash : 0;

                                $offposS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos : 0;

                                $offchequeS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer: 0;

                                $tithecashS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash : 0;

                                $titheposS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos : 0;

                                $thithechequeS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer: 0;


                                //Mondays
                                
                                $mMATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $mFATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $mCATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;
                                $mNC = isset($reports::where('service_type_other_id', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $mFT = isset($reports::where('service_type_other_id', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;



                                //Tuesdays
                                
                                $tMATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $tFATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $tCATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $tNC = isset($reports::where('service_type_id', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',4)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $tFT = isset($reports::where('service_type_id', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',4)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;




                                //Wednesday//
                                $wMATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;
                                $wFATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;
                                $wCATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0;

                                $wNC = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $wFT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;

                                $wTithe = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount : 0;


                                //Thursdays\\

                                $thMATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $thFATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $thCATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $thNC = isset($reports::where('service_type_other_id', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $thFT = isset($reports::where('service_type_other_id', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;


                                //Fridays\\

                                $friMATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $friFATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $friCATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $friNC = isset($reports::where('service_type_id', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',6)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $friFT = isset($reports::where('service_type_id', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',6)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;


                                //Saturday\\

                                $stMATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $stFATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $stCATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $stNC = isset($reports::where('service_type_other_id', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $stFT = isset($reports::where('service_type_other_id', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;





                                $offcashW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash : 0;

                                $offposW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos : 0;

                                $offchequeW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer: 0;

                                $tithecashW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash : 0;

                                $titheposW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos : 0;

                                $thithechequeW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer: 0;



                            @endphp
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Sunday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($sMATT)  }}</td>
                            <td align="center">{{number_format($sFATT,0)   }}</td>
                            <td align="center">{{number_format($sCATT, 0)    }}</td>
                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($sMATT + $sFATT + $sCATT,0)}}
                            </td>
                                <!-- Sunday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($sNC,0)   }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($sFT,0)   }}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CASH</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">POS/Transfer</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CHEQUES</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">SUB TOTAL</td>
                            <td  style="font-size:  14px;text-align: center; text-transform: uppercase;  font-weight: bold;" colspan="2">SUM TOTAL</td>
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($tithecashS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;"> {{ number_format($titheposS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($thithechequeS, 0)}}</td>

                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #f4ece5; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($tithecashS + $titheposS + $thithechequeS, 0)}}
                            </td>

                            
                            <td colspan="2" rowspan="2" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashS + $offposS + $offchequeS + $tithecashS + $titheposS + $thithechequeS, 0)}}
                            </td>
                        </tr>
                         <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offcashS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offposS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offchequeS, 0)}}</td>
                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashS + $offposS + $offchequeS, 0)}}
                            </td>
                            
                        </tr> -->
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Monday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($mMATT, 0)  }}</td>
                            <td align="center">{{number_format($mFATT, 0) }}</td>
                            <td align="center">{{number_format($mCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($mMATT + $mFATT + $mCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($mNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($mFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Tuesday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($tMATT, 0)  }}</td>
                            <td align="center">{{number_format($tFATT, 0) }}</td>
                            <td align="center">{{number_format($tCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($tMATT + $tFATT + $tCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($tNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($tFT,0) }}</td>
                        </tr>

                        <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Wednesday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($wMATT, 0)  }}</td>
                            <td align="center">{{number_format($wFATT, 0) }}</td>
                            <td align="center">{{number_format($wCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($wMATT + $wFATT + $wCATT,0)}}
                            </td>
                                <!-- Wednesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($wNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($wFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Thursday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($thMATT, 0)  }}</td>
                            <td align="center">{{number_format($thFATT, 0) }}</td>
                            <td align="center">{{number_format($thCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($thMATT + $thFATT + $thCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($thNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($thFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Friday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($friMATT, 0)  }}</td>
                            <td align="center">{{number_format($friFATT, 0) }}</td>
                            <td align="center">{{number_format($friCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($friMATT + $friFATT + $friCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($friNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($friFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Saturday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($stMATT, 0)  }}</td>
                            <td align="center">{{number_format($stFATT, 0) }}</td>
                            <td align="center">{{number_format($stCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($stMATT + $stFATT + $stCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($stNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($stFT,0) }}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CASH</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">POS/Transfer</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CHEQUES</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">SUB TOTAL</td>
                            <td  style="font-size:  14px;text-align: center; text-transform: uppercase;  font-weight: bold;" colspan="2">SUM TOTAL</td>
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($tithecashW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;"> {{ number_format($titheposW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($thithechequeW, 0)}}</td>

                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #f4ece5; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($tithecashW + $titheposW + $thithechequeW, 0)}}
                            </td>

                            
                            <td colspan="2" rowspan="2" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashW + $offposW + $offchequeW + $tithecashW + $titheposW + $thithechequeW, 0)}}
                            </td>
                        </tr>
                         <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offcashW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offposW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offchequeW, 0)}}</td>
                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashW + $offposW + $offchequeW, 0)}}
                            </td>
                        </tr> -->
                        <!--  <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="4" align="center" style="font-size: 18px;font-weight: bolder;">
                                {{ number_format($tithecashW , 0)}}
                            </td>
                        </tr> -->
                        <!-- End Wednesday Services -->
                    </tbody>
                </table>
		</div>
    </body>
</html>
