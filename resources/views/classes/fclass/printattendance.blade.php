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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : "Converts Printout"}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 100px; width: 120px;" align="center">
    </div>
        <p class="h4 " align="center" style="font-family: ">DUNAMIS INTERNATIONAL GOSPEL CENTER</p> 
        <p class=" h6 text-uppercase" align="center"> {{ \Auth::user()->location->loc_name}} FOUNDATION CLASS ATTENDANCE AS AT {{ date('jS M, Y') }}</p>
        @if(count($attendances)> 0)
        <table id="example2" border="1" class="table table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; font-size: 12px;">S/No</th>
                <th width="29%" style="text-transform: uppercase; font-size: 12px;">Full Name</th>
                <th width="10%" style="text-transform: uppercase; font-size: 12px;"> Phone No</th>
                <th width="20%" style="text-transform: uppercase; font-size: 12px;">Category</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Class 1</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Class 2</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Class 3</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Class 4</th>
                <th width="8%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Class 5</th>
                <th width="9%" style="text-transform: uppercase; text-align: center; font-size: 12px;"> Remarks</th>
                </tr>
            </thead>
             <tbody>
                <?php $sn = 1;?>
                @foreach($attendances as $attendance)
                    <tr class="">
                        <td style="font-size: 12px;" align="center">{{$sn}}</td>
                        <td style="font-size: 12px;"> {{strtoupper($attendance->fullnames)}}</td>
                        <td style="font-size: 12px;"> {{strtoupper($attendance->Phone1)}}</td>
                        <td style="font-size: 12px;"> {{strtoupper($attendance->Category)}}</td>
                        <td align="center">
                            @if($attendance->C1 == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($attendance->C2 == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($attendance->C3 == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($attendance->C4== 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($attendance->C5 == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            
                        </td>
                <?php $sn++;?>
                @endforeach 
                </tr>
            </tbody>
      </table> 
      @else
      <p class="h4 text-uppercase" align="center">There is no person in the selected class</p>
      @endif  
      <br><br><br>          
        <p class="text-uppercase text-bold">Authorization Signature_______________________________________________________________Date:______________________________________</p>
    </body>
</html>

