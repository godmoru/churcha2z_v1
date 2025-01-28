@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-8">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase">Month Capital Expenditure </strong> 
                <div class="pull-right" align="right">

                    <div class="btn-group" >
                        <button class="btn btn-success btn-xs btn-flat btn-block ">Submit Expenditure Records</button>
                        <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a class="btn" data-toggle="modal" data-target="#newexp" aria-expanded="false" aria-controls="collapseExample">New Expenditure</a></li>
                            <!--<li><a class="btn" data-toggle="modal" data-target="#newuncatexp" aria-expanded="false" aria-controls="collapseExample">New Uncategorized Expenditure</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">Type Name</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Month Total(&#8358;)</th>
                        </tr>
                    </thead>
                     <tbody>
                        @php $locval = 0; @endphp
                        @foreach($expTypes as $count => $type)
                            <tr class="odd gradeX">
                            
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$type->id}}">
                                <td><b>{{ $type->name }}</b></td>
                                <td align="right">
                                    {{ number_format($type->CurrentExpendituresMonth->sum('amount'), 0) }}
                                </td>
                            </tr>
                            @php $locval += $type->CurrentExpendituresMonth->sum('amount'); @endphp
                        @endforeach
                        
                        <tr>
                            <td colspan="2" style="font-weight: bold;"> Month Sub Total <small style="color: red;"> Categorized Expenditures</small> </td>
                            <td align="right" style="font-weight: bold;"> &#8358;
                            {{number_format(($locval),2)}}
                            </td>
                        </tr>
                    </tbody>
              </table>                
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card b-0">
            <div class="card-header white text-uppercase" >
                <!--Month's Uncategorised Expenditures-->
            </div>
            <div class="card-body">
              <!--  <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>-->
              <!--    <thead>-->
              <!--      <tr>-->
              <!--          <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>-->
              <!--          <th width="25%" style="text-align: center; text-transform: uppercase;">Type Name</th>-->
              <!--          <th width="8%" style="text-align: center; text-transform: uppercase;">Month Total (&#8358;)</th>-->
              <!--          </tr>-->
              <!--      </thead>-->
              <!--       <tbody>-->
                        
              <!--          <tr class="odd gradeXr">-->
              <!--          @foreach(\App\LocationExpenditure::where('expenditure_type_id', 999999999)->where('location_id', \Auth::user()->location_id)->groupBy('expenditure_type_other_name')->get() as $count => $type)-->
              <!--              <td>{{ ++$count }}</td>  -->
              <!--              <input type="hidden" name="typeId[]" value="{{$type->id}}">-->
              <!--              <td> <b>{{ isset($type) ? $type->expenditure_type_other_name : "" }}</b></td>-->
              <!--              <td align="right">-->
                                
              <!--                  {{isset($type) ? number_format($type->amount, 2) : "0.00"}}-->
              <!--              </td>-->
              <!--          </tr>-->
              <!--          @endforeach-->
              <!--          <tr>-->
              <!--              <td colspan="2" style="font-weight: bold;">Month Total</td>-->
              <!--              <td align="right" style="font-weight: bold;"> &#8358; {{number_format(\App\LocationExpenditure::where('year', date('Y'))->where('location_id', \Auth::user()->location_id)->where('expenditure_type_id', '999999999')->sum('amount'), 0) }}</td>-->
              <!--          </tr>-->
              <!--      </tbody>-->
              <!--</table>  -->
            </div>
        </div>
    </div>
</div>
@include('accounts.expenditures.newcapexpenditure')
@include('accounts.expenditures.newuncatcapex')

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
        $("#expUncat").on('input', '.amount', function () {
       var Asum = 0;
       $("#expUncat .amount").each(function () {
           var amount = $(this).val();
           if ($.isNumeric(amount)) {
              Asum += parseFloat(amount);
              }                  
            });
              $("#Utotal").text(Asum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }

</script>
@endsection