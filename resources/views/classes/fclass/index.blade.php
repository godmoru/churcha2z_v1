@extends('layouts.master')

@section('content')
 <div class="row collapse col-md-12" id="newclass">
    @include('classes.fclass.new')
</div>
<header class="white pt-3 relative shadow"">
    <div class="container-fluid">

        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
            <div class=" card b-0">
                <div class="card-header white">
                    <i class="icon-cubes s-18 blue-text"></i> <strong class="text-uppercase"> Class Batches </strong> 
                    <div class="pull-right" align="right">
                        @can('users.read')
                        @endcan
                        @role('counselor-hod|administrator|fd-supervisor')
                        <a data-toggle="collapse" data-target="#newclass" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-plus-square-o s-18"></i>  Create New Batch</a>
                        @endrole
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                            <tr>
                                <th width="2%">S/No</th>
                                <th width="20%">Batch Name</th>
                                <th width="13%">Started</th>
                                <th width="15%">Ended</th>
                                <th width="25%">Counselor</th>
                                <th width="8%">Phone</th>
                                <th width="7%">Participants</th>
                                <th width="5%">Grad.</th>
                                <th width=8%">Non Grad.</th>
                                <th width=5%">ABS C1</th>
                                <th width=5%">ABS C2</th>
                                <th width=5%">ABS C3</th>
                                <th width=5%">ABS C4</th>
                                <th width=5%">ABS C5</th>
                                <!--<th width=5%">ABS C6</th>-->
                                <!-- <th>Status</th> -->
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($classes as $count => $class)
                            <tr>
                                <td>{{ ++$count }}</td>  
                                <td><a href="{{route('classes.class.batches', \Crypt::encrypt($class->id)) }}"> <b>{{ $class->name }}</b></a></td>
                                <td>{{date_format($class->created_at, "jS M, y")}}</td>  
                                <td>{{date_format($class->created_at, "jS M, y")}}</td>  
                                <td>{{ isset($class->counselor) ? $class->counselor->surname .' '.$class->counselor->othernames : " Not set"}}</td>
                                <td>{{ isset($class->counselor) ? $class->counselor->phone1 : " Not set"}}</td>
                                <td align="center">{{ isset($class->participants) ? number_format(count($class->participants),0) : " 0"}}</td>
                                <td align="center">{{ isset($class->scopeGrad) ? number_format(count($class->scopeGrad),0) : "0"}}</td>
                                <td align="center">{{ isset($class->scopeNonGrad) ? number_format(count($class->scopeNonGrad),0) : "0"}}</td>
                                <td align="center">{{ isset($class->AbsentC1) ? number_format(count($class->AbsentC1),0) : "0"}}</td>
                                <td align="center">{{ isset($class->AbsentC2) ? number_format(count($class->AbsentC2),0) : "0"}}</td>
                                <td align="center">{{ isset($class->AbsentC3) ? number_format(count($class->AbsentC3),0) : "0"}}</td>
                                <td align="center">{{ isset($class->AbsentC4) ? number_format(count($class->AbsentC4),0) : "0"}}</td>
                                <td align="center">{{ isset($class->AbsentC5) ? number_format(count($class->AbsentC5),0) : "0"}}</td>
                                <!-- <td align="center"> 
                                	@if($class->status == 1)
                                    <span class="badge badge-primary"><span class="blink"><i class="icon icon-circle mr-2"></i> In Progress</span></span>
                                    @else
                                    <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Class Finished</span></span>
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
</header>
@endsection
@section('scripts')
    <!-- Page Script  -->

@endsection