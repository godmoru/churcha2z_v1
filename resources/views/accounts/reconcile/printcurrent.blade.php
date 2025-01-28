
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName :  'Account Reconciliation - '. date('F, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{'Account reconciliation for the month of ' .
        date("F, Y")}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
          <table id="" class="table table-bordered table-hover" id="amount" >
            <thead>
              <tr>
                <th>S/No</th>
                <th>Location Name</th>
                <!-- <th>Host State</th> -->
                <th>Last Months Total</th>
                <th>Cash at Bank</th>
                <th>Tithe (10%)</th>
                <th>Kingdom Practice (2%)</th>
                <th>Salaries (16%)</th>
                <th>Missions (10%)</th>
                <th>Reserves (5%)</th>
                <th ><center>Recurrent (30%)</center></th>
                <th ><center>Housing (7%)</center></th>
                <th>Location Proj. (20%)</th>
                <th>Travel </th>
                <th>Packing </th>
                <th>Marriage Support.</th>
                <th>Bereavement</th>
              </tr>
            </thead>
                <tbody>
                  <tr class="odd gradeX">
                  @foreach($locations as $count => $locs)
                    <td>{{ ++$count }}</td>  
                    <td><a href="{{route('locations.one', \Crypt::encrypt($locs->id)) }}"> <b>{{ $locs->loc_name }}</b></a></td>
                    <!-- <td>{{ isset($locs->loc_state) ? $locs->loc_state->state : "Foreign" }} </td> -->
                    <td width="9%"><input type="text" class="form-control" name="" readonly value="&#8358;{{number_format(\App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('cash') + \App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('pos') + \App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('cheques'),2)}}"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
              @endforeach
              <tr>
                <td colspan="2">
                    Grand Totals
                </td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
                <td> <div id="titheSum"></div></td>
            </tr>
          </tbody>
        </table>            
      </div>
    </body>
</html>
