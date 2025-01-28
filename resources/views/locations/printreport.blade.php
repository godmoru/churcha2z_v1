
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' '.$service->name .' Attendance - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h6 text-uppercase" align="center" style="font-family: arial;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' '.$service->name .' Attendance - '. date('M dS, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table id="attendanceData" class="table table-bordered">
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">S/No</th>
                <th width="20%"style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Counting Area</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> Male</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Female</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Children</th>
                <th width="12%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Total</th>
                
            </thead>
             <tbody>
                @foreach($svcAtt as $count => $svcAttData)
                <tr>
                    <td style="font-size: 11px;">{{++$count}}</td>
                    <td style="font-size: 11px;">{{$svcAttData->countArea->name}}</td>
                    <td align="center" style="font-size: 11px;" class="male">
                        @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center" style="font-size: 11px;" class="female" >
                        @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center" style="font-size: 11px;" class="children">
                        @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center" style="font-size: 11px;" class="total">
                        @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)  + $fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)  + $fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)  + $fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)  + $fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('male'),0)  + $fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('female'),0) + $fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',$svcAttData->count_area_id)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2">
                        Grand Total
                    </td>
                    <td align="center">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('male'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('female'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('children'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>

                    <td align="center">
                        @if($service->id ==1)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}

                        @elseif($service->id ==2)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 2)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}

                        @elseif($service->id ==3)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 3)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}

                        @elseif($service->id ==4)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 4)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}
                        
                        @elseif($service->id ==5)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 5)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}

                        @elseif($service->id ==6)
                        {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 6)->where('service_date', $svcAttData->service_date)->sum('children'), 0) }}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>

                    
                </tr>
                <tr>
                    <td colspan="3" style="font-size: 12px;">Counter:  {{ ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. \Auth::user()->first_name.' '.\Auth::user()->last_name}}</td>
                    <td colspan="3" style="font-size: 12px;">Signature:.......................................... Date........................</td>
                </tr>
                <tr>
                    <td colspan="3" style="font-size: 12px;">HOD/Coordinator: </td>
                    <td colspan="3" style="font-size: 12px;">Signature:.......................................... Date........................</td>
                </tr>
            </tbody>
      </table> 
     
        </div>
    </div> 
    </body>
</html>
