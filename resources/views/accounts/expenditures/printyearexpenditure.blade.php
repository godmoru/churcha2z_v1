
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : 'YEAR EXPENDITURE' . date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        <div class="" align="center">
        <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 53px; width: 60px;" align="center">
        <p class="h5 text-uppercase" align="center" style="font-family: Arial; font-weight: bold;">DUNAMIS INTERNATIONAL GOSPEL CENTER <br>{{' EXPENDITURE Summmary ' .date("Y")}}  </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="example2" border="1" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                <thead>
                    
                    <tr>
                        <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                            <br>Branch Name
                        </td>
                        <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand Summary</td>

                    </tr>

                    <tr>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Total Expenditure &nbsp; </th>
                        <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Remarks</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                    <tr>
                        <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
                        <td align="right">
                        &#8358; {{
                            number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->sum('amount')), 2) 
                        }}
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td style="text-transform: uppercase; font-weight: bolder; font-size: 1.5em;">Grand Total</td>
                        <td style="font-size: 1.5em; text-align: right; font-weight: bold;"> &#8358; {{
                            number_format(( \App\LocationExpenditure::where('year', date('Y'))->sum('amount')), 2) 
                        }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
