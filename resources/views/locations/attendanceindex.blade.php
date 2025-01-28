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
                <div class="pull-right" align="right"><a data-toggle="collapse" data-target="#addattendance" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-xs">Add Attendance</a></div>
            </div>
            <div class="card-body slimScroll">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th style="text-transform: uppercase; text-align: center;" width="5%">S/No</th>
                        <th style="text-transform: uppercase; text-align: center;" width="13%">Service Date</th>
                        <th style="text-transform: uppercase; text-align: center;" width="10%">Service</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Male</th>
                        <th style="text-transform: uppercase; text-align: center;" width="8%">Female</th>
                        <th style="text-transform: uppercase; text-align: center;" width="7%">Children</th>
                        <th style="text-transform: uppercase; text-align: center;" width="12%">Count First Timers</th>
                        <th  style="text-transform: uppercase; text-align: center;" width="12%"><center>Count New Converts</center></th>
                        <th style="text-transform: uppercase; text-align: center;" width="12%">Registered First Timers</th>
                        <th  style="text-transform: uppercase; text-align: center;" width="12%"><center>Registered New Converts</center></th>
                        <th style="text-transform: uppercase; text-align: center;">Total</th>
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="">
                            @foreach($attendances as $count => $att)
                            <?php 
                                $fsvcm = \App\People::where('service_id',1)->where('service_date', $att->service_date)->get();

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
                               <td><a href="#">{{ date('jS F, Y', strtotime($att->service_date)) }}</a></td>
                               <td>{{ $att->service->name}}</td>
                               <td align="center">{{ $att->sum('male') }}</td>
                               <td align="center">{{ $att->sum('female') }}</td>
                               <td align="center">{{ $att->sum('children') }}</td>
                               <!-- <td align="center">{{ $att->first_timers }}</td> -->
                               <!-- <td align="center">{{ $att->new_converts }}</td> -->
                              <!--  <td align="center">
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
                                   @if($att->service_id == 1)
                                    {{number_format($att->children + $att->female + $att->male ,0)}}
                                    @elseif($att->service_id == 2)
                                    {{number_format($att->children + $att->female + $att->male ,0)}}
                                    {{number_format(count($secsvcnewconverts),0)}}
                                    @elseif($att->service_id == 3)
                                    {{number_format($att->children + $att->female + $att->male,0)}}
                                    @elseif($att->service_id == 4)
                                    {{number_format($att->children + $att->female + $att->male,0)}}

                                    @elseif($att->service_id == 5)
                                    {{number_format($att->children + $att->female + $att->male,0)}}

                                    @elseif($att->service_id == 6)
                                    {{number_format($att->children + $att->female + $att->male ,0)}}

                                    @else
                                    0
                                    @endif
                               </td> -->
                               <!-- <td align="center">{{ number_format($att->children + $att->female + $att->male + count($fifthsvcnewconverts) + count($sixthsvcnewconverts), 0) }}</td> -->
                            </tr>
                        @endforeach
                            <tr>
                              <td colspan="3">Total </td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                              <td>2</td>
                            </tr>
                    </tbody>
              </table>                
            </div>
        </div>
    </div>

   <!--  <div class="col-md-2">
        <div id="echart_pie" class="height-300"></div>
        <hr>
        <div id="echart_pie2" class="height-300"></div>
    </div> -->

</div>
@endsection
@section('scripts')

<script type="text/javascript">
    function calculateAttendance(){
      //Get selected data  
      // console.log(document.getElementById("male").value);
      var male = document.getElementById("male").value;
      var female = document.getElementById("female").value;
      var children = document.getElementById("children").value;
       var first_timers = document.getElementById("first_timers").value;
        var new_converts = document.getElementById("new_converts").value;

        new_converts = parseInt(new_converts);
        first_timers = parseInt(first_timers);

        
      //convert data to integers
      fmale = parseInt(male);
      ffemale = parseInt(female);
      fchildren = parseInt(children);
      
      var total = fmale+ffemale+fchildren; 
      var cftotal = first_timers+new_converts
      //print value to screen 
      total = total.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        cftotal = cftotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      ''
      document.getElementById("total").value=total;
        document.getElementById("cftotal").value=cftotal;


    }

    function calculateConverts() {
        var first_timers = document.getElementById("first_timers").value;
        var new_converts = document.getElementById("new_converts").value;

        new_converts = parseInt(new_converts);
        first_timers = parseInt(first_timers);

        cftotal = cftotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        document.getElementById("cftotal").value=cftotal;

    }
</script>
@endsection