@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
         
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase">HQ Remitance </strong> 
                <div class="pull-right" align="right">
                    <a href="#" onclick="window.print()" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                </div>
            </div>
            <div class="card-body">
                <p>
                    <input placeholder="search table" type="text" id="filterText" class="form-control">
                </p>
                @if(!hqRemitancePaid())
                <div id="floatingButton">
                    <button id="payOff" class="btn btn-primary">Pay Off</button>
                </div>
                @endif
                    <table class="table table-striped" id="filterTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Location</th>
                          <th scope="col">Tight Amount (10%)</th>
                          <th scope="col">Kingdom Practice (2%)</th>
                          <th scope="col">Salaries (16%)</th>
                          <th scope="col">Mission (10%)</th>
                          <th scope="col">Reserves (5%)</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach($locations as $key => $loc)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$loc->loc_name}}
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->tithe_amount) : 0.00}}</td>
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->kingdom_practice) : 0.00}}</td>
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->salaries) : 0.00}}</td>
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->mission) : 0.00}}</td>
                            <td>{{$loc->accRec() ? number_format($loc->accRec()->reserve) : 0.00}}</td>
                            <td>{{0.00}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th scope="row">{{count($locations)+1}}</th>
                            <td><strong>Total</strong></td>
                            <td>{{getTotals('tithe_amount')}}</td>
                            <td>{{getTotals('kingdom_practice')}}</td>
                            <td>{{getTotals('salaries')}}</td>
                            <td>{{getTotals('mission')}}</td>
                            <td>{{getTotals('reserve')}}</td>
                            <td>{{0.00}}</td>
                        </tr>
                        @if(hqRemitancePaid())
                        <tr>
                            <th scope="row">{{count($locations)+1}}</th>
                            <td><strong>Paid Off</strong></td>
                            <td>{{getTotals('tithe_amount')}}</td>
                            <td>{{getTotals('kingdom_practice')}}</td>
                            <td>{{getTotals('salaries')}}</td>
                            <td>{{getTotals('mission')}}</td>
                            <td>{{getTotals('reserve')}}</td>
                            <td>{{0.00}}</td>
                        </tr>
                        <tr>
                            <th scope="row">{{count($locations)+1}}</th>
                            <td><strong>Balance</strong></td>
                            <td>{{0.00}}</td>
                            <td>{{0.00}}</td>
                            <td>{{0.00}}</td>
                            <td>{{0.00}}</td>
                            <td>{{0.00}}</td>
                            <td>{{0.00}}</td>
                        </tr>
                        @endif
                      </tbody>
                </table>
            </div>
            {{-- @if(hqRemitancePaid())
            <div class="row justify-content-center" id="pagination">
                <p class="alert alert-info"><strong>{{daye('F')}}</strong> HQRemitance has been Paid!</p>
            </div>
            @endif --}}
        </div>
    </div>
</div>


@endsection