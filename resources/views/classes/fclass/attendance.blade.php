@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
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
                        <th width="5%"> S/No. </th>
                        <th> Name </th>
                        <th> Phone No </th>
                        <th style="text-align: center;" width="10%"> Class 1 </th>
                        <th style="text-align: center;" width="10%"> Class 2 </th>
                        <th style="text-align: center;" width="10%"> Class 3 </th>
                        <th style="text-align: center;" width="10%"> Class 4 </th>
                        <th style="text-align: center;" width="10%"> Class 5 </th>
                        <th style="text-align: center;" width="10%"> Class 6 </th>
                        <!-- <th style="text-align: center;"> Class Note </th> -->
                      </tr>
                      </thead>
                        <tbody>
                            @foreach($attendances as $count => $att)
                            <tr class="">
                              <td align="center">{{++$count}}</td>
                              <td> {{strtoupper($att->people->fullnames)}}</td>
                              <td> {{strtoupper($att->people->phone1. ', '.$att->people->phone2)}}</td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <td><center><input type="checkbox" name="class_1[]" value="{{$att->id}}" id="selectedChk"/></center></td>
                              <!-- <td><input type="text" class="form-control form-control-sm" name="class_note" id="class-note"/></td> -->
                            @endforeach
                            </tr>
                            <tr >
                                <td colspan="3">
                                    
                                </td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                </form>               
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection