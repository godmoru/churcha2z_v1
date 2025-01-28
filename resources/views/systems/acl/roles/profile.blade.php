@extends('layouts.master')

@section('content')
<!-- start: PAGE TITLE -->
<section id="page-title">
	<div class="row">
		<div class="col-sm-12">
			<h4 class="mainTitle">{{$role->name}}'s PROFILE</h4>
			<span class="mainDescription">This is the profile information of the  <b>{{$role->name}}</b>. Any details not found here does not exist for this role.</span>
		</div>
	</div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: USER PROFILE -->
<div class="container-fluid container-fullw bg-white">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-4 col-md-4">
					<div class="user-left">
						<div class="center">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<br><br>
								<div class="user-image">
									<div class="fileinput-new">
										<img src="{{asset('images/ondo-logo.png')}}" alt="" style="width: 338px; height: 78px;">
									</div>
								</div>
							</div>
							<hr>
						</div>
						
						<table class="table">
							<thead>
								<tr>
									<th style="text-align: center; text-transform: uppercase;" colspan="3" align="center">Permission(s) information</th>
								</tr>
							</thead>
							<tbody>  
								<tr>
									<td>
										Permissions:
									</td>
									<td>
										
									</td>
								</tr>     
								<tr>
									<td>Status</td>
									<td>
										@if($role->status == 1)
										<span class="label label-sm label-orange">Active</span>
										@else
										<span class="label label-sm label-danger">Inactive</span>
										@endif
									</td>
								</tr>
								<tr>
									<td colspan="2" >
										<a class="btn btn-orange btn-xs btn-block" data-toggle="modal" data-target="#editRole" > Edit Role</a>
										<a class="btn btn-info btn-xs btn-block" data-toggle="modal" data-target="#addPerm" > Add Permissions</a>
										<a class="btn btn-warning btn-xs btn-block" data-toggle="modal" data-target="#revokePerm" > Revoke Permissions</a>
										<a class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#deletePerm">Delete Role</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-8 col-md-8">
					<div class="panel panel-white" id="activities">
						<div class="panel-heading border-light">
							<h4 class="panel-title text-orange text-uppercase">Role Users</h4>
							<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
						</div>
						<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
							<div class="panel-body">
								<table class="table table-border" data-ride="sample_1">
			                        <thead>
			                            <tr>
			                                <th>S/N</th>
			                                <th>Full Name </th>
			                                <th>Phone No. </th>
			                                <th>Last Action Group</th>
			                                <th>Status</th>
			                            </tr>
			                        </thead>
			                        <tbody>
			                        <?php $sn = 1;?>
			                        @foreach($role->users as $user)
			                            <tr>
			                                <td>{{$sn}}</td>
			                                <td><a href="{{route('user.profile',\Crypt::encrypt($user->id))}}" class="link"> {{$user->first_name.' '.$user->last_name}}</a></td>
			                                <td>{{$user->phone_no}}</td>
			                                <td>Login</td>
			                                <td>
			                                    @if($user->status == 1)
			                                    <span class="label bg-orange">Active</span>
			                                    @else
			                                    <span class="label bg-danger">Inactive</span>
			                                    @endif
			                                </td>
			                            </tr>
			                        <?php $sn++;?>
			                        @endforeach
			                        </tbody>
			                    </table>
							</div>
						</div>
					</div>
					<p align="justify" class="h5 text-justify"> {{$role->description}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: USER PROFILE -->
@include('systems.acl.roles.edit')
@endsection