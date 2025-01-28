@extends('layouts.master')

@section('content')
<div class="row col-md-12">
    <div class="col-md-12">
        <div class=" card ">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> New Converts Index </strong> 
                <div class="pull-right" align="right">
                    <a href="{{route('converts.print') }}" class="btn btn-warning btn-xs">Download All List</a>
                    <a href="{{route('converts.printtodays') }}" class="btn btn-success btn-xs">Download Todays List</a>
                </div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="17%">Full Name</th>
                        <th width="25%">Location</th>
                        <th> e-Mail</th>
                        <th width="15%"> Phone No</th>
                        <th width="5%">Category</th>
                        <th width="8%">SVC</th>
                        <th>Found. Class</th>
                        <th>DLTC</th>
                        <th> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($converts as $count => $convt)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('converts.one', $convt->id) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                            <td>{{ $convt->email }}</td>
                            <td>{{ $convt->phone1 }}</td>
                            <td align="">{{$convt->getCategory->short_name }}</td>
                            <td align="">{{$convt->serviceT->name }}</td>
                            <td align="center">
                                @if($convt->fclass_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->dltc_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->membership_decision  == 1)
                                Decided
                                @else
                                Not decided
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection