@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow"">
    <div class="container-fluid">
        <div class="row col-md-12 col-lg-12 ">
            <div class="col-md-12">
                <div class="row collapse col-md-12" id="newaccountant">
                     @include('hr.accountants.modals.new')
                </div>
                <div class="row my-3">
                    <div class="col-md-12">
                        
                        <div class=" card b-0">
                            <div class="card-header white">
                                <i class="icon-people s-18 blue-text"></i> <strong class="text-uppercase"> accountants </strong> 
                                <div class="pull-right" align="right">
                                    @can('users.read')
                                    @endcan
                                    <!-- <a data-toggle="collapse" data-target="#newaccountant" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"><i class="icon-group_add s-18"></i>  Add New accountant</a> -->
                                    <a data-toggle="collapse" data-target="#newaccountant" aria-expanded="false" aria-controls="newaccountant" class="btn-fab btn-fab-md fab-right  shadow btn-primary"><i class="icon-group_add"></i></a>               
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>S/No</th>
                                            <th width="20%">Full Name</th>
                                            <th width="20%">Current Location</th>
                                            <th width="15%">e-Mail</th>
                                            <th width="15%">Phone No</th>
                                            <th>Date Enlisted/Confirmed</th>
                                            <th ><center>Current Status</center></th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                        @foreach($accountants as $count => $accountant)
                                        <tr>
                                            <td>{{ ++$count }}</td>  
                                            <td><a href="{{route('accountants.one', \Crypt::encrypt($accountant->id)) }}"> <b>{{ $accountant->surname .' '.$accountant->othernames}}</b></a></td>
                                            <td>{{ isset($accountant->loc) ? $accountant->loc->loc_name : "Not defined"}}</td>
                                            <td>{{ $accountant->email}}</td>
                                            <td>{{ $accountant->phone1 }}</td>
                                            <td>{{ isset($accountant) ? $accountant->date_taken .'/'. $accountant->date_confirmed : "Not Confirmed" }}</td>
                                            <td align="center">
                                                @if($accountant->status == 1)
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
<!-- include('hr.accountants.modals.new') -->
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