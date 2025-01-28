@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
                <div class="card ">
        <div class="row">
        
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="newconvert">
            @include('members.converts.modals.newconvertcat')
        </div>

        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-cubes 2x blue-text"></i> <strong class="text-uppercase">  </strong> 
                <div class="pull-right" align="right">
                    <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-people_outline"></i> New Category</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-transform: uppercase;">S/No</th>
                        <th width="27%" style="text-transform: uppercase;">Full Name</th>
                        <th width="13%" style="text-transform: uppercase;">Short Name</th>
                        <th width="13%" style="text-transform: uppercase; text-align: center;">People in Category</th>
                        <th width="38%" style="text-transform: uppercase; text-align: center;">Description</th>
                        <th style="text-transform: uppercase;"> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($categories as $count => $cat)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('peoplecategories.one', \Crypt::encrypt($cat->id)) }}"> <b>{{ strtoupper($cat->cat_name) }}</b></a></td>
                            <td><a href="{{route('peoplecategories.one', \Crypt::encrypt($cat->id)) }}"> <b>{{ strtoupper($cat->short_name) }}</b></a></td>
                            <td align="center">{{ isset($cat->get_peopleincat) ? number_format(count($cat->get_peopleincat),0) : " NA"}}</td>
                            <td align="">{{ $cat->description}}</td>
                           
                            <td align="center">
                                @if($cat->status == 1)
                                <span class="badge badge-primary"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                                @else
                                <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Not Active</span></span>
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