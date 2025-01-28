@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow">
    <div class="container-fluid">
        <div class="row col-md-12 col-lg-12 ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <div class="card-header white">
                        <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Locations </strong> 
                        <div class="pull-right" align="right"><a href="{{route('locations.printplantingInfo',\Crypt::encrypt('id'))}}" class="btn btn-primary btn-xs"><i class="icon-print"></i> Print Report</a></div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th style="text-transform: uppercase;">S/No</th>
                                    <th style="text-transform: uppercase;">Location Name</th>
                                    <th style="text-transform: uppercase;">Parent Location</th>
                                    <th style="text-transform: uppercase;">Parent Location Presiding Pastor</th>
                                    <th style="text-transform: uppercase;">1st Resident Pastor</th>
                                    <th style="text-transform: uppercase;">Date Planted</th>
                                    <th style="text-transform: uppercase;">Other Locations Planted</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                    @foreach($locations as $count => $locs)
                                        <td>{{ ++$count }}</td>  
                                        <td><a href="{{route('locations.one', \Crypt::encrypt($locs->id)) }}"> <b>{{ $locs->loc_name }}</b></a></td>
                                        <td align="">{{ isset($locs->parentLoc) ? $locs->parentLoc->loc_name : "Not set yet" }}</td>
                                        <td align="">{{ isset($locs->plantingPst) ? $locs->plantingPst->surname .' '.$locs->plantingPst->othernames : "Not set yet" }}</td>
                                        <td align="">
                                            <!-- @if($locs->poineeringPst &&  $locs->poineeringPst->first_resident_pastor_id ==99999999)
                                                    <b>{{$locs->first_resident_pastor_other_name}}</b>
                                                @else
                                                    <a href="">{{isset($locs->poineeringPst) ? $locs->poineeringPst->surname.' '.$locs->poineeringPst->othernames : "Unspecified"}}</a>
                                                @endif -->
                                            <!-- {{isset($locs->firstResPst) ? $locs->firstResPst->surname : "No"}} -->

                                            @if(!isset($locs->poineeringPst))
                                                @if($locs->first_resident_pastor_id == 99999999)
                                                    {{$locs->first_resident_pastor_other_name}}
                                                @endif
                                            @endif
                                            @if($locs->poineeringPst)
                                            {{isset($locs->poineeringPst) ? $locs->poineeringPst->surname.' '.$locs->poineeringPst->othernames : "Unspecified"}}
                                            @endif
                                        </td>
                                        <td align="center">{{ $locs->date_planted }}</td>
                                        <td align="center">{{ isset($locs->locPlanted) ? number_format($locs->locPlanted->count(),0) : "0" }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection