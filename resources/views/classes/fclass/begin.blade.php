@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">

    <div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New Convert & Others foundation class registration form</h4> <hr>
        <form class="form-material" action="{{ route('classes.fclass.addFClass1') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="fullnames" id="fullnames" required />
                            <input type="hidden" class="form-control" name="pid" id="pid" required />
                            <label class="form-label"> Full Names</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" id="phone" required onkeyup="FindPerson();" />
                            <label class="form-label">Phone No 1</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="dsfclass" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                            <label class="form-label">Date Class Started</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select select2" required name="classId" id="classId">
                        <option value="">Active Class/Batch</option>
                        @foreach($fclasses as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="col-md-1"></div>
                @role('counselor-head|administrator|resident-pastor|senior-pastor')
                <div class="col-ms-4 text-center pull-right" align="right">
                    <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-xs mt-2 btn-block"> Add To Class</button>
                        <a href="{{route('classes.fclass.printClass1')}}" class="btn btn-outline-primary btn-block btn-xs pull-right"> <i class="icon-download"></i> Download Attendance List </a>
                    </div>
                </div>
                @endrole


            </div>

        </form>
<hr>
        <div class="row">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>

                      <thead>
                      <tr>
                        <th width="5%"> S/No. </th>
                        <th> Name </th>
                        <th> Phone No </th>
                        @role('counselor|administrator')
                        <th style="text-align: center;" width="6%"> Class 1 </th>
                        <th style="text-align: center;" width="6%"> Class 2 </th>
                        <th style="text-align: center;" width="6%"> Class 3 </th>
                        <th style="text-align: center;" width="6%"> Class 4 </th>
                        <th style="text-align: center;" width="6%"> Class 5 </th>
                        <th style="text-align: center;" width="6%"> Class 6 </th>
                        @endrole
                        <th style="text-align: center;" width="15%"> Class Progress </th>
                      </tr>
                      </thead>
                        <tbody>
                            @foreach($attendances as $count => $att)
                            <tr class="">
                                <td align="center">{{++$count}}</td>
                                <td> {{strtoupper($att->people->fullnames)}}</td>
                                <td> {{strtoupper($att->people->phone1. ', '.$att->people->phone2)}}</td>
                                @role('counselor|administrator')
                                <td>
                                    <center>
                                        @if($att->class_1_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($att->class_2_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($att->class_3_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($att->class_4_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($att->class_5_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($att->class_6_status == 1)
                                        <input type="checkbox" checked disabled="" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @else
                                        <input type="checkbox" name="class_1_status[]" value="{{$att->id}}" id="selectedChk"/>
                                        @endif
                                    </center>
                                </td>
                                @endrole
                                <td>
                                    <div class="my-0">
                                        <small>16.7% Completed</small>
                                        <div class="progress" style="height: 3px;">
                                            <div class="progress-bar success" role="progressbar" style="width: 16.7%;" aria-valuenow="16.7" aria-valuemin="0" aria-valuemax="16.7"></div>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                            </tr>
                            @role('counselor|administrator')
                            <tr >
                                <td colspan="3"></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td align="center"><button type="submit" class="btn btn-primary btn-xs">Submit</button></td>
                                <td></td>
                            </tr>
                            @endrole
                        </tbody>
                      </table>
            </div>
        </div>
    </div>
</div>
<br>
   <!--  <div class="col-md-12">
        <div class="row collapse col-md-12" id="newconvert">
            @include('classes.fclass.searchbeforeaddtoclass')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Converts Index </strong> 
                <div class="pull-right" align="right">
                    <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-search"></i> Search Convert</a>
                </div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="17%">Full Name</th>
                        <th width="25%">Location</th>
                        <th width="10%"> Phone No</th>
                        <th width="5%">Category</th>
                        <th>SVC</th>
                        <th>Found. Class</th>
                        <th> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($converts as $count => $convt)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('converts.one', $convt->id) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                            <td>{{ $convt->phone1 }}</td>
                            <td align="">{{$convt->getCategory->short_name }}</td>
                            <td align="center">{{$convt->serviceT->name }}</td>
                            <td align="center">
                                @if($convt->fclass_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->membership_decision  == 1)
                                Decided
                                @else
                                Not decided
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>                
            </div>
        </div>
    </div> -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function FindPerson() {
    obj = new Object();
    obj._token = "{{csrf_token() }}";
    obj.phone = document.getElementById("phone").value;
    $.ajax({
        url:"{{ route('findConvert') }}",
        method:"post",
        data:obj,
        success:function(resp){
            var objects = JSON.parse(resp);
            for(var i in objects){
                document.getElementById("fullnames").value = objects[i].fullnames
                document.getElementById("pid").value = objects[i].id
                document.getElementById("phone").value = objects[i].phone1
            }
        }
        // error:function(resp){
        //     alert('The record do not match any of the persons registered before now. You can add him/her to the class directly from here.');
        // }
    });
}
</script>
@endsection