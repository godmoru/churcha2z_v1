@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> Income by locations </strong> 
                <div class="pull-right" align="right">
                    <a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                    @role('administrator|auditor|hq-accountant')
                    <a data-toggle="modal" data-target="#oyear" class="btn btn-warning btn-xs"> <i class="icon-search"></i> View Other Year</a>
                    <a data-toggle="modal" data-target="#vmonth" class="btn btn-success btn-xs"> <i class="icon-search"></i>Query Reports</a>
                    @endrole
                    <!-- <a data-toggle="modal" data-target="#fetchLocationData" class="btn btn-xs btn-success"> <i class="icon-download"></i> Get By Location/Period</a> -->
                </div>
            </div>
            <div class="card-body">
                

                <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                Income by locations - {{ date('Y')}}
                            </th>
                        </tr>
                        <tr>
                            <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                <br>Branch Name
                            </td>
                            <td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
                            <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand </td>

                        </tr>

                        <tr>
                            <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
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
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                        </tr>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                        <tr>
                            <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
                            <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', $location->id)->sum('cheques')), 0)

                                        }}
                                    </td>
                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', $location->id)->sum('cheques')), 0) 
                                        }}
                                    </td>
                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', $location->id)->sum('cheques')), 0) 
                                        }}
                                    </td>

                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', $location->id )->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', $location->id )->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', $location->id )->sum('cheques')), 0) 
                                        }}
                                    </td>

                                   <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', $location->id )->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', $location->id)->sum('cheques')), 0) 
                                    }}
                                    </td>

                        </tr>
                        
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@include('accounts.income.modals.viewotheryear')
@include('accounts.income.modals.viewmonthly')

@endsection