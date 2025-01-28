
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
        <title>{{ config('app.name', 'DIGC eManager') }} | {{isset($pageName) ? $pageName : \Auth::user()->location->loc_name. ' ' .' Weekly Report for - '. date('M dS, Y')}}</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body onclick="window.print();"> 
        
    <div class="row">
        <div class="col-md-12">
            <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="9" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Financial Report as at - {{ date('F, Y')}}
                            </th>
                        </tr>
                        <tr>
                            <td  colspan="3" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                <br>Branch Name
                            </td>
                            <td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Income summary"}}</td>
                            <td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Expenditure summary"}}</td>
                            <td colspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Balance"}}</td>
                        </tr>

                        <tr>
                            <th width="18%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Month Total &nbsp; </th>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Year Total</td>
                            <th width="18%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Month Total &nbsp; </th>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Year Total</td>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Balance</td>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $count => $location)
                        <tr>
                            <td>{{++$count}}</td>
                            <td width="18%" colspan="2" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
                            <td align="right" width="9%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('amount') ), 2) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->sum('amount') ), 2)
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cheques') - \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->sum('amount')), 2)
                                }}
                            </td>
                            <td align="right" width="19%">
                                
                            </td>
                            
                            
                        </tr>
                        
                        @endforeach
                        <tr>
                            <td colspan="3" style="font-weight: bold;">Grand Totals</td>
                            
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->sum('cash') + \App\IncomeReport::where('year', date('Y'))->sum('pos') + \App\IncomeReport::where('year', date('Y'))->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', date('Y'))->where('month', date('m'))->sum('amount')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', date('Y'))->sum('amount')), 2) 
                                }}
                            </td>
                            
                           
                            <td align="right" style="font-weight: normal;">&#8358;
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cheques')), 0) 
                                }}
                            </td>
                            

                        </tr>

                    </tbody>
                </table>
        </div>
    </body>
</html>
