@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">

        <div class=" card b-2">
            <div class="card-header white">
                <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> System Roles Index </strong> 
                <div class="pull-right" align="right">
                    <a data-toggle="modal" data-target="#newRole" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"> <i class="icon-group_add"></i> New Role</a>
                    <a href="{{route('converts.print') }}" class="btn btn-success btn-xs"><i class="icon-download"></i> Download Activity Log</a>
                </div>
            </div>
            <div class="card-body slimScroll">
                   <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                <thead>
                    <tr>
                        <th width="5%">S/N</th>
                        <th>Role </th>
                        <th style="text-align: center;">Users in Role</th>
                        <th>Role Permissions</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sn = 1;?>
                @foreach($roles as $role)
                    <tr>
                        <td>{{$sn}}</td>
                        <td><a href="{{url('/system/rbac/role/data/'.\Crypt::encrypt($role->id))}}" class="link"> {{$role->name}}</a></td>
                        <td align="center">{{isset($role->users) ? count($role->users): "0"}}</td>
                        <td align="left">
                               <!--  if(count($role->perms)>0)
                                    foreach(perms as perm)
                                     UCfirst($perm) <br />
                                    endforeach
                                   else
                                    No permission(s) associated with this role. You can assign one or more permissions to this role.
                                endif -->
                        </td>
                        <td align="center">
                            @if($role->status == 1)
                            <span class="badge badge-success"><span class="blink"><i class="icon icon-circle mr-2"></i>Active Role</span></span>
                            @else
                            <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Inactive Role</span></span>
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
</div>
@include('systems.acl.roles.new')
@endsection
@section('scripts')

@endsection