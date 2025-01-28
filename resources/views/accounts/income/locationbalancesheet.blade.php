@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> Income by locations </strong> 
                <div class="pull-right" align="right">
                    <a href="{{ route('income.printlocationsmonthly') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                    <a data-toggle="modal" data-target="#vyearmonth" class="btn btn-warning btn-xs"> <i class="icon-search"></i> All Query</a>
                    <a data-toggle="modal" data-target="#exportyearmonthly" class="btn btn-primary btn-xs"> <i class="icon-download"></i>Export</a>
                    <a data-toggle="modal" data-target="#vmonth" class="btn btn-success btn-xs"> <i class="icon-search"></i> Location Query</a>
                    <!-- <a data-toggle="modal" data-target="#fetchLocationData" class="btn btn-xs btn-success"> <i class="icon-download"></i> Get By Location/Period</a> -->
                </div>
            </div>
            <div class="card-body">
                

                <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="10" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                {{ $location->loc_name }} Balance Sheet - {{ $date }}
                            </th>
                        </tr>
                        <tr>
                            <td  colspan="3" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                <br>Branch Name
                            </td>
                            <td colspan="7" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Income summary"}}</td>
                        </tr>

                        <tr>
                            @foreach(\App\IncomeReportSource::all() as $source )
                            <th style="text-align: center; text-transform: uppercase; font-weight: bold;">
                                {{$source->name}}
                            </th>
                            @endforeach
                            <th width="18%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Month Total &nbsp; </th>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;">Year Total</td>
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
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 1)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 2)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 3)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="12%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 4)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', 5)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="19%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" width="15%">
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques')), 0) 
                                }}
                            </td>
                            
                        </tr>
                        
                        @endforeach
                        <tr>
                            <td colspan="3" style="font-weight: bold;">Grand Totals</td>
                            
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 1)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 1)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 1)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 2)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 2)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 2)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 3)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 3)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 3)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 4)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 4)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 4)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358; 
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 5)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 5)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', 5)->sum('cheques')), 0) 
                                }}
                            </td>
                           
                            <td align="right" style="font-weight: normal;">&#8358;
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cheques')), 0) 
                                }}
                            </td>
                            <td align="right" style="font-weight: normal;">&#8358;
                                {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', $year)->sum('cash') + \App\IncomeReport::where('year', $year)->sum('pos') + \App\IncomeReport::where('year', $year)->sum('cheques')), 0) 
                                }}
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('accounts.income.modals.exportyearmonthly')
@include('accounts.income.modals.yearmonthly')
@include('accounts.income.modals.viewmonthly')
@endsection