@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> {{$location->loc_name}} Income </strong> 
                <div class="pull-right" align="right">
                    <a href="{{ route('locations.summarized-weekly-reports-print') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                    <a data-toggle="modal" data-target="#viewmonthlyday" class="btn btn-primary btn-xs"> <i class="icon-search"></i>Query Reports</a>
                    @role('administrator|auditor|hq-accountant')
                    <a data-toggle="modal" data-target="#oyear" class="btn btn-warning btn-xs"> <i class="icon-search"></i> View Other Year</a>
                    <a data-toggle="modal" data-target="#vmonth" class="btn btn-success btn-xs"> <i class="icon-search"></i>Query Reports</a>
                    @endrole
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-8">            
                        <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                        <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                        {{$location->loc_name .' Income - '. $date}}
                                    </th>
                                </tr>
                                <tr>
                                    <td  colspan="2" rowspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;">
                                        <br> Days/Transaction Time
                                    </td>
                                    <td rowspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;">
                                        <br> Purpose
                                    </td>
                                    <td>Offering Type</td>
                                    <td colspan="4" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Income summary"}}</td>
                                </tr>
                                <tr>
                                    <th width="8%" style="text-align: center; text-transform: uppercase;">Cash &nbsp;</th>
                                    <th width="8%" style="text-align: center; text-transform: uppercase;">POS/Transfer &nbsp;</th>
                                    <th width="9%" style="text-align: center; text-transform: uppercase;">Cheques &nbsp;</th>
                                    <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                                </tr>
                                <tr>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $count => $iRep)
                                <tr>
                                    <td width="3%">{{++$count}}</td>
                                    <td width="26%" style="text-transform: uppercase; font-weight: bold;">{{date_format($iRep->created_at, "jS F, Y" .' - ' ."h:m:s A")}}</td>
                                    <td>{{isset($iRep->serviceType) ? $iRep->serviceType->name : "Undefined Purpose"}}</td>
                                    <td>{{ !empty($iRep->source)  ? $iRep->source['name'] : ''  }}</td>
                                    <td align="right">{{number_format($iRep->cash, 0)}}
                                    <td align="right">{{number_format($iRep->pos, 0)}}
                                    <td align="right">{{number_format($iRep->cheques, 0)}}
                                    <td align="right">{{number_format(($iRep->cash + $iRep->pos + $iRep->cheques), 0)}}
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="3" style="text-transform: uppercase; font-weight: bold;">Daily Total</td>
                                    <td align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cash'), 0) }}</td>
                                    <td align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('pos'), 0) }}</td>
                                    <td align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cheques'), 0) }}</td>
                                    <td align="right">
                                        &#8358; {{
                                        number_format(( \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cheques')), 0)
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card blue lighten-2 border-primary " align="center" >
                            <div class="p-5 text-white" style="height: 180px;">
                                <h5 class="font-weight-normal s-36 text-uppercase">Daily Summary</h5><br>
                                <span class="s-48 bolder font-weight-heavy text-primary"> &#8358; {{ number_format((\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cheques')), 0) }}</span>
                            </div>
                             <b style="color: white; font-size: 12px;">***************************************************************************************************</b> 
                            <div class="row text-white p-2 s-18 text-center">
                                <div class="col-4 b-r text-uppercase"> 
                                    CASH <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cash'), 0) }}</div>
                                </div>
                                <div class="col-4 b-r text-uppercase"> 
                                    pos/online <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('pos'), 0) }}</div>
                                </div>
                                <div class="col-4 text-uppercase"> 
                                    cheques <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->whereDate('created_at', $dt)->sum('cheques'), 0) }}</div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@role('administrator|auditor|hq-accountant')
@include('accounts.income.modals.viewotheryear')
@include('accounts.income.modals.viewmonthly')
@endrole
@include('accounts.income.modals.viewmonthlyday')
@endsection