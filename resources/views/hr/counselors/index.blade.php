@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow"">
    <div class="container-fluid">
        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
            <div class="col-md-12">
                        <div class="row collapse col-md-12" id="newcounselor">
                             @include('hr.counselors.modals.new')
                        </div>
                <div class="row my-0 col-md-12">
                    <div class="col-md-12">
                        
                        <div class=" card b-0">
                            <div class="card-header white">
                                <i class="icon-people s-18 blue-text"></i> <strong class="text-uppercase"> Counselors </strong> 
                                <div class="pull-right" align="right">
                                    @can('users.read')
                                    @endcan
                                    <!-- <a data-toggle="collapse" data-target="#newcounselor" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-group_add s-18"></i>  Add New Counselor</a> -->
                                    <a data-toggle="collapse" data-target="#newcounselor" aria-expanded="false" aria-controls="newcounselor" class="btn-fab btn-fab-md fab-right  shadow btn-primary"><i class="icon-group_add"></i></a>               
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th width="20%">Full Name</th>
                                            <th width="15%">e-Mail</th>
                                            <th width="15%">Phone No</th>
                                            <th width="15%">Current Class Batch</th>
                                            <th>Date Enlisted/Confirmed</th>
                                            <th ><center>Current Status</center></th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        @foreach($counselors as $count => $counselor)
                                        <tr>
                                            <td>{{ ++$count }}</td>  
                                            <td><a href="{{route('counselors.one', \Crypt::encrypt($counselor->id)) }}"> <b>{{ $counselor->surname .' '.$counselor->othernames}}</b></a></td>
                                            <td>{{ $counselor->email}}</td>
                                            <td>{{ $counselor->phone1 }}</td>
                                            <td>{{ isset($counselor->getClassBatch) ? $counselor->getClassBatch->name : "Not Assigned"  }}</td>
                                            <td>{{ $counselor->date_enlisted .'/'.$counselor->date_confirmed }}</td>
                                            <td align="center">
                                                @if($counselor->status == 1)
                                                <span class="badge badge-primary"><span class="blink"><i class="icon icon-circle mr-2"></i>Actively Engaged</span></span>
                                                @else
                                                <span class="badge badge-danger pink"><span class="blink"><i class="icon icon-circle mr-2"></i>Not Engaged</span></span>
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
            </div>
        </div>
    </div>
</header>
<!-- @include('hr.counselors.modals.new') -->
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