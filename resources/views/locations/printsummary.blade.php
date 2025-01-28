
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' ' .' Attendance Summary - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 43px; width: 50px;" align="center">
        <p class="h6 text-uppercase" align="center" style="font-family: arial;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' ' .' Attendance summary - '. date('M dS, Y')}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table id="attendanceData" class="table table-bordered" width="100%">
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">S/No</th>
                <th width="11%"style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Service</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> Male</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Female</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Children</th>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Alter Call</th>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">First Timers</th>
                <th width="12%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Reg. Alter Call</th>
                <th width="13%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Reg. First Timers</th>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Total</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Vehicles</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">% Index</th>
            </tr>
            </thead>.
             <tbody>
                @foreach($services as $count => $service)
                <?php 
                    $fsvcftimr = \App\People::where('service_id',1)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $secsvcftimr = \App\People::where('service_id',2)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $thirdsvcftimr = \App\People::where('service_id',3)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $forthsvcftimr = \App\People::where('service_id',4)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $fifthsvcftimr = \App\People::where('service_id',5)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $sixthsvcftimr = \App\People::where('service_id',6)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

                    $fsvcnewconverts = \App\People::where('service_id',1)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $secsvcnewconverts = \App\People::where('service_id',2)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $thirdsvcnewconverts = \App\People::where('service_id',3)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $forthsvcnewconverts = \App\People::where('service_id',4)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $fifthsvcnewconverts = \App\People::where('service_id',5)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                    $sixthsvcnewconverts = \App\People::where('service_id',6)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                ?>
                <tr>
                    <td style="font-size: 12px;">{{++$count}}</td>
                    <td style="font-size: 14px;">{{$service->name}}</td>
                    <td align="center" style="font-size: 12px;">
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
                    </td>
                    <td align="center" style="font-size: 12px;">
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
                    </td>


                    <td align="center" style="font-size: 12px;">
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
                    </td>
                    
                    
                    

                    <td align="center" style="font-size: 12px;">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id',21)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center" style="font-size: 12px;">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id',22)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>

                    <td align="center" style="font-size: 12px;">
                        @if($service->id == 1)
                        {{number_format(count($fsvcnewconverts),0)}}
                        @elseif($service->id == 2)
                        {{number_format(count($secsvcnewconverts),0)}}
                        @elseif($service->id == 3)
                        {{number_format(count($thirdsvcnewconverts),0)}}
                        @elseif($service->id == 4)
                        {{number_format(count($forthsvcnewconverts),0)}}
                        @elseif($service->id == 5)
                        {{number_format(count($fifthsvcnewconverts),0)}}
                        @elseif($service->id == 6)
                        {{number_format(count($sixthsvcnewconverts),0)}}
                        @else
                        0
                        @endif
                    </td>
                    <td align="center" style="font-size: 12px;">
                        @if($service->id == 1)
                        {{number_format(count($fsvcftimr),0)}}
                        @elseif($service->id == 2)
                        {{number_format(count($secsvcftimr),0)}}
                        @elseif($service->id == 3)
                        {{number_format(count($thirdsvcftimr),0)}}
                        @elseif($service->id == 4)
                        {{number_format(count($forthsvcftimr),0)}}
                        @elseif($service->id == 5)
                        {{number_format(count($fifthsvcftimr),0)}}
                        @elseif($service->id == 6)
                        {{number_format(count($sixthsvcftimr),0)}}
                        @else
                        0
                        @endif
                    </td>
                    

                    <td align="center" style="font-size: 12px;">
                        @if($service->id ==1)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==2)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==3)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==4)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==5)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @elseif($service->id ==6)
                        {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                        @else
                        {{$fm = 0}}
                        @endif
                    </td>
                    <td align="center">
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
                  </td>
                    
                    <td align="center">
                        0.00
                    </td>


                </tr>
                @endforeach
                <tr>

                    <td colspan="2" class="text-uppercase"> <strong>Grand Total </strong></td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                        {{ $m = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}
                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                        {{ $fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}
                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                        {{ $ch = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                        {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',21)->sum('male') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',21)->sum('female') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',21)->sum('children'),0)}}
                        </strong>
                    </td>

                    <td align="center" style="font-size: 13px;">
                        <strong>
                            
                        {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',22)->sum('male') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',22)->sum('female') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->where('count_area_id',22)->sum('children'),0)}}
                        </strong>
                    </td>

                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format(count($fsvcnewconverts) + count($secsvcnewconverts) + count($thirdsvcnewconverts) + count($forthsvcnewconverts) + count($fifthsvcnewconverts) + count($sixthsvcnewconverts),0)}}
                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format(count($fsvcftimr) + count($secsvcftimr) + count($thirdsvcftimr) + count($forthsvcftimr) + count($fifthsvcftimr) + count($sixthsvcftimr),0)}}
                        </strong>
                    </td>
                    
                    <td align="center" style="font-size: 13px;">
                        <strong>
                        {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                        </strong>
                    </td>
                    <td>{{$fm = number_format(\App\VehicleAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}} </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>00.00</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="12"><strong>Note:</strong><br><br><br></td>
                </tr>
                <tr>
                    <td colspan="6" style="font-size: 12px;">Counter:  {{ ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. \Auth::user()->first_name.' '.\Auth::user()->last_name}}</td>
                    <td colspan="6" style="font-size: 12px;">Signature:..................................................................................... Date................................</td>
                </tr>
                <tr>
                    <td colspan="6" style="font-size: 12px;">HOD/Coordinator: </td>
                    <td colspan="6" style="font-size: 12px;">Signature:..................................................................................... Date................................</td>
                </tr>
            </tbody>
      </table> 
     
        </div>
    </div> 
    </body>
</html>
