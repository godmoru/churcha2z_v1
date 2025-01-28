@extends('layouts.master')

@section('content')
<div class="row col-md-12">
        <div class="row collapse col-md-12" id="filtermembers">
            @include('members.filtermembers')
        </div>

        <div class="card">
            <div class="card-header white">
                <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> Members Index </strong> 
                <div class="pull-right" align="right">
                    <a data-toggle="collapse" data-target="#newmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs"> <i class="icon-group_add"></i> New Members</a>
                    <a href="{{route('converts.print') }}" class="btn btn-warning btn-xs"><i class="icon-download"></i> Download All Members</a>
                    <a data-toggle="collapse" data-target="#filtermembers" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs"> <i class="icon-search"></i> Filter Through Members</a>
                </div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th style="text-transform: uppercase;" width="2%">S/No</th>
                        <th style="text-transform: uppercase;" width="15%">Full Name</th>
                        <th style="text-transform: uppercase;" width="17%">Location</th>
                        <th style="text-transform: uppercase;"> e-Mail</th>
                        <th style="text-transform: uppercase;" width="10%"> Phone No</th>
                        <th style="text-transform: uppercase;" width="12%">Entry Category</th>
                        <th style="text-transform: uppercase;">Workforce Dept</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Found. Class</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">DLTC</th>
                        <th style="text-transform: uppercase; text-align: center;"> Status</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                        @foreach($members as $count => $mbr)
                            <td>{{ ++$count }}</td>  
                            <td ><a href="{{route('members.one', \Crypt::encrypt($mbr->id)) }}"> <b>{{ strtoupper($mbr->sname.' '.$mbr->othernames) }}</b></a></td>
                            <td style="font-size: 14px;">{{ isset($mbr->getMembersLocation) ? $mbr->getMembersLocation->loc_name : " NA"}}</td>
                            <td>{{ $mbr->email }}</td>
                            <td>{{ $mbr->phone1 }}</td>
                            <td align="">{{isset($mbr->getCategory) ? $mbr->getCategory->short_name : "Not Defined" }}</td>
                            <td align="">{{isset($mbr->getdept) ? $mbr->getdept->dept_name : "Not Defined"}}</td>
                            <td align="center">
                                @if($mbr->fclass_status  == 1)
                                {{ $mbr->fclass_when }}
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                @if($mbr->dltc_status  == 1)
                                {{ $mbr->dltc_when }}
                                @else
                                No
                                @endif
                            </td>
                            <td align="center">
                                Estab.
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>                
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
                document.getElementById("surname").value = objects[i].fullnames
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