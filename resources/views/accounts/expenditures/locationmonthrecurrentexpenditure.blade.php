
@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-8">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase">Month Recurrent Expenditure </strong> 
                <div class="pull-right" align="right">
                    <div class="btn-group" >
                        <button class="btn btn-success btn-xs btn-flat btn-block ">Submit Expenditure Records</button>
                        <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="btn" data-toggle="modal" data-target="#newexp" aria-expanded="false" aria-controls="collapseExample">New Expenditure</a></li>
                            <li><a class="btn" data-toggle="modal" data-target="#newuncatexp" aria-expanded="false" aria-controls="collapseExample">New Uncategorized Expenditure</a></li>
                        </ul>
                    </div>    
                </div>
            </div>
            <div class="card-body slimScroll">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">Type Name</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Month Total</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($expTypes as $count => $type)
                            
                                @php   
                                if(count(\App\LocationExpenditure::where('location_id', \Auth::user()->location_id)->get()) > 0){
                                    $locVal = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', $type->id)->latest()->first()->amount;
                                }else{
                                    $locVal = 0;
                                }
                                    $expt9 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 9)->latest()->first()->amount;
                                    $expt10 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 10)->latest()->first()->amount;
                                    $expt11 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 11)->latest()->first()->amount;
                                    $expt12 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 12)->latest()->first()->amount;
                                    $expt13 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 13)->latest()->first()->amount;
                                    $expt14 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 14)->latest()->first()->amount;
                                    $expt15 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 15)->latest()->first()->amount;
                                    $expt16 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 16)->latest()->first()->amount;
                                    $expt17 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 17)->latest()->first()->amount;
                                    $expt18 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 18)->latest()->first()->amount;
                                    $expt19 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 19)->latest()->first()->amount;
                                    $expt20 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 20)->latest()->first()->amount;
                                    $expt21 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 21)->latest()->first()->amount;
                                    $expt22 = \App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 22)->latest()->first()->amount;
                                @endphp
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$type->id}}">
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $type->name }}</b></a></td>
                                <td align="center">
                                    @if(count(\App\LocationExpenditure::where('location_id', \Auth::user()->location_id)->get()) > 0)
                                    {{ number_format($locVal, 2) }}
                                @else
                                0.00
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
              </table>                
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card b-0">
            <div class="card-header white text-uppercase" >
                Month's Uncategorised Expenditures
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">Type Name</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Month Total</th>
                        </tr>
                    </thead>
                     <tbody>
                        
                        <tr class="odd gradeX">
                        @foreach(\App\LocationExpenditure::where('expenditure_type_id', 999999000)->where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', 999999000)->groupBy('expenditure_type_other_name')->get() as $count => $type)
                            <td>{{ ++$count }}</td>  
                            <input type="hidden" name="typeId[]" value="{{$type->id}}">
                            <td> <b>{{ $type->expenditure_type_other_name }}</b></td>
                            <td align="right">
                               
                                {{ number_format($type->amount, 2) }}
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
              </table>  
            </div>
        </div>
    </div>
</div>

@include('accounts.expenditures.newrecurrentexpenditure')
@include('accounts.expenditures.newuncatrecurrent')
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
    
    function summore() {
        $("#expUncat2").on('input', '.amount', function () {
       var Asum = 0;
       $("#expUncat2 .amount").each(function () {
           var amount = $(this).val();
           if ($.isNumeric(amount)) {
              Asum += parseFloat(amount);
              }                  
            });
              $("#Utotal2").text(Asum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
    
</script>
@endsection