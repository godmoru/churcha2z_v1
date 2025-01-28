@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-9">
        <div class="row collapse col-md-12" id="newconvert">
            @include('classes.new')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> Converts Index For Foundation Class </strong> 
            </div>
            <div class="card-body slimScroll">
                <form class="form" action="{{route('classes.fclass.start')}}" method="POST">
                    <div class="form-body">
                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>

                      <thead>
                      <tr>
                        <th> S/No. </th>
                        <th> Name </th>
                        <th style="text-align: center;"> Class 1 </th>
                        <th style="text-align: center;"> Class 2 </th>
                        <th style="text-align: center;"> Class 3 </th>
                        <th style="text-align: center;"> Class 4 </th>
                        <th style="text-align: center;"> Class 5 </th>
                        <th style="text-align: center;"> Class 6 </th>
                        <!-- <th style="text-align: center;"> Class Note </th> -->
                      </tr>
                      </thead>
                        <tbody>
                            @foreach($participants as $count => $part)
                            <tr class="">
                              <td align="center">{{++$count}}</td>
                              <td> {{strtoupper($part->fullnames)}}</td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$part->id}}" id="selectedChk"/></center></td>
                              <!-- <td><input type="text" class="form-control form-control-sm" name="class_note" id="class-note"/></td> -->
                            @endforeach
                            </tr>
                            <tr class="">
                                <td colspan="9" align="center">
                                    <button type="submit" class="btn btn-primary btn-sm">Start Class</button>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                </form>               
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <form class="form-inline" action="#" method="post">
                    <label> Search by Date enrolled</label>&ensp;
                    <input type="text" name="startdate" required class="date-time-picker form-control form-control-sm" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}"/>
                    <button type="submit" class="btn btn-primary mt-2 btn-block"><i class="icon-search mr-2"></i>Search</button> 
                </form>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">

            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')

@endsection