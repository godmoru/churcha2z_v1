@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-8">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Month Income Summary by Months </strong> 
                <!--<div class="pull-right" align="right"><a href="{{route('income.submit')}}" class="btn btn-primary btn-xs btn-round"> <i class="icon-money"></i> Submit Income</a></div>-->
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="35%" style="text-align: center; text-transform: uppercase;">income source Name</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">Month Total </th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">Year Total</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($incomeSource as $count => $source)
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$source->id}}">
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $source->name }}</b></a></td>
                                <td align="right">{{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('income_report_source_id', $source->id)->sum('cheques')), 2) }}
                                </td>
                                <td align="right">{{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('income_report_source_id', $source->id)->sum('cash') + 
                                    \App\IncomeReport::where('year', date('Y'))->where('income_report_source_id', $source->id)->sum('pos') + 
                                    \App\IncomeReport::where('year', date('Y'))->where('income_report_source_id', $source->id)->sum('cheques')), 2) }}
                                </td>
                                
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="font-weight: bold;">Grand Total</td>
                            
                            <td align="right" style="font-weight: normal;">&#8358; {{
                                number_format(( 

                                 \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cash') + 
                                 \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('pos') + 
                                 \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->sum('cheques')), 2)  }}
                            </td>
                           
                            <td align="right" style="font-weight: normal;"> &#8358;{{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->sum('cash') + 
                                 \App\IncomeReport::where('year', date('Y'))->sum('pos') + 
                                 \App\IncomeReport::where('year', date('Y'))->sum('cheques')), 2)
                                  }}</td>
                        </tr>
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card b-0">
            <div class="card-header white text-uppercase" >
                Summary of this month by preference
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection