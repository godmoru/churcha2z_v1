
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
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 80px; width: 100px;" align="center">
    </div>
        <p class="h4 " align="center" style="font-family: ; ">DUNAMIS INTERNATIONAL GOSPEL CENTER</p> 
        <p class=" h6 text-uppercase" align="center"> {{ \Auth::user()->location->loc_name.' - '.$district->dis_name}} DISTRICT CONVERTS LIST AS AT {{ date('jS M, Y')}}</p>

        @if(count($converts)> 0)
        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
          <thead>
            <tr>
                <th width="2%" style="text-transform: uppercase; font-size: 13px;">S/No</th>
                <th width="25%" style="text-transform: uppercase; font-size: 13px;">Full Name</th>
                <th width="13%" style="text-transform: uppercase; font-size: 13px;"> Phone No</th>
                <th width="14%" style="text-transform: uppercase; font-size: 13px;">Category</th>
                <th width="36%" style="text-transform: uppercase; font-size: 13px; text-align: center;"> Address</th>
                </tr>
            </thead>
             <tbody>
                @foreach($converts as $count => $convt)
                <tr class="odd gradeX">
                    <td style="font-size: 12px;" >{{ ++$count }}</td>  
                    <td style="font-size: 12px;" >{{ strtoupper($convt->fullnames) }}</td>
                    <td style="font-size: 12px;" >{{ $convt->phone1 }}</td>
                    <td style="font-size: 12px;" align="" >{{isset($convt->getCategory) ? $convt->getCategory->short_name : "Not Defined" }}</td>
                    <td style="font-size: 11px;" align="" >{{ $convt->res_address }}</td>
                </tr>
                @endforeach
            </tbody>
      </table> 
      @else
      <br><br><br>
      <div class=" text-center text-uppercase">
          <h4>There are no Converts for the selected date. <br><br><br>Thank you</h4>
      </div>
      @endif               
               
    </body>
</html>
