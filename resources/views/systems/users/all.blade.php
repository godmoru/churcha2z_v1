@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
    <div class="container-fluid">
        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
            <div class="col-md-12">

                <div class=" card white"  align="">
                    <div class="card-header white">
                        <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> System Users Index </strong> 
                        <div class="pull-right" align="right">
                            <a data-toggle="modal" data-target="#newUser" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"> <i class="icon-group_add"></i> New User</a>
                            @role('hr-admin|snr-management|administrator')
                            <a href="{{route('converts.print') }}" class="btn btn-success btn-xs"><i class="icon-download"></i> Download Activity Log</a>
                           <button id="deleteMultiple" name="deleteMultiple" type="submit" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i> Delete Selected </button>
                           @endrole
                        </div>
                    </div>
                    <div class="card-body">
                       <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                        <thead>
                            <tr>
                                @role('admin|administrator')
                                <th></th>
                                @endrole
                                <th>S/N</th>
                                <th>Full Names </th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>e-Mail</th>
                                <th>Role(s)</th>
                                <th width="7%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sn = 1;?>
                        
                        @foreach($users as $user)
                            <tr>
                            @role('admin|administrator')
                            <td style="font-size: 10px;"><input type="checkbox" name="selected[]" value="{{$user->id}}" id="selectedChk"></td>
                            @endrole
                                <td>{{$sn}}</td>
                                <td><a href="{{route('user.profile', \Crypt::encrypt($user->id))}}" class="link"> {{$user->first_name.' '.$user->last_name}}</a></td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->phone_no}}</td>
                                <td>{{$user->email}}</td>
                                <td align="left">
                                    <?php $roles = $user->getRoles(); ?>
                                        @if(count($roles)>0)
                                            @foreach($roles as $role)
                                            {{ UCfirst($role) }}<br />
                                            @endforeach
                                            @else
                                            N/A
                                        @endif
                                </td>
                                <td align="center">
                                    @if($user->status == 1)
                                    <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active</span></span>
                                    @else
                                    <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Inactive</span></span>
                                    @endif
                                </td>
                            </tr>
                        <?php $sn++;?>
                        @endforeach
                        </tbody>
                    </table>               
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</header>
@include('systems.users.new')
@endsection
@section('scripts')

@endsection