@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Year Income Summary by Months </strong> 
                <div class="pull-right" align="right"><a href="{{route('income.submit')}}" class="btn btn-primary btn-xs btn-round"> <i class="icon-money"></i> Submit Income</a></div>
            </div>
            <div class="card-body slimScroll">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">income source Name</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Jan &nbsp; </th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Feb &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Mar &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Apr &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">May &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Jun &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Jul &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Aug &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Sept &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Oct &nbsp; <a data-toggle="modal" data-target="#vomnth" aria-expanded="false" aria-controls="collapseExample"> <i class="icon icon-eye"></i> </a></th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Nov &nbsp;</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Dec &nbsp;</th>
                        <th style="text-align: center; text-transform: uppercase;">Total</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($incomeSource as $count => $source)
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$source->id}}">
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $source->name }}</b></a></td>
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="font-weight: bold;">Grand Monthly Total</td>
                            <td align="center" style="font-weight: normal;">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 1)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 2)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 3)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 4)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 5)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 6)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 7)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 8)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 9)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;">&#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 10)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="center" style="font-weight: normal;">&#8358; {{
                                number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 11)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}
                            </td>
                            <td align="center" style="font-weight: normal;">&#8358; {{
                                number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', 12)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}
                            </td>
                           
                            <td align="center" style="font-weight: normal;"> &#8358;{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('pos') +  \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('cheques') ), 0) }}</td>
                        </tr>
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@include('accounts.income.modals.viewmonth')

@endsection
@section('scripts')
<script type="text/javascript">
    function sumup() {
        $("#Tpos").on('input', '.pos', function () {
       var Asum = 0;
       $("#Tpos .pos").each(function () {
           var pos = $(this).val();
           if ($.isNumeric(pos)) {
              Asum += parseFloat(pos);
              }                  
            });
              $("#Atotal").text(Asum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>
@endsection