
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
            <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="25%">Location</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Jan &nbsp; </th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Feb &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Mar &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Apr &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">May &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Jun &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Jul &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Aug &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Sept &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Oct &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Nov &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Dec &nbsp;</th>
                        <th> Total</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($locations as $count => $loc)
                                <td>{{ ++$count }}</td>  
                                <td> <b>{{ $loc->loc_name }}</b></td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 1)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 2)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 3)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 4)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 5)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 6)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 7)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 8)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 9)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 10)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 11)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->where('month', 12)->sum('amount')),2) }}</td>
                                <td align="center">{{ number_format((\App\LocationExpenditure::whereBetween('expenditure_type_id', [1,8])->where('location_id', $loc->id)->where('year', date("Y"))->sum('amount')),2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>
        </div>
    </body>
</html>
