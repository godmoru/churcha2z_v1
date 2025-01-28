@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> locations Five Years Income</strong> 
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
                

                <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}' width="100%">
                    <thead>
                        <tr>
                            <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Income summary from {{ \Carbon\Carbon::now('Y')->subYear(5)->format('Y') .' - '. date('Y')}}
                            </th>
                        </tr>
                        <tr>
                            <td  colspan="2" rowspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;">
                                <br>Branch Name
                            </td>
                            <td colspan="6" style="text-align: left; text-transform: uppercase; font-weight: bold;  font-size: 16px;text-align: center;">{{"Year"}}</td>
                        </tr>

                        <tr>
                            @foreach($years as $year)
                                <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
                                <th width="12%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;"> {{ $year }} &nbsp; </th>
                            @endforeach
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                        </tr>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $count => $location)
                        <tr>
                            <td width="2%">{{++$count}}</td>
                            <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
                            @foreach($years as $year)
                                <td align="right">
                                    {{ number_format(( \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques')), 0) }}
                                </td>
                            @endforeach
                            <td align="right">
                            <?php
                                $sum = 0;
                                foreach($years as $year){
                                    $sum += \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('location_id', $location->id)->sum('cheques'); 
                                }
                                echo number_format(($sum), 0);
                            ?>
                            </td>

                        </tr>
                        
                        @endforeach

                        <!-- End Sunday Services -->
                    </tbody>
                </table>

                <!-- <div class="h3 text-center jumbotron bg-light"> There are no attendance taken for today. You can select a date from <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#dategetATT">here </a> to modify or edit its record(s). Thank you.</div> -->

            </div>
        </div>
    </div>

</div>
@include('accounts.income.modals.viewotheryear')
@include('accounts.income.modals.viewmonthly')

@endsection