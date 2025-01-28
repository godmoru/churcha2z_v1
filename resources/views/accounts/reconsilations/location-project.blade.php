@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
         
        <div class="card b-0">
            <div class="card-header white">
                <i class="icon-calendar 2x blue-text"></i> <strong class="text-uppercase">Location Disburstment </strong> 
                <div class="pull-right" align="right">
                    <a href="#" onclick="window.print()" class="btn btn-xs btn-info" style="color: white;"> <i class="icon-print"></i> Print Report</a>
                </div>
            </div>
            <div class="card-body">
                <p>
                    <input placeholder="search table" type="text" id="filterText" class="form-control">
                </p>
                <div id="floatingButtonn">
                    <button id="updateLP" class="btn btn-primary">Update</button>
                </div>
                    <table class="table table-striped" id="filterTable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Location</th>
                          <th scope="col">Previous Balance</th>
                          <th scope="col">Current Total </th>
                          <th scope="col">Available Balance</th>
                          <th scope="col">Travel Allawance</th>
                          <th scope="col">Marriage Support</th>
                          <th scope="col">Breavement Support</th>
                          <th scope="col">Location Project</th>
                          <th scope="col">Housing</th>
                          <th scope="col">Packing Allawance</th>
                          <th scope="col">EX Total</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach($locations as $key => $loc)
                        <tr id="{{$loc->id}}">
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$loc->loc_name}}</td>
                            <td>{{number_format($loc->getLPPrevBal())}}</td>
                            <td>{{number_format($loc->getLPCurrTotal())}}</td>
                            <td>{{number_format($loc->getLPPrevBal()+$loc->getLPCurrTotal())}}</td>
                            <td id="ta">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->travel_allownace : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="ms">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->marriage_support : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="bs">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->bereavment_support : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="lp">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->location_projects : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="housing">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->housing : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="pa">
                                <input type="number" placeholder="0" value="{{$loc->accRec() ? $loc->accRec()->packing_allowance : 0}}" class="customTableInput" id="inputFieldLP">
                            </td>
                            <td id="total">{{number_format($loc->getExTotal())}}</td>
                            <td>{{number_format($loc->getLPCurrTotal() - $loc->getExTotal())}}</td>
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