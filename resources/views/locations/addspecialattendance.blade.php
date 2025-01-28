@extends('layouts.master')

@section('content')
<div class="row row-eq-height my-3 mt-3 col-md-12">
    <div class="col-md-12">
      
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">Service Attendance Status</h4> <hr>
        @include('locations.modals.newcountarea')
        @include('locations.modals.newservicetype')
        <form class="form-material" action="{{ route('location.specialAtt') }}" method="POST">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="row clearfix">
                         <div class="col-sm-12 col-md-4" align="center">

                        </div>
                        <div class="col-sm-12 col-md-4">

                          <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="svctype" id="svctype">
                                        <option value="">Service Type</option>
                                        @foreach($serviceTypes as $svcT)
                                        <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="svc" id="svc">
                                        <option value="">Service</option>
                                        @foreach($services as $svc)
                                        <option value="{{$svc->id}}">{{$svc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">

                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" name="serviceDate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                    <label class="form-label">Service Date</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" align="center">
                            <a data-toggle="modal" data-target="#nServiceType" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-block btn-xs">Add New Service Category</a>
                            <a data-toggle="modal" data-target="#nCountArea" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-block btn-xs">Add New Count Area</a>
                        </div>
                <br>
                    </div>
                </div>
                <hr>
                <div class="col-md-4" align="center">
                  <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 110px; width: 140px;" align="center" />
                </div>
                
                <div class="col-md-8 form-group">
                <h5 class="text-uppercase text-center">Special Human Attendance</h5>
                    <!-- <form class="form-material" action="{{ route('location.submitAttendance') }}" method="POST"> -->
                    {{ csrf_field() }}   
                    <table class="table table-bordered table-hover" id="humanCount">
                        <thead>
                            <tr>
                                <th style="text-align: center; text-transform: uppercase;" width="25%">Count Area</th>
                                <th style="text-align: center; text-transform: uppercase;" width="25%">Section</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Male</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Female</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Children</th>
                                <!-- <th style="text-align: center; text-transform: uppercase;" width="15%">Sub Total</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="{{$countareas->count()}}">Special Areas</td>
                              @foreach($countareas as $carea)
                                <td>{{$carea->name}}</td>
                                <input type="hidden" name="specialheadid[]" value="{{$carea->id}}">
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm add male" name="male[]" id="male" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm add female" name="female[]" id="female" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm add children" name="children[]" id="children" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                </td>
                                <!-- <td align="center">
                                    <input type="number" class="form-control form-control-sm add total" name="total[]" id="total" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                </td>  -->                                   
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="2">Sub Total</td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm text-bolder h4">
                                        <b><span id="maleT"></span></b>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm text-bolder h4">
                                        <b><span id="femaleT"></span></b>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm text-bolder h4">
                                        <b><span id="childrenT"></span></b>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="2">Grand Total</td>
                              <td align="center" colspan="3">
                                    <div class="form-group form-float form-group-sm text-bolder h2">
                                        <b><span id="grandT"></span></b>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" align="center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit Attendance</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">

    function sumup() {
        $("#humanCount").on('input', '.male', function () {
       var Msum = 0;
       $("#humanCount .male").each(function () {
           var male = $(this).val();
           if ($.isNumeric(male)) {
              Msum += parseFloat(male);
              }                  
            });
              $("#maleT").text(Msum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
              $("#T").text(Msum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    // }

    // function sumfemale() {
        $("#humanCount").on('input', '.female', function () {
       var Fsum = 0;
       $("#humanCount .female").each(function () {
           var female = $(this).val();
           if ($.isNumeric(female)) {
              Fsum += parseFloat(female);
              }                  
            });
              $("#femaleT").text(Fsum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    // }

    // function sumchildren() {
        $("#humanCount").on('input', '.children', function () {
       var Csum = 0;
       $("#humanCount .children").each(function () {
           var children = $(this).val();
           if ($.isNumeric(children)) {
              Csum += parseFloat(children);
              }                  
            });
              $("#childrenT").text(Csum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });


      $("#humanCount").on('input', '.add', function () {
       var GTotal = 0;
       $("#humanCount .add ").each(function () {
           var total = $(this).val();
           if ($.isNumeric(total)) {
              GTotal += parseFloat(total);
              }   

            });
              $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>

@endsection