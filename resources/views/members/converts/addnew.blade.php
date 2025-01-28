@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
    <div class="card ">
        
    <div class="col-md-12">
        <div class=" card b-0">
            <!-- <div class="card-header white"> -->
                <!-- <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> Converts Registration Portal </strong>  -->
            <!-- </div> -->
            <div class="card-body">
                 <h4 class="text-center text-uppercase">New Convert registration form</h4> <hr><br>
                <form class="form-material" action="{{ route('converts.new') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="pid" id="pid">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone1" id="phone" required onkeyup="FindPerson()" />
                                    <label class="form-label">Phone No 1</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone2" />
                                    <label class="form-label">Phone No 2</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="sname" id="sname" required />
                                    <label class="form-label"> Surname</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="othernames" id="othernames" required />
                                    <label class="form-label"> Other Names</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" />
                                    <label class="form-label">eMail Address</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="phone1" required onkeyup="FindPerson()/>
                                    <label class="form-label">Phone No 1</label>
                                </div>
                            </div>
                        </div> -->
                        
                        

                        <!-- <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                    <label class="form-label">Date of Birth</label>
                            <select class="custom-select select2" required name="gender" id="gender">
                                <option value="">Age Group</option>
                                <option value="1">12 - 18</option>
                                <option value="2">19 - 25</option>
                                <option value="3">26 - 35</option>
                                <option value="4">36 - 55</option>
                                <option value="5">56 - 56 & Above</option>
                            </select> 
                        </div> -->
                        <div class="col-sm-2">
                            <select class="custom-select select2" required name="gender" id="gender">
                                <option value="">Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="custom-select select2" required name="mstatus" id="mstatus">
                                <option value="">Marital Status</option>
                                @foreach($mstatus as $mst)
                                <option value="{{$mst->id}}">{{$mst->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-2">
                            <select class="custom-select select2" required name="svc" id="svc">
                                <option value="">Service</option>
                                @foreach($services as $svc)
                                <option value="{{$svc->id}}">{{$svc->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="custom-select select2" required name="converttype" id="converttype">
                                <option value="">Convert Type</option>
                                @foreach($peoplecats as $cat)
                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" name="svcdate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                    <label class="form-label">Service Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <!-- <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" value="" class="custom-control-input" name="sendsmsoption">
                                <label class="custom-control-label" for="customControlValidation1">Send Bulk SMS</label>
                            </div> -->

                            <select class="custom-select select2" required name="area_in" id="area_in">
                                <option value="">Address District</option>
                                @foreach($districts as $dist)
                                <option value="{{$dist->id}}">{{$dist->dis_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <br><br>
                        <div class="col-sm-12">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <textarea class="form-control" rows="3" name="resaddress" required></textarea>
                                    <label class="form-label">Residential Addres <small style="color: red;">Give a detailed description as possible</small></label>
                                </div>
                            </div>
                        </div>
                    <br>
                    </div>

                    <div class="col-sm-12" align="center">
                        <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Convert</button>
                    </div>
                </form>        
            </div>
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