@extends('layouts.master')

@section('content')
<div class="row row-eq-height my-3 mt-3 col-md-12">
    <div class="col-md-12">
        <div class="row collapse col-md-12" id="addattendance">
            @include('locations.addattendance')
        </div>
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Location Attendance </strong> 
                <div class="pull-right" align="right">
                  <!--<a data-toggle="collapse" data-target="#addattendance" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Add Attendance</a>-->
                  <a href="{{route('attendance.printpeoplesummary', \Crypt::encrypt('dfae43'))}}" target="_blank" class="btn btn-success btn-xs"><i class="icon icon-print"></i>Today Summary</a>
                  <a data-toggle="modal" data-target="#getattbydate" class="btn btn-info btn-xs" style="color: white;"> <i class="icon-download"></i> Get Attendance By Service Date</a>

                </div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th style="text-transform: uppercase; text-align: center;" width="2%">S/No</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Service Date</th>
                        <th style="text-transform: uppercase; text-align: center;" width="7%">Service</th>
                        <th style="text-transform: uppercase; text-align: center;" width="5%">Male</th>
                        <th style="text-transform: uppercase; text-align: center;" width="5%">Female</th>
                        <th style="text-transform: uppercase; text-align: center;" width="5%">Children</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%"> First Timers</th>
                        <th  style="text-transform: uppercase; text-align: center;" width="9%"><center> New Converts</center></th>
                        @role('administrator|senior-pastor|resident-pastor')
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Reg. First Timers</th>
                        <th  style="text-transform: uppercase; text-align: center;" width="8%"><center>Reg. New Converts</center></th>
                        @endrole
                        <th  style="text-transform: uppercase; text-align: center;" width="8%"><center>Total</center></th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Download Rec</th>

                        </tr>
                    </thead>
                     <tbody>
                             @foreach($attendances as $count => $att)
                            <tr class="">
                            <?php 
                                $fsvcm = \App\ServiceAttendance::where('service_id',1)->where('service_date', $att->service_date)->sum('male');
                                $secsvcm = \App\ServiceAttendance::where('service_id',2)->where('service_date', $att->service_date)->pluck('male');
                                $thirdsvcm = \App\ServiceAttendance::where('service_id',3)->where('service_date', $att->service_date)->pluck('male');
                                $fourthsvcm = \App\ServiceAttendance::where('service_id',4)->where('service_date', $att->service_date)->pluck('male');
                                $fifthsvcm = \App\ServiceAttendance::where('service_id',5)->where('service_date', $att->service_date)->pluck('male');
                                $sixthsvcm = \App\ServiceAttendance::where('service_id',6)->where('service_date', $att->service_date)->pluck('male');
                                // dd($fsvcm);

                                $fsvcftimr = \App\People::where('service_id',1)->where('people_category_id',2)->where('service_date', $att->service_date)->get();
                                $secsvcftimr = \App\People::where('service_id',2)->where('people_category_id',2)->where('service_date', $att->service_date)->get();
                                $thirdsvcftimr = \App\People::where('service_id',3)->where('people_category_id',2)->where('service_date', $att->service_date)->get();
                                $forthsvcftimr = \App\People::where('service_id',4)->where('people_category_id',2)->where('service_date', $att->service_date)->get();
                                $fifthsvcftimr = \App\People::where('service_id',5)->where('people_category_id',2)->where('service_date', $att->service_date)->get();
                                $sixthsvcftimr = \App\People::where('service_id',6)->where('people_category_id',2)->where('service_date', $att->service_date)->get();

                                $fsvcnewconverts = \App\People::where('service_id',1)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                                $secsvcnewconverts = \App\People::where('service_id',2)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                                $thirdsvcnewconverts = \App\People::where('service_id',3)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                                $forthsvcnewconverts = \App\People::where('service_id',4)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                                $fifthsvcnewconverts = \App\People::where('service_id',5)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                                $sixthsvcnewconverts = \App\People::where('service_id',6)->where('people_category_id',1)->where('service_date', $att->service_date)->get();
                            ?>

                              <td>{{ ++$count }}</td>  
                               <td><a href="#">{{ date('jS M, Y', strtotime($att->service_date)) }}</a></td>
                               <td>{{ $att->service->name }}</td>
                               <td align="center">
                                @if($att->service_id ==1)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $att->service_date)->sum('male'),0)}}

                                @elseif($att->service_id ==2)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $att->service_date)->sum('male'),0)}}

                                @elseif($att->service_id ==3)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $att->service_date)->sum('male'),0)}}

                                @elseif($att->service_id ==4)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $att->service_date)->sum('male'),0)}}

                                @elseif($att->service_id ==5)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $att->service_date)->sum('male'),0)}}

                                @elseif($att->service_id ==6)
                                {{$m = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $att->service_date)->sum('male'),0)}}
                                @else
                                {{$m = 0}}
                                @endif
                               </td>
                               <td align="center">
                                @if($att->service_id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $att->service_date )->sum('female'),0)}}

                                @elseif($att->service_id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $att->service_date )->sum('female'),0)}}

                                @elseif($att->service_id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $att->service_date )->sum('female'),0)}}

                                @elseif($att->service_id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $att->service_date )->sum('female'),0)}}

                                @elseif($att->service_id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $att->service_date )->sum('female'),0)}}

                                @elseif($att->service_id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $att->service_date )->sum('female'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                               </td>
                               <td align="center">
                                @if($att->service_id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', $att->service_date)->sum('children'),0)}}

                                @elseif($att->service_id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', $att->service_date)->sum('children'),0)}}

                                @elseif($att->service_id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', $att->service_date)->sum('children'),0)}}
                                @elseif($att->service_id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', $att->service_date)->sum('children'),0)}}

                                @elseif($att->service_id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', $att->service_date)->sum('children'),0)}}

                                @elseif($att->service_id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', $att->service_date)->sum('children'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                               </td>
                               <td align="center"> <!-- First Timers-->
                                 @if($att->service_id ==1)
                                 <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}


                                @elseif($att->service_id ==2)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                  @elseif($att->service_id ==3)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @elseif($att->service_id ==4)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}
                                @elseif($att->service_id ==5)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @elseif($att->service_id ==6)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 21)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @else
                                0
                                @endif
                               </td>
                               <td align="center"> <!-- New Converts/Alter Call-->
                                 @if($att->service_id ==1)
                                 <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 1)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}


                                @elseif($att->service_id ==2)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 2)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                  @elseif($att->service_id ==3)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 3)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @elseif($att->service_id ==4)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 4)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}
                                @elseif($att->service_id ==5)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 5)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @elseif($att->service_id ==6)
                                <?php 
                                 $m = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('male');
                                 $fm = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('female');
                                 $ch = \App\ServiceAttendance::where('service_id', 6)->where('count_area_id', 22)->where('service_date', $att->service_date)->sum('children');
                                 ?>
                                  {{number_format($m +$fm +$ch, 0)}}

                                @else
                                0
                                @endif
                               </td>

                               <td align="center">
                                 @if($att->service_id == 1)
                                {{number_format(count($fsvcftimr),0)}}
                                @elseif($att->service_id == 2)
                                {{number_format(count($secsvcftimr),0)}}
                                @elseif($att->service_id == 3)
                                {{number_format(count($thirdsvcftimr),0)}}
                                @elseif($att->service_id == 4)
                                {{number_format(count($forthsvcftimr),0)}}
                                @elseif($att->service_id == 5)
                                {{number_format(count($fifthsvcftimr),0)}}
                                @elseif($att->service_id == 6)
                                {{number_format(count($sixthsvcftimr),0)}}
                                @else
                                0
                                @endif
                               </td>
                               <td align="center">
                                @if($att->service_id == 1)
                                {{number_format(count($fsvcnewconverts),0)}}
                                @elseif($att->service_id == 2)
                                {{number_format(count($secsvcnewconverts),0)}}
                                @elseif($att->service_id == 3)
                                {{number_format(count($thirdsvcnewconverts),0)}}
                                @elseif($att->service_id == 4)
                                {{number_format(count($forthsvcnewconverts),0)}}
                                @elseif($att->service_id == 5)
                                {{number_format(count($fifthsvcnewconverts),0)}}
                                @elseif($att->service_id == 6)
                                {{number_format(count($sixthsvcnewconverts),0)}}
                                @else
                                0
                                @endif
                               </td>
                               <td align="center">
                                 0
                               </td>
                               <td align="center">
                                <a href="{{route('attendance.printpeople', \Crypt::encrypt($att->service_id)) }}" class="btn btn-xs btn-primary" target="_blank"><i class="icon-people"></i> </a>
                                <a href="{{route('attendance.printvehicle', \Crypt::encrypt($att->service_id)) }}" class="btn btn-xs btn-warning"><i class="icon-car"></i> </a>
                                <a href="{{route('attendance.printpeopleservicesummary', \Crypt::encrypt($att->service_id)) }}" class="btn btn-xs btn-success"><i class="icon-group"></i> </a>
                               </td>
                            </tr>
                        @endforeach
                            <!-- <tr>
                              <td colspan="3">Total </td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                            </tr> -->
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
    @include('locations.modals.getattendancebydate')
</div>
@endsection
@section('scripts')

<script type="text/javascript">
   $(document).ready(function() {
   $(".male").on('keyup change', calculateSum);
   $(".female").on('keyup change', calculateSum);
   $(".children").on('keyup change', calculateSum);
   // $(".cartotal").on('keyup change', carGrandTotal);
  });
  function calculateSum() {
      var $input = $(this);
      var $row = $input.closest('tr');
      var sum = 0; var sumF = 0; var sumT = 0; var sumC = 0;

      $row.find(".male").each(function() {
        sum += parseFloat(this.value) || 0;
      });
      $row.find(".female").each(function() {
        sumF += parseFloat(this.value) || 0;
      });
      $row.find(".children").each(function() {
        sumC += parseFloat(this.value) || 0;
      });
      sumT = sum + sumF + sumC;
      maleTotal = sum;
      $row.find(".total").val(sumT.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      // $row.find(".totalmale").val(maleTotal.toFixed(0));//.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"); 
    }
</script>
@endsection