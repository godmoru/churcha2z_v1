@extends('layouts.master')

@section('content')
<div class="row row-eq-height my-3 mt-3 col-md-12">
    <div class="col-md-12">
      <div class=" card b-0">
        <div class="card-header white">
            <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Add Vehicles/Cars Attendance </strong> 
            <div class="pull-right" align="right">
            </div>
        </div>
        <div class="card-body">
        @include('locations.modals.newvehiclecountingarea')
        @include('locations.modals.newservicetype')
        <form class="form-material" action="{{ route('location.doadd-vehicle-attendance') }}" method="POST">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="row clearfix">
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
                        </div>
                        <div class="col-sm-12 col-md-4">
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
                  <a href="{{route('attendance.printpeoplesummary', \Crypt::encrypt('dfae43'))}}" target="_blank" class="btn btn-success btn-xs btn-block"><i class="icon icon-print"></i>Today Summary</a>

                            <a data-toggle="modal" data-target="#nServiceType" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-block btn-xs">Add New Service Category</a>
                            <a data-toggle="modal" data-target="#nCountArea" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-block btn-xs">Add Car Park</a>
                        </div>
                <br>
                    </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-7 form-group">
                    <h5 class="text-uppercase text-center">Vehicle Attendance</h5>
                    {{ csrf_field() }}   
                    <table class="table table-bordered table-hover" id="carrecords">
                        <thead>
                            <tr>
                                <th style="text-align: center; text-transform: uppercase;" width="10%"> Car Park</th>
                                <th style="text-align: center; text-transform: uppercase;" width="40%">Coverage Area</th>
                                <th style="text-align: center; text-transform: uppercase;" width="9%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Vcountareas as $varea)
                            <tr>
                                <input class="total-ignore" type="hidden" name="VcAreaId[]" value="{{$varea->id}}">
                                <td>{{$varea->name}}</td>
                                <td>{{$varea->description}}</td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm cartotal" name="total[]" id="cartotal" align="center" value="0" style="text-align: center;" onkeyup="sumcars();" />
                                </td>
                                <!-- <td align="center"><label id="subTotal">4354</label></td> -->
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">G. Total</td>
                                <td align="center" class="text-bolder h4">
                                    <b><span id="cargrandtotal"></span></b>
                                    <!-- <input type="number" class="form-control form-control-sm cargrandtotal" name="" id="cargtotal" disabled align="center" style="text-align: center;" /> -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block">Submit Attendance</button>
                </div>

                <div class="col-md-5" style="text-align: center; padding-top: 140px;" align="center">
                  <div class="jumbotron">
                    <p style="font-size: 18px;"> A total of <b><span id="cargrandtotalr"></span></b> vehicles were packed for this service being recorded now</p>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>
<br>
            

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function sumcars() {
    $("#carrecords").on('input', '.cartotal', function () {
       var CarPsum = 0;
       $("#carrecords .cartotal").each(function () {
           var parktotal = $(this).val();
           if ($.isNumeric(parktotal)) {
              CarPsum += parseFloat(parktotal);
              }                  
            });
              $("#cargrandtotal").text(CarPsum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
              $("#cargrandtotalr").text(CarPsum.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>
@endsection