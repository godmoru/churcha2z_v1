@extends('layouts.master')

@section('content')

<header class="white pt-3 relative shadow">
    <div class="container-fluid">
        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="row">
                        <div class=" card">
                            <div class="card-header white">
                                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Locations Account Reconciliation Portal</strong>
                                <div class="pull-right" align="right">
                                    <div class="col-md-12">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group form-float form-group-sm">
                                                <div class="form-line">
                                                <label>Date</label>
                                                    <input type="text" name="dateinfo" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="card-body">
                                <table id="" class="table table-bordered table-hover" id="amount" >
                                  <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Location Name</th>
                                        <!-- <th>Host State</th> -->
                                        <th>Last Months Total</th>
                                        <th>Cash at Bank</th>
                                        <th>Tithe (10%)</th>
                                        <th>Kingdom Practice (2%)</th>
                                        <th>Salaries (16%)</th>
                                        <th>Missions (10%)</th>
                                        <th>Reserves (5%)</th>
                                        <th ><center>Recurrent (30%)</center></th>
                                        <th ><center>Housing (7%)</center></th>
                                        <th>Location Proj. (20%)</th>
                                        <th>Travel </th>
                                        <th>Packing </th>
                                        <th>Marriage Support.</th>
                                        <th>Bereavement</th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                            <tr class="odd gradeX">
                                            @foreach($locations as $count => $locs)
                                                <td>{{ ++$count }}</td>  
                                                <td><a href="{{route('locations.one', \Crypt::encrypt($locs->id)) }}"> <b>{{ $locs->loc_name }}</b></a></td>
                                                <!-- <td>{{ isset($locs->loc_state) ? $locs->loc_state->state : "Foreign" }} </td> -->
                                                <td width="9%"><input type="text" class="form-control" name="" readonly value="&#8358;{{number_format(\App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('cash') + \App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('pos') + \App\IncomeReport::where('location_id', $locs->id)->where('month', date('m')-2)->sum('cheques'),2)}}"></td>
                                                <td><input type="number" pattern="[0-9]" class="form-control text-center btotal" name="btotal[]"></td>
                                                <td><input type="text" class="form-control text-center tithe" name="tithe[]" readonly></td>
                                                <td><input type="text" class="form-control text-center kp" name="kp[]" readonly></td>
                                                <td><input type="text" class="form-control text-center salaries" name="salaries[]" readonly></td>
                                                <td><input type="text" class="form-control text-center mission" name="mission[]" readonly></td>
                                                <td><input type="text" class="form-control text-center reserves" name="reserves[]" readonly></td>
                                                <td><input type="text" class="form-control text-center recurrent" name="recurrent[]" readonly></td>
                                                <td><input type="text" class="form-control text-center housing" name="housing[]" readonly></td>
                                                <td><input type="text" class="form-control text-center locP" name="locP[]" readonly></td>
                                                <td><input type="text" class="form-control text-center travel" name="" ></td>
                                                <td><input type="text" class="form-control text-center packing" name="" ></td>
                                                <td><input type="text" class="form-control text-center msupport" name="" ></td>
                                                <td><input type="text" class="form-control text-center bereavement" name=""  ></td>

                                                
                                            </tr>
                                            
                                        @endforeach
                                        <tr>
                                                <td colspan="2">
                                                    Grand Totals
                                                </td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                                <td> <div id="titheSum"></div></td>
                                            </tr>
                                    </tbody>
                              </table>                
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
<script type="text/javascript">
    function sumup() {
        $(".btotal").on('input', '.btotal', function () {
       var Asum = 0;
       $(".btotal .btotal").each(function () {
           var amount = $(this).val();
           if ($.isNumeric(amount)) {
              Asum += parseFloat(amount);
              }                  
            });
              $(".tithe").text(Asum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>

<script type="text/javascript">
// $(document).ready(function(){
//     var btotal = document.getElementById('btotal');
//     var tithe = document.getElementById('tithe');
//     // $(".btotal").on('input', function(){
//         // Print entered value in a div box
//         // alert('We go it working');
//         // $('.travel').text($(this).val() * 5);
//         btotal.addEventListener('change', function() {
//         tithe.value = btotal.value * 5;
//     });
// });

$(document).ready(function() {
   $(".btotal").on('keyup change', calcs);
      // btotal = document.getElementById('btotal').value = btotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
  
      function calcs() {
      var $input = $(this);
      var $row = $input.closest('tr');
      var sum = 0; var tithe = 0; var kP = 0; var SLR = 0; var mission = 0; var Reserves = 0; var rec = 0; var Housing = 0; var lc = 0;

      $(".btotal").each(function() {

       // $("#amount .btotal").each(function () {

        // sum += parseFloat(this.value) || 0;
      tithe = document.getElementById('btotal').value * 10/100;
      tithing = document.getElementById('tithe').value = tithe.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      kp = document.getElementById('btotal').value * 2/100;
      kps = document.getElementById('kp').value = kp.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      kp = document.getElementById('btotal').value * 2/100;
      kps = document.getElementById('kp').value = kp.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      SLR = document.getElementById('btotal').value * 16/100;
      salaries = document.getElementById('salaries').value = SLR.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      mission = document.getElementById('btotal').value * 10/100;
      mission = document.getElementById('mission').value = mission.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");


      reserves = document.getElementById('btotal').value * 5/100;
      reserves = document.getElementById('reserves').value = reserves.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      recurrent = document.getElementById('btotal').value * 30/100;
      recurrent = document.getElementById('recurrent').value = recurrent.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      housing = document.getElementById('btotal').value * 7/100;
      housing = document.getElementById('housing').value = housing.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

      locP = document.getElementById('btotal').value * 20/100;
      locP = document.getElementById('locP').value = locP.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      });
      // $row.find(".female").each(function() {
      //   sumF += parseFloat(this.value) || 0;
      // });
      // $row.find(".children").each(function() {
      //   sumC += parseFloat(this.value) || 0;
      // });
      

      // alert(tithe);

      $row.find(".total").val(sumT.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      $row.find("#titheSum").val(tithe.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      // $row.find(".totalmale").val(maleTotal.toFixed(0));//.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
    }

  });
</script>
@endsection