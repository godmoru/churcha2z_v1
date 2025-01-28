@extends('layouts.master')

@section('content')
<div class="row col-md-12">
    <div class="col-md-12">
        @if($type == 'summary')
            <div class="card">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Year Income Summary by Months </strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                        <a href="{{route('income.submit')}}" class="btn btn-primary btn-xs btn-round"> <i class="icon-money"></i> Submit Income</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                            <th width="25%" style="text-align: center; text-transform: uppercase;">income source Name</th>
                            @foreach($months as $key => $month)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $month }} &nbsp; <a data-toggle="modal" data-target="#vomnth" aria-expanded="false" aria-controls="collapseExample" > <i class="icon icon-eye"></i> </a></th>
                            @endforeach
                            <th style="text-align: center; text-transform: uppercase;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="odd gradeX">
                                @foreach($incomeSource as $count => $source)
                                    <td>{{ ++$count }}</td>  
                                    <input type="hidden" name="typeId[]" value="{{$source->id}}">
                                    <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $source->name }}</b></a></td>
                                    @foreach($months as $key => $month)
                                    <td align="right">{{
                                        number_format(( \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }}
                                    </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" style="font-weight: bold;">Grand Monthly Total</td>
                                @foreach($months as $key => $month)
                                    <td align="center" style="font-weight: normal;"> &#8358; 
                                        {{ number_format(( \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', $year)->where('month', $key)->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}
                                    </td>
                                @endforeach
                                <td align="center" style="font-weight: normal;"> &#8358;{{
                                        number_format(( \App\IncomeReport::where('year', $year)->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', $year)->where('location_id', \Auth::user()->location_id)->sum('pos') +  \App\IncomeReport::where('year', $year)->where('location_id', \Auth::user()->location_id)->sum('cheques') ), 0) }}</td>
                            </tr>
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'disbursement_income_summary')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Disbursement of monthly income</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($regulars_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requlars as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
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
        @elseif($type == 'disbursement_summary')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Disbursement of Regular Income</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($regular_income_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reqular_income as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
                                    <td>{{ number_format($reg->total_income, 2) }}</td> 
                                    <td>{{ number_format($reg->branch_income,2) }}</td> 
                                    <td>{{ number_format($reg->hq_income,2) }}</td> 
                                    <td>
                                        @if($reg->month_key !== (int) date('m') && $last_date !== $current_date)
                                            <a data-toggle="modal" aria-expanded="false" data-month="{{ $reg->month_key }}" data-year="{{ $year }}" data-branch_income="{{ $reg->branch_income }}" data-hq_income="{{ $reg->hq_income }}" class="btn btn-info btn-sm disburse" style="color: white;">Disburse</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'income_distribution')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Location regular income Disbursement</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($loction_dist_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($location_income_dist as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
                                    <td>{{ number_format($reg->branch_income, 2) }}</td> 
                                    <td>{{ number_format($reg->recurrent,2) }}</td> 
                                    <td>{{ number_format($reg->location_project,2) }}</td> 
                                    <td>{{ number_format($reg->location_reserve,2) }}</td> 
                                    <td>{{ $reg->status }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'year_income_distribution')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">5 Years Distribution of 55% of Location regular Income</strong> 
                    {{--  <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>  --}}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($year_loction_dist_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($year_location_income_dist as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->year }}</td> 
                                    <td>{{ number_format($reg->total, 2) }}</td> 
                                    <td>{{ number_format($reg->branch_income, 2) }}</td> 
                                    <td>{{ number_format($reg->recurrent,2) }}</td> 
                                    <td>{{ number_format($reg->location_project,2) }}</td> 
                                    <td>{{ number_format($reg->location_reserve,2) }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'recurrent_income')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Recurrent Income management</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                        <a href="{{ route('expenditure.locations.recurrent')}}">Recurrent Expenditure</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($recurrent_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recurrent_income as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
                                    <td>{{ number_format($reg->amount, 2) }}</td> 
                                    <td>{{ number_format($reg->prev_balnace, 2) }}</td> 
                                    <td>{{ number_format($reg->total,2) }}</td> 
                                    <td>
                                        @if($reg->status == 'SUBMITTED')
                                            <a data-toggle="modal" aria-expanded="false" data-type="recurrent" data-month="{{ $reg->month_key }}" data-year="{{ $year }}" data-current_total="{{ $reg->total - $reg->expenditure }}" class="btn btn-info btn-sm expenses" style="color: white;">Add</a>
                                        @endif
                                        {{ number_format($reg->expenditure,2) }}
                                    </td>
                                    <td>{{ number_format($reg->last_balance,2) }}</td> 
                                    <td>{{ $reg->status }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'location_project')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Location Project management</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($location_project_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($location_projects as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
                                    <td>{{ number_format($reg->amount, 2) }}</td>
                                    <td>{{ number_format($reg->slpf, 2) }}</td>
                                    <td>{{ number_format($reg->cphq, 2) }}</td> 
                                    <td>{{ number_format($reg->prev_balance, 2) }}</td> 
                                    <td>{{ number_format($reg->total,2) }}</td> 
                                    <td>
                                        @if($reg->status == 'SUBMITTED')
                                            <a data-toggle="modal" aria-expanded="false" data-type="location_project" data-month="{{ $reg->month_key }}" data-year="{{ $year }}" data-current_total="{{ $reg->total - $reg->expenditure }}" class="btn btn-info btn-sm locationexpenses" style="color: white;">Add</a>
                                        @endif
                                        {{ number_format($reg->expenditure,2) }}
                                    </td>
                                    <td>{{ number_format($reg->last_balance,2) }}</td> 
                                    <td>{{ $reg->status }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @elseif($type == 'location_reserve')
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-money 2x blue-text"></i> <strong class="text-uppercase">Location Reserve Account Management</strong> 
                    <div class="pull-right" align="right">
                        <a data-toggle="modal" data-target="#byearmonth" aria-expanded="false" class="btn btn-info btn-xs btn-round" aria-controls="collapseExample" style="color: white;"><i class="icon icon-search"></i>Search </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" data-options='{ "paging": true; "searching":true}'>
                    <thead>
                        <tr>
                            @foreach($location_reserve_header as $header)
                                <th width="8%" style="text-align: center; text-transform: uppercase;"> {{ $header }} &nbsp; </th>
                            @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($location_reserves as $key => $reg)
                                <tr class="odd gradeX">
                                    <td>{{ $reg->month }}</td> 
                                    <td>{{ number_format($reg->amount, 2) }}</td>
                                    <td>{{ number_format($reg->prev_balance, 2) }}</td> 
                                    <td>{{ number_format($reg->total,2) }}</td> 
                                    <td>
                                        @if($reg->status == 'SUBMITTED')
                                            <a data-toggle="modal" aria-expanded="false" data-type="location_reserve" data-month="{{ $reg->month_key }}" data-year="{{ $year }}" data-current_total="{{ $reg->total - $reg->expenditure }}" class="btn btn-info btn-sm locationexpenses" style="color: white;">Add</a>
                                        @endif
                                        {{ number_format($reg->expenditure,2) }}
                                    </td>
                                    <td>{{ number_format($reg->last_balance,2) }}</td> 
                                    <td>{{ $reg->status }}</td> 
                                </tr>
                            @endforeach
                        </tbody>
                </table>                
                </div>
            </div>
        @endif
    </div>
</div>
@include('accounts.income.modals.viewmonth')
@include('accounts.income.modals.branchyearmonthly')
@include('accounts.income.modals.disburse')
@include('accounts.income.modals.expenses')
@include('accounts.income.modals.locationexpenses')
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".disburse").click(function(){ // Click to only happen on disburse
            $('#disburse').find("#month").val($(this).data('month'));
            $('#disburse').find("#year").val($(this).data('year'));
            $('#disburse').find("#branch_income").val($(this).data('branch_income'));
            $('#disburse').find("#hq_income").val($(this).data('hq_income'));
            $('#disburse').modal('show');
        });
        $(".expenses").click(function(){ // Click to only happen on disburse
            $('#expenses').find("#month").val($(this).data('month'));
            $('#expenses').find("#year").val($(this).data('year'));
            $('#expenses').find("#current_total").val($(this).data('current_total'));
            $('#expenses').find("#type").val($(this).data('type'));
            $('#expenses').modal('show');
        });
        $(".locationexpenses").click(function(){ // Click to only happen on disburse
            $('#locationexpenses').find("#month").val($(this).data('month'));
            $('#locationexpenses').find("#year").val($(this).data('year'));
            $('#locationexpenses').find("#current_total").val($(this).data('current_total'));
            $('#locationexpenses').find("#type").val($(this).data('type'));
            $('#locationexpenses').modal('show');
        });
        
    });
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