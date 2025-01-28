@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        @if($type == 'income_summary')
            <div class="card">
                <div class="card-header white">
                    <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> Income by locations </strong> 
                    <div class="pull-right" align="right">
                        <a href="{{ route('income.printlocationsmonthly') }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                        <a data-toggle="modal" data-target="#vyearmonth" class="btn btn-warning btn-xs"> <i class="icon-search"></i> All Search</a>
                        <a data-toggle="modal" data-target="#exportyearmonthly" class="btn btn-primary btn-xs"> <i class="icon-download"></i>Export</a>
                        <a data-toggle="modal" data-target="#vmonth" class="btn btn-success btn-xs"> <i class="icon-search"></i> Location Search</a>
                        <!-- <a data-toggle="modal" data-target="#fetchLocationData" class="btn btn-xs btn-success"> <i class="icon-download"></i> Get By Location/Period</a> -->
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                        <thead>
                            <tr>
                                <th colspan="{{ count($incomeSource) + 5 }}" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                    <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                    locations Income - {{ $date }}
                                </th>
                            </tr>
                            <tr>
                                <td  colspan="3" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                    <br>Branch Name
                                </td>
                                <td colspan="{{ count($incomeSource) + 2 }}" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Income summary"}}</td>
                            </tr>

                            <tr>
                                @foreach($incomeSource as $source )
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
                                @foreach($incomeSource as $source )
                                <td align="right" width="9%">
                                    {{ number_format(( \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id',  $source->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                                @endforeach
                                <td align="right" width="19%">
                                    {{ number_format(( \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('location_id', $location->id)->sum('cheques')), 0) }}
                                </td>
                                <td align="right" width="15%">
                                    {{ number_format(( \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques')), 0) }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" style="font-weight: bold;">Grand Totals</td>
                                @foreach($incomeSource as $source )
                                <td align="right" style="font-weight: normal;">&#8358; 
                                    {{ number_format(( \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->where('income_report_source_id', $source->id)->sum('cheques')), 0) 
                                    }}
                                </td>
                                @endforeach
                                <td align="right" style="font-weight: normal;">&#8358;
                                    {{ number_format((\App\IncomeReport::where('year', $year)->where('month', $month)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $month)->sum('cheques')), 0) 
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
        @elseif($type == "location_income")
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Disbursement of Regular Income </strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#vyearmonth" class="btn btn-warning btn-xs"> <i class="icon-search"></i> Search</a>
                        <a data-toggle="modal" data-target="#exportyearmonthly" class="btn btn-primary btn-xs"> <i class="icon-download"></i>Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            <th colspan="{{ count($regulars_header) }}" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Income - {{ $date }}
                            </th>
                        </tr>
                        <tr>
                            @foreach($regulars_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requlars as $key => $reg)
                            <tr class="odd gradeX">
                                <td>{{ $reg->branch }}</td> 
                                <td>{{ number_format($reg->total_income,2) }}</td> 
                                <td>{{ number_format($reg->slpf,2) }}</td> 
                                <td>{{ number_format($reg->cpif,2) }}</td> 
                                <td>{{ number_format($reg->shq,2) }}</td> 
                                <td>{{ number_format($reg->posp,2) }}</td> 
                                <td>{{ number_format($reg->pomb,2) }}</td> 
                                <td>{{ number_format($reg->rspt,2) }}</td> 
                                <td>{{ number_format($reg->total,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == "location_distribution")
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Distribution from the Branches income to HQ</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#vyearmonth" class="btn btn-warning btn-xs"> <i class="icon-search"></i> Search</a>
                        <a data-toggle="modal" data-target="#exportyearmonthly" class="btn btn-primary btn-xs"> <i class="icon-download"></i>Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            <th colspan="{{ count($loction_dist_header) }}" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Income - {{ $date }}
                            </th>
                        </tr>
                        <tr>
                            @foreach($loction_dist_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reqular_income as $key => $reg)
                            <tr class="odd gradeX">
                                <td>{{ $reg->branch }}</td> 
                                <td>{{ number_format($reg->hq_income,2) }}</td> 
                                <td>{{ number_format($reg->shq,2) }}</td> 
                                <td>{{ number_format($reg->posp,2) }}</td> 
                                <td>{{ number_format($reg->pomb,2) }}</td> 
                                <td>{{ number_format($reg->total,2) }}</td>
                                <td>{{ number_format($reg->year_total,2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == "location_hq_distribution")
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Distribution from the Branches income to HQ</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#vyearmonth" class="btn btn-warning btn-xs"> <i class="icon-search"></i> Search</a>
                        <a data-toggle="modal" data-target="#exportyearmonthly" class="btn btn-primary btn-xs"> <i class="icon-download"></i>Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            <th colspan="{{ count($location_hq_dist_header) }}" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Income - {{ $date }}
                            </th>
                        </tr>
                        <tr>
                            @foreach($location_hq_dist_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hq_distribution as $key => $reg)
                            <tr class="odd gradeX">
                                <td>{{ $reg->branch }}</td> 
                                <td>{{ number_format($reg->hq_income,2) }}</td> 
                                <td>{{ number_format($reg->tithe,2) }}</td> 
                                <td>{{ number_format($reg->salary,2) }}</td> 
                                <td>{{ number_format($reg->mission,2) }}</td> 
                                <td>{{ number_format($reg->kingdom,2) }}</td>
                                <td>{{ number_format($reg->reserve,2) }}</td>
                                {{-- <td>{{ number_format($reg->total,2) }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
                </div>
            </div>
        @endif
    </div>
</div>
@include('accounts.income.modals.exportyearmonthly')
@include('accounts.income.modals.yearmonthly')
@include('accounts.income.modals.viewmonthly')
@endsection