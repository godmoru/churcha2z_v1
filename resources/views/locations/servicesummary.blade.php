
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' '.$service->name .' Attendance Summary - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h6 text-uppercase" align="center" style="font-family: arial;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' '.$service->name .' Attendance Summary - '. date('M dS, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table id="attendanceData" class="table table-bordered">
          <thead>
            <tr>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;" rowspan="2">{{$service->name}}</th>
                <th width="7%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> Male</th>
                <th width="7%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Female</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Children</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Alter Call</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">First Timers</th>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Grand Total</th>
            </thead>
             <tbody>
                <tr>
                    <td align="center" style="font-size: 11px;">
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                    <td align="center" style="font-size: 11px;">
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                    
                    <td align="center" style="font-size: 11px;">
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>

                    <td align="center" style="font-size: 11px;">
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 11px;" colspan="">Alter Call: 
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                    <td  align="center" style="font-size: 11px;" colspan="2">New Timers: 
                        <strong>
                            
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                    <td align="center" style="font-size: 11px;"> Healing:
                        <strong>
                            
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male')  + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female')  + $fm =\App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 23)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>
                    <td align="center"><!-- Alter calls -->
                        
                    </td>
                    <td align="center"><!-- First Timers -->
                        
                    </td>
                    <td align="center" style="font-size: 11px;" colspan="">Total Vehicles Counted:
                        <strong>
                        @if($service->id ==1)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                        </strong>
                    </td>

                </tr>
                <tr>
                    <td colspan="7"><strong>Note:</strong><br><br></td>
                </tr>
                <tr>
                    <td colspan="4" style="font-size: 12px;">Counter:  {{ ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. \Auth::user()->first_name.' '.\Auth::user()->last_name}}</td>
                    <td colspan="3" style="font-size: 12px;">Signature:................................................... Date........................</td>
                </tr>
                <tr>
                    <td colspan="4" style="font-size: 12px;">HOD/Coordinator: </td>
                    <td colspan="3" style="font-size: 12px;">Signature:................................................... Date........................</td>
                </tr>
            </tbody>
      </table> 
     
        </div>
    </div> 
    </body>
</html>
