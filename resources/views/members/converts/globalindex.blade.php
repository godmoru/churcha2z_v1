@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
                <div class="card ">
        <div class="row">
        
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
                            <td><a href="{{route('converts.one', $convt->id) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
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
</script>
@endsection