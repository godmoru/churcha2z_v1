@extends('layouts.master')

@section('content')
<div class="row row-eq-height col-md-12">
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="newdept">
            @include('workforce.new')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-cubes 2x blue-text"></i> <strong class="text-uppercase"> Workforce Departments </strong> 
                <div class="pull-right" align="right">
                  <a data-toggle="collapse" data-target="#newdept" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Add Department</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th>S/No</th>
                            <th width="20%">Department Name</th>
                            <th width="15%">HOD</th>
                            <th width="15%">Dept e-Mail</th>
                            <th width="15%">Dept Phone No</th>
                             <th width="15%">HOD e-Mail</th>
                            <th width="15%">HOD Phone No</th>

                            <th width="15%">Total Members</th>
                            <th ><center>Current Status</center></th>
                        </tr>
                    </thead>
                     <tbody>
                         @foreach($depts as $count => $dept)
                        <tr>
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('workforce.depts.one', \Crypt::encrypt($dept->id)) }}"> <b>{{ $dept->dept_name}}</b></a></td>
                            <td>{{ $dept->dept_hod}}</td>
                            <!-- <td>{{ isset($dept->ActiveHod) ? $dept->ActiveHod->surname : "Not Assigned"  }}</td> -->
                            <td>{{ $dept->dept_email}}</td>
                            <td>{{ $dept->dept_phone}}</td>
                            <td>{{ $dept->hod_email}}</td>
                            <td>{{ $dept->hod_phone}}</td>
                            <td align="center">{{ isset($dept->getMembers) ? number_format(count($dept->getMembers),0) : "0"  }}</td>
                            <td align="center">
                                @if($dept->status == 1)
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