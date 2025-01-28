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
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 90px; width: 120px;" align="center">
    </div>
        <p class="h3 " align="center" style="font-family: ">DUNAMIS INTERNATIONAL GOSPEL CENTER</p> 
        <p class=" h5 text-uppercase" align="center"> {{ \Auth::user()->location->loc_name}} CONVERTS LIST AS AT {{ date('jS M, Y')}}</p>

        @if(count($converts)> 0)
        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase;">S/No</th>
                <th width="25%" style="text-transform: uppercase;">Full Name</th>
                <!-- <th width="22%">Location</th> -->
                <!-- <th style="text-transform: uppercase;"> e-Mail</th> -->
                <th width="10%" style="text-transform: uppercase;"> Phone No</th>
                <th width="11%" style="text-transform: uppercase;">Category</th>
                <th width="5%" style="text-transform: uppercase;">SVC</th>
                <th width="8%" style="text-transform: uppercase; text-align: center;">Found. Class</th>
                <th width="7%" style="text-transform: uppercase; text-align: center;">DLTC</th>
                <th style="text-transform: uppercase; text-align: center;"> Address</th>
                </tr>
            </thead>
             <tbody>
                @foreach($converts as $count => $convt)
                <tr class="odd gradeX">
                    <td>{{ ++$count }}</td>  
                    <td><b>{{ strtoupper($convt->fullnames) }}</b></td>
                    <!-- <td>{{ $convt->Location}}</td> -->
                    <!-- <td>{{ $convt->email }}</td> -->
                    <td>{{ $convt->Phone1 }}</td>
                    <td align="center">{{$convt->Category }}</td>
                    <td align="center">
                        @if($convt->Service  == 1)
                        1st
                        @elseif($convt->Service  == 2)
                        2nd 
                        @elseif($convt->Service  == 3)
                        3rd
                        @elseif($convt->Service  == 4)
                        4th
                        @elseif($convt->Service  == 5)
                        5th
                        @else
                        1st
                        @endif
                    </td>

                    <td align="center">
                        @if($convt->fclass_status  == 1)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td align="center">
                        @if($convt->dltc_status  == 1)
                        Yes
                        @else
                        No
                        @endif
                    </td>
                    <td align="">{{ $convt->res_address }}</td>
                </tr>
                @endforeach
            </tbody>
      </table> 
      @else
      <br><br><br>
      <div class=" text-center text-uppercase">
          <h4>There are no Converts for the selected criterial. Make sure the search critierias are properly selected. <br><br><br>Thank you</h4>
      </div>
      @endif               
               
    </body>
</html>
