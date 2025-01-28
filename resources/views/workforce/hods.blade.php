@extends('layouts.master')

@section('content')
<div class="row row-eq-height col-md-12">
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="newhod">
            @include('workforce.newhod')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-user 2x blue-text"></i> <strong class="text-uppercase"> HOD/Coordinators </strong> 
                <div class="pull-right" align="right">
                  <a data-toggle="collapse" data-target="#newhod" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Add HOD</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th width="5%"> S/No</th>
                            <th width="15%">HOD Full Names</th>
                            <th width="15%"> e-Mail</th>
                            <th width="25%"> Phone No</th>
                            <th width="15%">Department</th>
                            <th ><center>Current Status</center></th>
                        </tr>
                    </thead>
                     <tbody>
                         @foreach($hods as $count => $hod)
                        <tr>
                            <td>{{ ++$count }}</td>  
                            <td><a href="{{route('counselors.one', \Crypt::encrypt($hod->id)) }}"> <b>{{ $hod->surname.' '.$hod->othernames}}</b></a></td>
                            <td>{{ $hod->email}}</td>
                            <td>{{ $hod->phone1. ', '.$hod->phone2 }}</td>
                            <td>{{ isset($hod->getDept) ? $hod->getDept->dept_name : "Not Assigned"  }}</td>
                            <td align="center">
                                @if($hod->status == 1)
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
                var options = '<option value="">Select Origin LGA</option>';
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