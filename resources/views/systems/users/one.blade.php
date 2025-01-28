@extends('layouts.master')

@section('content')

<?php
    $fpath = public_path().'/images/users/'.$user->id.'.png';
?>
<!-- start: PAGE TITLE -->
<section id="page-title">
	<div class="row">
		<div class="col-sm-12">
			<h4 class="mainTitle text-bold">{{$user->first_name}} PROFILE</h4>
			<span class="mainDescription">This is the profile information of the  {{$user->first_name}}. Any details not found here does not exist for this MDA.</span>
		</div>
	</div>
</section>
<!-- end: PAGE TITLE -->
<!-- start: USER PROFILE -->
<div class="container-fluid container-fullw bg-white">
	<div class="row">
		<div class="col-md-12">
			<div class="tabbable">
				<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
					<li class="active">
						<a data-toggle="tab" href="#panel_overview">
							{{$user->surname}}  Overview
						</a>
					</li>
					@role('admin')
					<li>
						<a data-toggle="tab" href="#panel_staff">
							Staff Records Updated/Captured
						</a>
					</li>
					@endrole
				</ul>
				<div class="tab-content">
					<div id="panel_overview" class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-4 col-md-4">
								<div class="user-left">
									<div class="center">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<br><br>
											<div class="user-image">
												<div class="fileinput-new">
													@if (file_exists($fpath))
				                                        <img src="{{asset('images/users/'.$user->id.'.png')}}" class="" style="height: 150px; width: 190px;"> 
				                                    @else
				                                        <img src="{{asset('images/users/no-pic.jpg')}}" class="img-circle" style="height: 150px; width: 190px;"> 
				                                    @endif
												</div>
												@if (!file_exists($fpath))
												<a data-toggle="collapse" data-target="#takeimage" aria-expanded="false" aria-controls="collapseExample" class="btn btn-xs btn-orange"><i class="ti ti-camera"></i></a>
												@endif
											</div>
										</div>
										<hr>
									</div>
									
									<table class="table">
										<thead>
											<tr>
												<th style="text-align: center; text-transform: uppercase;" colspan="3" align="center">Role(s)/Permission(s) information</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td>Role(s):</td>
												<td>
													<?php $roles = $user->getRoles(); ?>
		                                        	@if(count($roles)>0)
		                                            @foreach($roles as $role)
														<a href="{{route('role.profile', \Crypt::encrypt(1))}}">{{ UCfirst($role) }}</a><br />
													@endforeach
		                                            @else
		                                            <h5>No Role(s) found for <strong>{{$user->surname}}</strong></h5>
		                                       		 @endif
												</td>
		                                    </tr>
		                                            
											<tr>
												<td>Status</td>
												<td>
													@if($user->status == 1)
													<span class="label label-sm label-orange">Active</span>
													@else
													<span class="label label-sm label-danger">Inactive</span>
													@endif
												</td>
											</tr>
											<tr class="">
												<td colspan="2" class="col-md-6 col-sm-12" align="center">
													<a class="btn btn-orange btn-xs" data-toggle="modal" data-target="#editUser" > Edit User</a>
													<a class="btn btn-info btn-xs " data-toggle="modal" data-target="#addRole" > Add Role</a>
													<a class="btn btn-warning btn-xs " data-toggle="modal" data-target="#revokeRole" > Revoke Role(s)</a>
													<a class="btn btn-danger btn-xs " data-toggle="modal" data-target="#deleteUser">Delete User</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-8 col-md-8">
								<div class="row collapse" id="takeimage">
				                    @include('systems.users.takepic')
				                </div>
								<div class="panel panel-white" id="activities">
									<div class="panel-heading border-light">
										<h4 class="panel-title text-orange">Recent Activities</h4>
										<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
									</div>
									<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
										<div class="panel-body">
											<ul class="timeline-xs">
												<li class="timeline-item success">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															2 minutes ago
														</div>
														<p>
															Updated & Capture Olundare's records
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															12:30
														</div>
														<p>
															Logged into the system.
														</p>
														
													</div>
												</li>
												<li class="timeline-item info">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															11:11
														</div>
														<p>
															<a class="text-info" href>
																{{$user->surname}}
															</a>
															has completed his account setup.
														</p>
														
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="panel_staff" class="tab-pane">
						all staff in this guy capture <br><br> !!coming soon
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end: USER PROFILE -->
@include('systems.users.edit')
@include('systems.users.editaddrole')
@include('systems.users.editremoverole')
@endsection