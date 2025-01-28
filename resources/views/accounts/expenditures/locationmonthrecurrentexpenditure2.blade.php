
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
              <h4>Recurrent Expenditures for this Month</h4>
              <hr>
              <ul class="list-group">
                <li class="list-group-item">
                  Prevoius Balance: <strong>{{number_format($location->getPrevBal())}}</strong>
                </li>
                <li class="list-group-item">
                  Current Recurrent Balance: <strong>{{$location->accRec() ? number_format($location->accRec()->recurrent) : 0.00}}</strong>
                </li>
                <li class="list-group-item">
                  Available Balance: <strong>{{number_format($location->getPrevBal() + $location->currentRecurrent())}}</strong>
                </li>
                <li class="list-group-item">
                  Submited Expenses: <strong>{{number_format($location->getExpenses())}}</strong>
                </li>
                <li class="list-group-item">
                  Balance: <strong>{{number_format(($location->getPrevBal() + $location->currentRecurrent()) - $location->getExpenses())}}</strong>
                </li>
              </ul>
              {{-- <p class="mt-5">
                <button class="btn btn-block btn-success" data-toggle="modal" data-target="#exampleModal">View For All Months</button>
              </p> --}}
            </div>
        </div>
    </div>
</div>
@include('accounts.modals.recurrentModal')
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