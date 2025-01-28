@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
                <div class="card ">
        <div class="row">
            <div class="col-md-3">
                    <!-- <div class="card-header white">
                        <h6>Pie Graph</h6>
                    </div> -->
                    <div class="card-body">
                        <div id="echart_pie" class="height-100" _echarts_instance_="ec_1541716607424" style="-webkit-tap-highlight-color: transparent; user-select: none; position: relative;"><div style="position: relative; overflow: hidden; width: 388px; height: 100px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas data-zr-dom-id="zr_0" width="388" height="300" style="position: absolute; left: 0px; top: 0px; width: 388px; height: 100px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(0, 0, 0, 0.5); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px/21px Arial, Verdana, sans-serif; padding: 5px; left: 89px; top: 69px;">DA <br>Direct Access : 335 (13.08%)</div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <br><br><br>
                    {!!DNS1D::getBarcodeHTML('2018DIGCCONVERTS', "C128A",1);!!}
                </div> -->
        @if(\Auth::user()->location_id ==1)

                <div class="col-md-3">
                <a href="{{ route('converts.global-index') }}">
                <div class="p-3 green lighten-3 text-white">
                    <h5 class="font-weight-normal text-white s-14 text-uppercase">Worldwide Converts Coverage</h5>
                    <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($allnewconverts) + count($firsttimers) , 0) }}</span>
                    <div> 
                        <span class="text-primary">
                            <i class="icon icon-arrow_downward"></i> 21.32%</span>
                    </div>
                </div>
                </a>
            </div>
            @else
            <div class="col-md-3">
                
            </div>
            @endif

                <div class="col-md-3">
                <a href="{{ route('converts.newconverts') }}">
                <div class="p-3 blue lighten-3 text-white">
                    <h5 class="font-weight-normal text-white s-14">New Converts</h5>
                    <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($newconverts), 0) }}</span>
                    <div> Global %
                        <span class="text-primary">
                            <i class="icon icon-arrow_downward"></i> 21.32%</span>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('converts.firsttimers') }}">
                <div class="p-3 blue lighten-4 text-white">
                    <h5 class="font-weight-normal s-14">First Timers</h5>
                    <span class="s-48 font-weight-lighter amber-text bolder">{{ number_format(count($firsttimers), 0) }}</span>
                    <div> Global % 
                        <span class="amber-text">
                            <i class="icon icon-arrow_downward"></i> 5.67%</span>
                    </div>
                </div>
                </a>
            </div>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="newconvert">
            @include('members.converts.modals.newconvert')
        </div>
        <div class="row collapse col-md-12" id="searchConverts">
            @include('members.converts.modals.searchconverts')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> New Converts & First Timers Index </strong> 
                <div class="pull-right" align="right">
                    <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-people_outline"></i> New Convert</a>
                    <a href="{{route('converts.print') }}" class="btn btn-warning btn-xs"> <i class="icon-download"></i> Download All List</a>
                    <a href="{{route('converts.printtodays') }}" class="btn btn-success btn-xs"> <i class="icon-download"></i> Download Todays List</a>
                    <a data-toggle="collapse" data-target="#searchConverts" class="btn btn-outline-success btn-xs"> <i class="icon-search"></i> Filter Records</a>
                    <a data-toggle="modal" data-target="#datedownload" class="btn btn-primary btn-xs"> <i class="icon-download"></i> Download By Date/Districts</a>

                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%">S/No</th>
                        <th width="22%">Full Name</th>
                        <th width="20%">Location</th>
                        <!-- <th> e-Mail</th> -->
                        <th width="10%"> Phone No</th>
                        <th width="5%">Category</th>
                        <th>SVC</th>
                        <th>Found. Class</th>
                        <th>DLTC</th>
                        <th> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($converts as $count => $convt)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('converts.one', \Crypt::encrypt($convt->id)) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                            <!-- <td>{{ $convt->email }}</td> -->
                            <td>{{ $convt->phone1 }}</td>
                            <td align="">{{isset($convt->getCategory) ? $convt->getCategory->short_name : "Not Defined" }}</td>
                            <td align="center">{{isset($convt->serviceT) ? $convt->serviceT->name : "Not Defined"}}</td>
                            <td align="center">
                                @if($convt->fclass_status  == 1)
                                Yes
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($convt->dltc_status  == 1)
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
    </div>
</div>
@include('dhc.districts.modals.datedownloads')
@endsection
@section('scripts')
    <!-- Page Script  -->
     <?php
        $states = \App\State::all(); 
        $lgas = \App\Lga::all();            
    ?>
    <script hidden="">
      var states = <?= json_encode($states); ?>;
      var lgas = <?= json_encode($lgas); ?>;
    </script>

<script type="text/javascript">
    //<!-- State & Lgas -->
         $("select[name=state]").on('change',function(){
            var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
                var options = '<option value="">Select LGA of Origin</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=lga]").replaceWith(select);
        });
        
        
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