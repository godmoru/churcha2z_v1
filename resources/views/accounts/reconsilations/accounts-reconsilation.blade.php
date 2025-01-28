@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
         
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase">This Month's Accounts Reconsilation </strong> 
                <div class="pull-right" align="right">
                    <a href="#" onclick="window.print()" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                </div>
            </div>
            <div class="card-body">
                <p>
                    <input placeholder="search table" type="text" id="filterText" class="form-control">
                </p>
                <div id="floatingButtonnn">
                    <button id="updateRec" class="btn btn-primary">Update</button>
                </div>
                    <table class="table table-striped" id="filterTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Location</th>
                          <th scope="col">This Month Income</th>
                          <th scope="col">Cash in Bank</th>
                          <th scope="col">Difference</th>
                          <th scope="col">Tight Amount (10%)</th>
                          <th scope="col">Kingdom Practice (2%)</th>
                          <th scope="col">Salaries (16%)</th>
                          <th scope="col">Mission (10%)</th>
                          <th scope="col">Reserves (5%)</th>
                          <th scope="col">Recurrent (30%)</th>
                          <th scope="col">Housing (7%)</th>
                          <th scope="col">Location Project (20%)</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach($locations as $key => $loc)
                        <tr id="{{$loc->id}}">
                            <th scope="row">{{$key+1}}</th>
                            <td id="locationName">{{$loc->loc_name}}</td>
                            <td id="monthlyIncomeReport">{{$loc->monthlyIncomeReport()}}</td>
                            <td id="monthIncome">
                                <input type="number" value="{{$loc->accRec() ? $loc->accRec()->amount_in_bank : 0.00}}" class="customTableInput" id="inputField">
                            </td>
                            <td id="diff">{{$loc->accRec() ? number_format($loc->accRec()->variance_amount) : 0.00}}</td>
                            <td id="tight">{{$loc->accRec() ? number_format($loc->accRec()->tithe_amount) : 0.00}}</td>
                            <td id="kingdomPractice">{{$loc->accRec() ? number_format($loc->accRec()->kingdom_practice) : 0.00}}</td>
                            <td id="salaries">{{$loc->accRec() ? number_format($loc->accRec()->salaries) : 0.00}}</td>
                            <td id="mission">{{$loc->accRec() ? number_format($loc->accRec()->mission) : 0.00}}</td>
                            <td id="reserves">{{$loc->accRec() ? number_format($loc->accRec()->reserve) : 0.00}}</td>
                            <td id="recurrent">{{$loc->accRec() ? number_format($loc->accRec()->recurrent) : 0.00}}</td>
                            <td id="housing">{{$loc->accRec() ? number_format($loc->accRec()->housing) : 0.00}}</td>
                            <td id="locationProject">{{$loc->accRec() ? number_format($loc->accRec()->location_projects) : 0.00}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
            </div>
            <div class="row justify-content-center" id="pagination">
                {{$locations->links()}}
            </div>
        </div>
    </div>
</div>


@endsection