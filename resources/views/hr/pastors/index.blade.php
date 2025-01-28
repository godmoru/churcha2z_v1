@extends('layouts.master')

@section('content')
<div class="container-fluied">
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="newpastor">
             @include('hr.pastors.new')
        </div>
        <div class=" card">
            <div class="card-header white">
                <i class="icon-person_outlined blue-text"></i> <strong class="text-uppercase"> Resident Pastors Index </strong> 
                <div class="pull-right" align="right">
                    <!-- <a data-toggle="collapse" data-target="#newpastor" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">New Pastor</a> -->
                    <a data-toggle="collapse" data-target="#newpastor" aria-expanded="false" aria-controls="newcounselor" class="btn-fab btn-fab-md fab-right  shadow btn-primary btn-sm"><i class="icon-group_add"></i></a>               
                    <a href="{{route('pastors.printlist', \Crypt::encrypt(53948)) }}" class="btn-fab btn-fab-md fab-right  shadow btn-primary btn-sm"><i class="icon-print"></i></a>               
                </div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="6%" align="center">S/No</th>
                        <th>Full Name</th>
                        <th>Phone Nos</th>
                        <th>Contact  e-Mail</th>
                        <th>Current Location</th>
                        <th>Current State</th>
                        <th>Responsibility</th>
                        <th>Category</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($pastors as $count => $pst)
                                <td align="center">{{ ++$count }}</td>  
                                <td class="text-uppercase"><a href="{{route('pastors.one', \Crypt::encrypt($pst->id)) }}"> <b>{{ $pst->surname.' '.$pst->othernames }}</b></a></td>
                                <td>{{ $pst->phone1. ', '.$pst->phone2 }}</td>
                                <td class="text-uppercase">{{ $pst->email }}</td>
                                <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_name : " Not set"}}</td>
                                <td class="text-uppercase">{{ isset($pst->get_loc) ? $pst->get_loc->loc_state->state : " Not set"}}</td>
                                <td class="text-uppercase">
                                    <?php $pastortype = json_decode($pst->pastor_type_id);?>
                                    @foreach($pastortype as $ptype)
                                       {{App\PastorType::find($ptype)->name}}<br>
                                    @endforeach
                                </td>
                                <td>{{isset($pastor->category) ? $pastor->category->name.' pastor' : "Undefied"}}</td>
                                <td align="center">
                                    @if($pst->status == 1)
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