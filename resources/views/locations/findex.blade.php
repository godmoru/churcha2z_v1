@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow"">
    <div class="container-fluid">
        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
            <div class="col-md-12">
                <div class="row collapse col-md-12" id="newlocation">
                    @include('locations.new')
                </div>
                <div class="row my-0 col-md-12">
                    <div class="col-md-12">
                        
                        <div class=" card col-md-12">
                            <div class="card-header white">
                                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Locations </strong>
                                @if(\Auth::user()->id == 1 || \Auth::user()->id == 9) 
                                <div class="pull-right" align="right">
                                    <a data-toggle="collapse" data-target="#newlocation" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">New Location</a>
                                    <a href="{{route('locations.weekly-reports', \Crypt::encrypt(434)) }}" class="btn btn-success btn-xs">Weekly Report</a>
                                </div>
                                
                                @else
                                @endif
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                  <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Full Name</th>
                                        <th>Host State</th>
                                        <th>Resident Pastor</th>
                                        <th>Contact  e-Mail</th>
                                        <th>Contact Phone No</th>
                                        <th>First Timers</th>
                                        <th ><center>New Converts</center></th>
                                        <th>Members</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                            <tr class="odd gradeX">
                                            @foreach($locations as $count => $locs)
                                                <td>{{ ++$count }}</td>  
                                                <td><a href="{{route('locations.one', \Crypt::encrypt($locs->id)) }}"> <b>{{ $locs->loc_name }}</b></a></td>
                                                <td>{{ isset($locs->loc_state) ? $locs->loc_state->state : "Foreign" }} - {{isset($loc->country) ? $loc->country->name : "Undefined"}}</td>
                                                <td>{{ isset($locs->get_loc_pst) ? $locs->get_loc_pst->surname.' '.$locs->get_loc_pst->othernames : " Not set"}}</td>
                                                <td>{{ $locs->loc_email }}</td>
                                                <td>{{ $locs->phone1 }}</td>
                                                <td align="center">{{ $locs->getfirsttimers->count() }}</td>
                                                <td align="center">{{ number_format(count($locs->getnewconverts),0) }}</td>
                                                <td align="center">{{ $locs->loc_members->count() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                              </table>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@include('locations.modals.new')
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