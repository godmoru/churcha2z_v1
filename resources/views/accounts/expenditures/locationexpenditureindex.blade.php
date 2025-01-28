@extends('layouts.master')

@section('content')
<div class="row my-3">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Locations' Capital Expenditures </strong> 
                 <div class="pull-right" align="right"><a href="{{route('expenditure.print-locationsyearcapex', \Crypt::encrypt(540))}}" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Print This</a></div> 
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="35%">Location</th>
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
                        @foreach($locations as $count => $loc)
                            <tr class="odd gradeX">
                                <td>{{ ++$count }}</td>  
                                <td><a href="#"> <b>{{ $loc->loc_name }}</b></a></td>
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
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection