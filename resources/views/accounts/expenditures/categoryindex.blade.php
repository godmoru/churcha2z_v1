@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Expenditure Categories Index </strong> 
                <!-- <div class="pull-right" align="right"><a data-toggle="modal" data-target="#newcat" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs btn-fab"> New</a></div> -->
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: left; text-transform: uppercase;">Category Name</th>
                        <th width="20%" style="text-align: center; text-transform: uppercase;">Total Expenditure Types</th>
                        <th width="20%" style="text-align: center; text-transform: uppercase;">Total Expenditures</th>
                        <th> OPTIONS</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($expCats as $count => $cat)
                                <td>{{ ++$count }}</td>  
                                <td><a href="{{route('expenditure.categories', \Crypt::encrypt(1)) }}"> <b>{{ $cat->name }}</b></a></td>
                                <td align="center">{{ number_format(count($cat->gettypes), 0) }}</td>
                                <td align="center"> &#8358; 0 </td>
                                <td align="center">
                                    <a href=""><i class="icon-eye"></i></a> &nbsp;
                                    <a href=""><i class="icon-pencil text-yellow"></i></a> &nbsp;
                                    <a href=""><i class="icon-trash text-red"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@include('accounts.expenditures.modals.newexcat')

@endsection
@section('scripts')

@endsection