@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <hr><br>
    <div class="col-md-12">
       
        <div class="row collapse col-md-12" id="newdistrict">
            @include('dhc.districts.modals.new')
        </div>

        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> DHC Districts </strong> 
                <div class="pull-right" align="right">
                    <!-- <a href="{{route('dhc.converts.printtodays') }}" class="btn btn-success btn-xs"> <i class="icon-download"></i> Download Todays List</a> -->
                    <a data-toggle="collapse" data-target="#newdistrict" class="btn btn-primary btn-xs"> <i class="icon-plus"></i> New District</a>
                    <a href="{{route('converts.dailysummary') }}" class="btn btn-success btn-xs"> <i class="icon-download"></i> View Daily Summary</a>
                    <a data-toggle="modal" data-target="#datedownload" class="btn btn-warning btn-xs"> <i class="icon-download"></i> Download By Date/Districts</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="1%">S/No</th>
                        <th width="12%" style="text-transform: uppercase;">District Names</th>
                        <th width="16%" style="text-transform: uppercase;">Location</th>
                        <th width="12%" style="text-transform: uppercase;"> Contact Name</th>
                        <th width="11%" style="text-transform: uppercase;"> Contact Phone</th>
                        <th width="5%" style="text-transform: uppercase; text-align: center;"> Zones</th>
                        <th width="5%" style="text-transform: uppercase; text-align: center;"> Areas</th>
                        <th width="5%" style="text-transform: uppercase; text-align: center;"> Home Cells</th>
                        <th width="10%" style="text-transform: uppercase; text-align: center;">First Timers</th>
                        <th width="10%" style="text-transform: uppercase; text-align: center;">New Converts</th>
                        <th width="9%" style="text-transform: uppercase; text-align: center;">Daily Evang.</th>
                        <!-- <th width="10%" style="text-transform: uppercase; text-align: center;" colspan="3"> Action</th> -->
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($districts as $count => $dist)
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('dhc.districts.one', \Crypt::encrypt($dist->id)) }}"> <b>{{ strtoupper($dist->dis_name) }}</b></a></td>
                            <td>{{ strtoupper($dist->getLocation->loc_name) }}</td>
                            <td>{{ strtoupper($dist->contact_name) }}</td>
                            <td>{{ strtoupper($dist->contact_phone) }}</td>
                            <td align="center">{{ number_format(count($dist->getZones),0) }}</td>
                            <td align="center">{{ number_format(count($dist->getAreas),0) }} </td>
                            <td align="center">{{ number_format(count($dist->getHomeCells),0) }} </td>

                            <td align="center">
                                <div class="row">
                                    <div class="col-md-5">
                                        {{ number_format(count($dist->getFirstTimers),0) }} 
                                    </div>
                                    <div class="col-md-7 pull-right">
                                        <a href="{{route('dhc.firsttimers.printtodays', \Crypt::encrypt($dist->id) ) }}" class="btn-fab btn-fab-sm btn-success r-5" ><i class="icon icon-download"></i></a>
                                    </div>
                                </div>
                            </td>


                            <td align="center">
                                <div class="row">
                                    <div class="col-md-5">
                                        {{ number_format(count($dist->getNewConverts),0) }}
                                    </div>
                                    <div class="col-md-7 pull-right">
                                        <a href="{{route('dhc.converts.printtodays', \Crypt::encrypt($dist->id) ) }}" class="btn-fab btn-fab-sm btn-primary r-5" > <i class="icon icon-download"></i> </a>
                                    </div>
                                </div>
                            </td>
                            <td align="center">
                                <div class="row">
                                    <div class="col-md-5">
                                        {{ number_format(count($dist->getDailyEvangelism),0) }}
                                    </div>
                                    <div class="col-md-6 pull-right">
                                        <a href="{{route('dhc.dailyevangelism.printtodays', \Crypt::encrypt($dist->id) ) }}" class="btn-fab btn-fab-sm btn-warning r-5" ><i class="icon icon-download"></i> </a>
                                    </div>
                                </div>

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
                var options = '<option value="">Select Host LGA</option>';
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