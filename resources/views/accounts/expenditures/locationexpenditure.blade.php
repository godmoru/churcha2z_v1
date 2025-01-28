@extends('layouts.master')

@section('content')
<div class="row my-3">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Location Expenditures </strong> 
                 <div class="pull-right" align="right"><a href="{{route('expenditure.print-locationsyearcapex', \Crypt::encrypt(540))}}" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Print This</a></div> 
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th width="2%">S/No</th>
                            <th width="35%">Category</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Type &nbsp; </th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Year &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Month &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Submitted By &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Amount &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Status &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $count => $exp)
                            <tr class="odd gradeX">
                                <td>{{ ++$count }}</td>  
                                <td><a href="#"> <b>{{ $exp->Category['name'] }}</b></a></td>
                                <td><a href="#"> <b>{{ $exp->Type['name'] }}</b></a></td>
                                <td><a href="#"> <b>{{ $exp->year }}</b></a></td>
                                <td>{{ \DateTime::createFromFormat('!m', $exp->month)->format('F') }}</td>
                                <td><a href="#"> <b>{{ $exp->User->first_name.' '.$exp->User->last_name }}</b></a></td>
                                <td><a href="#"> <b>{{ $exp->amount }}</b></a></td>
                                <td>
                                    @if($exp->status == 1)
                                        <a class="btn btn-success btn-sm" href="#">approved</a>
                                    @else
                                        <a class="btn btn-info btn-sm" href="{{ route('expenditure.approve', $exp->id) }}">pending</a>
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