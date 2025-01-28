
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : "Service Vehicle Count"}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 50px; width: 60px;" align="center">
    </div>
        <p class="h6 " align="center" style="font-family: ">DUNAMIS INTERNATIONAL GOSPEL CENTER</p> 
        <p class=" h6 text-uppercase" align="center"> {{ \Auth::user()->location->loc_name. ' '.$service->name}} vehicle count on {{ date('jS F, Y')}}</p>
    <div class="row">
        <div class="col-md-7">
        @if(count($svcAtt)> 0)
        <table id="attendanceData" class="table table-bordered">
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">S/No</th>
                <th width="8%"style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Car park</th>
                <th width="20%"style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> park Description</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> Total</th>
                
            </thead>
             <tbody>
                @foreach($svcAtt as $count => $svcAttData)



                <tr>
                    <td>{{++$count}}</td>
                    <td style="font-size: 11px;">{{$svcAttData->countingArea->name}}</td>
                    <td style="font-size: 11px;">{{$svcAttData->countingArea->description}}</td>
                    <td align="center" style="font-size: 11px;" class="male">
                        @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 1)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', $svcAttData->service_date)->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 2)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 3)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 4)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 5)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 6)->where('vehicle_counting_area_id',$svcAttData->vehicle_counting_area_id)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                </tr>
                @endforeach

                <tr>
                  <td colspan="3">Grand Total</td>
                  <td align="center">
                     @if($svcAttData->service_id ==1)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 1)->where('service_date', $svcAttData->service_date)->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==2)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==3)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}
                        @elseif($svcAttData->service_id ==4)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==5)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}

                        @elseif($svcAttData->service_id ==6)
                        {{$fm = number_format(\App\VehicleAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}
                        @else
                        {{$fm = 0}}
                        @endif
                  </td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Note:</strong><br><br><br><br></td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 12px;">Counter:  {{ ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. \Auth::user()->first_name.' '.\Auth::user()->last_name}}</td>
                    <td colspan="2" style="font-size: 12px;">Signature:............................................................................................ Date................................</td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 12px;">HOD/Coordinator: </td>
                    <td colspan="2" style="font-size: 12px;">Signature:............................................................................................ Date................................</td>
                </tr>

            </tbody>
      </table> 
      @else
        <div class="jumbotron">
          <h4>You have no data for the vehicle attendance for this service.</h4>
        </div>
      @endif  
        </div>
    </div>
    </body>
</html>
