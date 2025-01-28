@extends('layouts.master')

@section('content')

<section id="page-title">
</section>
<!-- end: PAGE TITLE -->
<!-- start: USER PROFILE -->
<div class="container-fluid container-fullw bg-white">
	<div class="row">
		<div class="col-md-12">
			<h5 class="over-title margin-bottom-15">System <span class="text-bold">Activity Logs</span></h5> 
			<p>
				Records of  <strong>activities on the system</strong>. Every users' activities is capture here.
			</p>
            <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>

				<thead>
					<tr>
                        <th>S/N</th>
                        <th>Action Dated </th>
                        <th>User</th>
                        <th>IP Address</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Activity Class</th>
                        <th>Comment</th>
                    </tr>
				</thead>
				<tbody>
					@foreach($logs as $key => $aLog)
                        <tr>
                            <td width="6%">{{++$key}}</td>
                            <td width="18%"><a href="{{url('/system/audit/log/data/'.\Crypt::encrypt($aLog->id))}}" class="link"> {{date_format($aLog->created_at, "jS M, Y"." --@-- " ."h:m:s a")}}</a></td>
                            <td width="12%">{{$aLog->getUser->first_name.' '.$aLog->getUser->last_name}}</td>
                            <td width="9%" align="">{{$aLog->remote_address}}</td>
                            <td width="9%" align="">{{$aLog->long}}</td>
                            <td width="9%" align="">{{$aLog->lat}}</td>
                            <td width="20%" align="">{{$aLog->action}} </td>
                            <td width="20%">{{$aLog->comment}}</td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection