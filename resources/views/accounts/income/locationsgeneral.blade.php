@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> locations generic reports </strong> 
                <div class="pull-right" align="right">
                    <a href="{{ route('printlocationgeneralstatement') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                    <a data-toggle="modal" data-target="#exportyearmonthlysummary" class="btn btn-xs btn-success"> <i class="icon-download"></i>Export</a>
                    <a data-toggle="modal" data-target="#yearmonthlysummary" class="btn btn-xs btn-primary"> <i class="icon-search"></i>Search</a>
                </div>
            </div>
            <div class="card-body">
                

                <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="9" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Report as at - {{ $date }}
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
                            <td width="18%" colspan="2" style="text-transform: uppercase; font-weight: bold"> <a href="{{route('accounts.locationReport', \Crypt::encrypt($location->id))}}">{{$location->loc_name}}</a> </td>
                            <td align="right" width="9%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('amount') ), 2) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', $year)->where('location_id', $location->id)->sum('amount') ), 2)
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques') - \App\LocationExpenditure::where('year', $year)->where('location_id', $location->id)->sum('amount')), 2)
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
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->sum('cash') + \App\IncomeReport::where('year', $year)->sum('pos') + \App\IncomeReport::where('year', $year)->sum('cheques')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', $year)->where('month', $month)->sum('amount')), 2) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\LocationExpenditure::where('year', $year)->sum('amount')), 2) 
                                }}
                            </td>
                            
                           
                            <td align="right" style="font-weight: normal;">&#8358;
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cheques')), 0) 
                                }}
                            </td>
                            

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('accounts.income.modals.exportyearmonthlysummary')
@include('accounts.income.modals.yearmonthlysummary')
@endsection