@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
         
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase">Recurrent  Disburstments</strong> 
                <div class="pull-right" align="right">
                    <a href="#" onclick="window.print()" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                </div>
            </div>
            <div class="card-body">
                <p>
                    <input placeholder="search table" type="text" id="filterText" class="form-control">
                </p>

                    <table class="table table-striped" id="filterTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Location</th>
                          <th scope="col">Previous Balance</th>
                          <th scope="col">Current Recurrent Balance</th>
                          <th scope="col">Available Balance</th>
                          <th scope="col">Submited Expenses</th>
                          <th scope="col">Balance</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach($locations as $key => $loc)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$loc->loc_name}}
                            <td>{{number_format($loc->getPrevBal())}}</td>
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->recurrent) : 0.00}}</td>
                            <td>{{number_format($loc->getPrevBal() + $loc->currentRecurrent())}}</td>
                            <td>{{number_format($loc->getExpenses())}}</td>
                            <td>{{number_format(($loc->getPrevBal() + $loc->currentRecurrent()) - $loc->getExpenses())}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


@endsection