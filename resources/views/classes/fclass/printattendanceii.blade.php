
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
        <p class=" h6 text-uppercase" align="center"> {{ \Auth::user()->location->loc_name}} FOUNDATION CLASS 1 ATTENDANCE AS AT {{ date('jS M, Y') }}</p>
        @if(count($attendances)> 0)
        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; font-size: 10px;">S/No</th>
                <th width="20%" style="text-transform: uppercase; font-size: 10px;">Full Name</th>
                <th width="15%" style="text-transform: uppercase; font-size: 10px;"> Phone No</th>
                <th width="15%" style="text-transform: uppercase; font-size: 10px;">Category</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 1</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 2</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 3</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 4</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 5</th>
                <th style="text-transform: uppercase; text-align: center; font-size: 6px;"> Class 6</th>
                </tr>
            </thead>
             <tbody>
                @foreach($attendances as $count => $att)
                    <tr class="">
                        <td style="font-size: 10px;" align="center">{{++$count}}</td>
                        <td style="font-size: 10px;"> {{strtoupper(isset($att->people) ? $att->people->fullnames : "NA")}}</td>
                        <td style="font-size: 10px;"> {{strtoupper(isset($att->people) ? $att->people->phone1. ', '.$att->people->phone2 : "0") }}</td>
                        <td style="font-size: 10px;" align="">{{isset($att->people) ? $att->people->getCategory->cat_name : "NA" }}</td>
                        <!-- <td style="font-size: 10px;"> {{strtoupper(isset($att->people) ? $att->people->res_address : "NA") }}</td> -->
                        <td align="center">
                            @if($att->class_1_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($att->class_2_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($att->class_3_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($att->class_4_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($att->class_5_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                        <td align="center">
                            @if($att->class_6_status == 1)
                            <strong>P</strong>
                            @else

                            @endif
                        </td>
                </tr>
                @endforeach
            </tbody>
      </table> 
      @else
      
      @endif  
      <br><br><br>          
        <p class="text-uppercase text-bold">Authorization Signature_______________________________________________________________Date:______________________________________</p>
    </body>
</html>