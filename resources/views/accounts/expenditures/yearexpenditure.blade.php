@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase"> {{ $type == 1 ? "Capital" : "Recurrent" }} Expenditures by locations </strong> 
                <div class="pull-right" align="right">
                    <a href="{{ route('expenditure.printlocationsyear', \Crypt::encrypt(58398)) }}" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                    <a data-toggle="modal" data-target="#oyear" class="btn btn-warning btn-xs"> <i class="icon-search"></i> View Other Year</a>
                    <a data-toggle="modal" data-target="#vmonth" class="btn btn-success btn-xs"> <i class="icon-search"></i>Query Reports</a>


                    <!-- <a data-toggle="modal" data-target="#fetchLocationData" class="btn btn-xs btn-success"> <i class="icon-download"></i> Get By Location/Period</a> -->
                </div>
            </div>
            <div class="card-body">
                

                <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                        <th colspan="{{ count($years) + 2 }}" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                locations Expenditure for {{ date('Y') - 5 }} to {{ date('Y') }}
                            </th>
                        </tr>
                        <tr>
                            <th  colspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                Branch Name
                            </th>
                            @foreach($years as $year)
                            <th  colspan="" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                {{ $year }}
                            </th>
                            @endforeach
                            <th style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $location)
                        <tr>
                            <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$location->loc_name}}</td>
                            @foreach($years as $year)
                                <td align="right">
                                {{
                                    number_format(( \App\LocationExpenditure::where('year', $year)->where('location_id', $location->id)->where('expenditure_category_id', $type)->sum('amount')), 2) 
                                }}
                                </td>
                            @endforeach
                            <td align="right">
                                {{
                                    number_format(( \App\LocationExpenditure::whereBetween('year', [date('Y') - 5, date('Y')])->where('location_id', $location->id)->where('expenditure_category_id', $type)->sum('amount')), 2) 
                                }}
                            </td>
                        </tr>
                        
                        @endforeach
                        <tr>
                        <td>Grand Total</td>
                        @foreach($years as $year)
                        <td> &#8358; {{
                            number_format(( \App\LocationExpenditure::where('year', $year)->where('expenditure_category_id', $type)->sum('amount')), 2) 
                        }}</td>
                        @endforeach
                        <td align="right">
                            {{
                                number_format(( \App\LocationExpenditure::whereBetween('year', [date('Y') - 5, date('Y')])->where('expenditure_category_id', $type)->sum('amount')), 2) 
                            }}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@include('accounts.income.modals.viewotheryear')
@include('accounts.income.modals.viewmonthly')

@endsection