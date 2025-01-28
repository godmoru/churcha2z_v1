@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-10">
        <div class="row collapse col-md-12" id="newconvert">
            @include('classes.new')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Classes Index </strong> 
                <!-- <div class="pull-right" align="right"><a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"> New Class</a></div> -->
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="45%">Class Name</th>
                        <th width="15%">Cordinator</th>
                        <th width="12%">  e-Mail</th>
                        <th width="10%"> Phone No</th>
                        <th style="text-align: center;">Total In Class</th>
                        <th style="text-align: center;">Total Started & Not Finish</th>
                        <th style="text-align: center;">Total In Graduated</th>
                        <th> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($classcat as $count => $class)
                                <td>{{ ++$count }}</td>  
                                <td><a href="{{route('classes.one', \Crypt::encrypt($class->id)) }}"> <b>{{ $class->cat_name }}</b></a></td>
                                <td>{{ isset($class->getCordinator) ? $class->getCordinator->pst_name : " NA"}}</td>
                                <td>{{ $class->email }}</td>
                                <td>{{ $class->phoneno }}</td>
                                <td align="center">
                                    @if($class->id  == 1)
                                        {{ number_format(count(\App\People::where('fclass_status', 1)->get()), 0) }}
                                    @elseif($class->id  == 2)
                                        {{ number_format(count(\App\People::where('dltc_status', 1)->get()), 0) }}
                                    @elseif($class->id  == 3)
                                        {{ number_format(count($class->getdusomPeople), 0) }}
                                    @endif
                                </td>
                                <td align="center">{{ 0 }}</td>
                                <td align="center">{{ 0 }}</td>
                                <td align="center">{{ 0 }}</td>

                            </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div id="echart_pie" class="height-300"></div>
        <hr>
    </div>

</div>
@endsection
@section('scripts')

@endsection