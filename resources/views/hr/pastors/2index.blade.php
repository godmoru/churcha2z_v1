@extends('layouts.master')

@section('content')
<div class="container-fluied">
<div class="row my-">
    <div class="col-md-12">
        <div class=" card">
            <div class="card-header white">
                <i class="icon-person_outlined blue-text"></i> <strong class="text-uppercase"> All Resident Pastors </strong> 
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="6%" align="center">S/No</th>
                        <th style="color: white;">Image</th>
                        <th>Full Name</th>
                        <th>Phone Nos</th>
                        <th>Contact  e-Mail</th>
                        <th>Current Location</th>
                        <th>Location Address</th>
                        <th>Responsibility</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($pastors as $count => $pst)
                                <td align="center">{{ ++$count }}</td>  
                                <td align="center"><img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 50px; width: 50px;"></td>  
                                <td class=""><b>{{ $pst->surname.' '.$pst->othernames }}</b></td>
                                <td>{{ $pst->phone1. ', '.$pst->phone2 }}</td>
                                <td class="">{{ $pst->email }}</td>
                                <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_name : " Not set"}}</td>
                                <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_add : " Not set"}}</td>
                                <td class="text-">
                                    <?php $pastortype = json_decode($pst->pastor_type_id);?>
                                    @foreach($pastortype as $ptype)
                                       {{App\PastorType::find($ptype)->name}}<br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
</div>
@endsection