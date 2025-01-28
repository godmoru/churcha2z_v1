@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase">Year Recurrent Expenditure </strong> 
                <div class="pull-right" align="right"><a data-toggle="modal" data-target="#newexp" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs btn-round"> New Expenditure</a></div>
            </div>
            <div class="card-body slimScroll">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th  style="text-align: center; text-transform: uppercase;">S/No</th>
                            <th  style="text-align: center; text-transform: uppercase;">Type Name</th>
                            @foreach($years as $year)
                                <th  style="text-align: center; text-transform: uppercase;">{{ $year }}</th>
                            @endforeach
                            <th style="text-align: center; text-transform: uppercase;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expTypes as $count => $type)
                            <tr class="odd gradeX">
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$type->id}}">
                                <td><a href="#"> <b>{{ $type->name }}</b></a></td>
                                @foreach($years as $year)
                                <td align="center">
                                    {{ number_format(\App\LocationExpenditure::where('year', $year)->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', $type->id)->sum('amount'), 2) }}
                                </td>
                                @endforeach    
                                <td align="center" style="font-weight: bold;">
                                    {{ number_format(\App\LocationExpenditure::whereBetween('year', [date("Y") - 5,date("Y")])->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', $type->id)->sum('amount'), 2) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="font-weight: bold;">Grand Yearly Total</td>
                            @foreach($years as $year)
                            <td align="center" style="font-weight: bold;">
                                {{ number_format(\App\LocationExpenditure::where('year', $year)->where('location_id', \Auth::user()->location_id)->whereBetween('expenditure_type_id', [9,22])->sum('amount'), 2) }}
                            </td>
                            @endforeach
                            <td align="center" style="font-weight: bold;">
                                {{ number_format(\App\LocationExpenditure::whereBetween('year', [date("Y") - 5,date("Y")])->where('location_id', \Auth::user()->location_id)->whereBetween('expenditure_type_id', [9,22])->sum('amount'), 2) }}
                            </td>
                            
                        </tr>
                    </tbody>
                </table>                 
            </div>
        </div>
    </div>
</div>
@include('accounts.expenditures.newcapexpenditure')

@endsection
@section('scripts')
<script type="text/javascript">
    function sumup() {
        $("#Tamount").on('input', '.amount', function () {
       var Asum = 0;
       $("#Tamount .amount").each(function () {
           var amount = $(this).val();
           if ($.isNumeric(amount)) {
              Asum += parseFloat(amount);
              }                  
            });
              $("#Atotal").text(Asum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>
@endsection