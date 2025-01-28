
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
        <p class="h6 text-uppercase text-bold" align="center" style="font-family: arial;"><strong>DUNAMIS INTERNATIONAL GOSPEL CENTER <br> {{ \Auth::user()->location->loc_name. ' ' .' Attendance summary - Between '. $dfrom .' and '. $dto }} </strong> </p>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table id="attendanceData" class="table table-bordered" width="100%">
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">S/No</th>
                <th width="11%"style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Count Area</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;"> Male</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Female</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Children</th>
                <th width="10%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Total</th>
                <!-- <th width="8%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">Vehicles</th> -->
                <!-- <th width="9%" style="text-transform: uppercase; text-align: center; font-weight: bolder; font-size: 11px;">% Index</th> -->
            </tr>
            </thead>.
             <tbody>

                <tr>
                    <td style="font-size: 12px;">{{'1'}}</td>
                    <td style="font-size: 14px; text-transform: uppercase;">{{'Mian Bowl'}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($mbmals, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($mbfems, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($mbchild, 0)}}</td>
                    <td align="center" style="font-size: 12px;"> {{number_format($mbmals + $mbfems + $mbchild, 0)}}</td>
                    
                    <!-- <td align="center">
                        0.00
                    </td> -->
                </tr>

                <tr>
                    <td>2</td>
                    <td style="font-size: 14px; text-transform: uppercase;">{{'Under Gallery'}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($undglrymals, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($undglryfems, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($undglrychild, 0)}}</td>
                    <td align="center" style="font-size: 12px;"> {{number_format($undglrymals + $undglryfems + $undglrychild, 0)}}</td>

                  <!--   
                    <td align="center">
                        0.00
                    </td> -->
                </tr>

                <tr>
                    <td style="font-size: 12px;">{{'3'}}</td>
                    <td style="font-size: 14px; text-transform: uppercase;">{{'Gallery I'}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry1mals, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry1fems, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry1child, 0)}}</td>
                    <td align="center" style="font-size: 12px;"> {{number_format($glry1mals + $glry1fems + $glry1child, 0)}}</td>
                    
                    <!-- <td align="center">
                        0.00
                    </td> -->
                </tr>

                <tr>
                    <td style="font-size: 12px;">{{'4'}}</td>
                    <td style="font-size: 14px; text-transform: uppercase; ">{{'Gallery II'}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry2mals, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry2fems, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($glry2child, 0)}}</td>
                    <td align="center" style="font-size: 12px;"> {{number_format($glry2mals + $glry2fems + $glry2child, 0)}}</td>
                    
                   <!--  <td align="center">
                        0.00
                    </td> -->
                </tr>

                <tr>
                    <td style="font-size: 12px;">{{'5'}}</td>
                    <td style="font-size: 14px; text-transform: uppercase; ">{{'Overflows'}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($ovrflowmals, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($ovrflowfems, 0)}}</td>
                    <td align="center" style="font-size: 12px;">{{number_format($ovrflowchild, 0)}}</td>
                    <td align="center" style="font-size: 12px;"> {{number_format($ovrflowmals + $ovrflowfems + $ovrflowchild, 0)}}</td>
                    
                   <!--  <td align="center">
                        0.00
                    </td> -->
                </tr>

                <tr>

                    <td style="text-transform: uppercase;" colspan="2" class="text-uppercase"> <strong>Grand Total </strong></td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format($mbmals + $undglrymals + $glry1mals + $glry2mals + $glry2mals + $ovrflowmals, 0)}}
                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format($mbfems + $undglryfems + $glry1fems + $glry2fems + $ovrflowfems, 0)}}

                        </strong>
                    </td>
                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format($mbchild + $undglrychild + $glry1child + $glry2child + $ovrflowchild, 0)}}

                        </strong>
                    </td>
                    
                    <td align="center" style="font-size: 13px;">
                        <strong>
                            {{number_format($mbmals + $mbfems + $mbchild + $undglrymals + $undglryfems + $undglrychild + $glry1mals + $glry1fems + $glry1child + $glry2mals + $glry2fems + $glry2child + $glry2mals + $glry2fems + $glry2child + $ovrflowmals + $ovrflowfems + $ovrflowchild, 0)}}
                        </strong>
                    </td>
                    <!-- <td align="center">
                        <strong>
                        {{$fm = number_format(\App\VehicleAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}} 
                        </strong>
                    </td> -->
                    <!-- <td align="center" style="font-size: 13px;">
                        <strong>00.00</strong>
                    </td> -->
                </tr>
                <tr>
                    <td  style="text-transform: uppercase;" colspan="2" ><strong>Alter Call</strong></td>
                    <td align="center" colspan="2">{{number_format($spACMale + $spACFemale + $spACChildren,0)}}</td>
                    <td style="text-transform: uppercase; text-align: center;" colspan="2"><strong> Summary Percentage </strong>(%)</td>
                </tr>

                <tr>
                    <td style="text-transform: uppercase;" colspan="2"><strong>First Timers</strong></td>
                    <td align="center" colspan="2">{{number_format($spFTMale + $spFTFemale + $spFTChildren,0)}}</td>
                    <td  style="text-transform: uppercase;" ><strong>Male:</strong></td>
                    <td align="center">
                         <!-- {{ $m = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children') /100 * \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),2)}} --> --
                    </td> <!-- %percentages of all male -->
                    <!-- <td rowspan="3"> Appreciated by 4.23% from last service</td> -->
                </tr>

                <tr>
                    <td  style="text-transform: uppercase;" colspan="2" ><strong>Healings</strong></td>
                    <td align="center" colspan="2">{{$fm = number_format($spHLMale + $spHLFemale + $spHLChildren,0)}}</td>

                    <td style="text-transform: uppercase;" ><strong>Female:</strong></td>
                    <td align="center">--</td> <!-- %percentages of all female -->

                </tr>

                <tr>
                    <td  style="text-transform: uppercase;" colspan="2" ><strong>Vehicles/Cars</strong></td>
                    <td align="center" colspan="2">{{$fm = number_format(\App\VehicleAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('total'),0)}}</td>
                    <td style="text-transform: uppercase;" ><strong>Children:</strong></td>
                    <td align="center">--</td><!-- %percentages of all children -->
                </tr>
                <tr>
                    <td colspan="6"><strong>Comments/Remarksd:</strong><br><br></td>
                </tr>
                <tr>
                    <td colspan="3" style="font-size: 12px;">Counter:  {{ ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. ' '. \Auth::user()->first_name.' '.\Auth::user()->last_name}}</td>
                    <td colspan="3" style="font-size: 12px;"><br>Signature:..................................................................................... Date................................</td>
                </tr>
                <tr>
                    <td colspan="3" style="font-size: 12px;">HOD/Coordinator: </td>
                    <td colspan="3" style="font-size: 12px;"><br>Signature:..................................................................................... Date................................</td>
                </tr>
            </tbody>
      </table> 
     
        </div>
    </div> 
    </body>
</html>
