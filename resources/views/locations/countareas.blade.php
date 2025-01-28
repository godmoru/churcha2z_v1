@extends('layouts.master')

@section('content')
<div class="row my-3 ">
    <div class="col-md-12">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Service Count Areas </strong> 
                <div class="pull-right" align="right">
                	<!-- <b class="text-uppercase"> Records for {{ date('jS M, Y')}} by count sections</b> <a data-toggle="modal" data-target="#dategetATT" class="btn btn-xs btn-success"> <i class="icon-pencil"></i> Get By Date/Service</a> -->
                </div>
            </div>
            <div class="card-body">
            	@if(count($countareas) > 0)
				<table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
					<thead>
						<th width="2%" style="font-weight: bold; text-align: center;">#</th>
						<th width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Count Area</th>
						<th width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Parent Host</th>
						<th width="35%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Description</th>
						<th width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Actions</th>
						 <th width="8%" style="text-align: center; text-transform: uppercase; font-weight: bold;" >Actions</th> 
					</thead>
					<tbody>
						<tr>
						@foreach($countareas as $count => $countarea)
						    <td>{{ ++$count }}</td>  
						    <td><a href=""> <b>{{ strtoupper($countarea->name) }}</b></a></td>
						    <td>
						    	@if($countarea->count_area_classification == 1)
						    	Main Bowl
						    	@elseif($countarea->count_area_classification == 2)
						    	Under Gallery
						    	@elseif($countarea->count_area_classification == 3)
						    	Gallery I
						    	@elseif($countarea->count_area_classification == 4)
						    	Gallery II
						    	@elseif($countarea->count_area_classification == 5)
						    	Overflow
						    	@elseif($countarea->count_area_classification == 6)
						    	Additionals
						    	@else
						    	Undefined
						    	@endif
						    </td>
						    <td>{{ $countarea->description }}</td>
						    <td align="center" width="4%"><a data-id="{{$countarea->id}}" data-title="{{$countarea->name}}" data-description="{{$countarea->description}}" data-toggle="modal" data-target="#editCountArea" class="btn btn-xs btn-warning orange accent-1"> <i class="icon icon-pencil"></i>Edit</a></td>
						    <td align="center" width="3%"><a data-id="{{$countarea->id}}" data-toggle="modal" data-target="#deleteCountArea" class="btn btn-xs btn-danger red accent-1"> <i class="icon icon-trash"></i>Delete</a></td>
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
	@include('locations.modals.editcountarea')
	@include('locations.modals.deletecountarea')
</div>

@endsection