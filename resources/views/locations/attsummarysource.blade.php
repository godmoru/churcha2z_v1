@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Service Count Summary </strong> 
                <div class="pull-right" align="right">
                	<b class="text-uppercase"> Records for {{ date('jS M, Y')}} by count sections</b> <a data-toggle="modal" data-target="#dategetATT" class="btn btn-xs btn-success"> <i class="icon-pencil"></i> Get By Date/Service</a>
                </div>
            </div>
            <div class="card-body">
            	@if(count($attendances) > 0)
				<table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
					<thead>
						<th width="2%" style="font-weight: bold; text-align: center;">#</th>
						<th width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Count Area</th>
						<th width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Male</th>
						<th width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Female</th>
						<th width="5%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Children</th>
						<th width="9%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Total</th>
						<th width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Actions</th>
						<th width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Actions</th>
					</thead>
					<tbody>
						<tr>
						@foreach($attendances as $count => $aTT)
						    <td>{{ ++$count }}</td>  
						    <td><a href=""> <b>{{ strtoupper($aTT->countArea->name) }}</b></a></td>
						    <td align="center"> <b>{{ number_format($aTT->male,0) }}</b></td>
						    <td align="center"> <b>{{ number_format($aTT->female,0) }}</b></td>
						    <td align="center"> <b>{{ number_format($aTT->children,0) }}</b></td>
						    <td align="center"> <b>{{ number_format($aTT->male + $aTT->female + $aTT->children,0) }}</b></td>
						    <td align="center" width="4%"><a data-male="{{$aTT->male}}" data-female="{{$aTT->female}}" data-children="{{$aTT->children}}"  data-id="{{$aTT->id}}" data-toggle="modal" data-target="#editAttRecord" class="btn btn-xs btn-warning orange accent-1"> <i class="icon icon-pencil"></i>Edit</a></td>
						    <td align="center" width="3%"><a data-id="{{$aTT->id}}" data-toggle="modal" data-target="#deleteAttRecord" class="btn btn-xs btn-danger red accent-1"> <i class="icon icon-trash"></i>Delete</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>

				@else

				<div class="h3 text-center jumbotron bg-light"> There are no attendance taken for today. You can select a date from <a class="btn btn-success btn-xs" data-toggle="modal" data-target="#dategetATT">here </a> to modify or edit its record(s). Thank you.</div>
				@endif

			</div>
		</div>
	</div>
	@include('locations.modals.editattendancerecord')
	@include('locations.modals.deleteattendancerecord')
	@include('locations.modals.getattendancedetailsbydate')
</div>

@endsection