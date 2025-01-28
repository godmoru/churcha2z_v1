@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Asset Types Index </strong> 
                <div class="pull-right" align="right"><a data-toggle="modal" data-target="#newtype" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"> New Type</a></div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="25%">Type Name</th>
                        <th width="15%">Parent Category</th>
                        <th width="20%" style="text-align: center; text-transform: uppercase;">Total Items</th>
                        <th width="20%" style="text-align: center; text-transform: uppercase;">Active Items</th>
                        <th width="20%" style="text-align: center; text-transform: uppercase;">Inactive Items</th>
                        <!-- <th> Status</th> -->
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($assetTypes as $count => $type)
                                <td>{{ ++$count }}</td>  
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $type->name }}</b></a></td>
                                <td align="">{{ $type->category->name }}</td>
                                <td align="center">{{ 0 }}</td>
                                <td align="center">{{ 0 }}</td>
                                <td align="center">{{ 0 }}</td>
                               <!--  <td align="center">
                                    @if($type->status == 1)
                                    <span class="badge badge-primary"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                                    @else
                                    <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Inactive</span></span>
                                    @endif
                                </td> -->

                            </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@include('accounts.assetmanagement.modals.newtype')

@endsection
@section('scripts')

@endsection