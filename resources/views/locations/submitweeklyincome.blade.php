@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <div class="card-body">
                         <h4 class="text-center text-uppercase">Add income report</h4> <hr><br>
                    <form class="form-material" action="{{ route('income.submit') }}" method="POST">
                    <div class="row clearfix">
                        <div class="col-md-12">
                        
                        </div>
                        <hr>
                        <div class="col-md-2"></div>
                       <div class="col-md-8 form-group">
                        <div class="row">
                           <div class="col-sm-12 col-md-5">
                              <div class="form-group form-float form-group-sm">
                                    <div class="form-line">
                                        <select class="custom-select select2" required name="svctype" id="svctype">
                                            <option value="">Service Type</option>
                                            @foreach($serviceTypes as $svcT)
                                            <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                            @endforeach
                                            <option value="999">Others - Specify</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float form-group-sm" id="serviceTypeOther">
                                    <div class="form-line">
                                        <input type="text" name="service_type_other" class="form-control" placeholder="Specify service type here" />
                                        <!-- <label class="form-label">Marriage Anniversory</label> -->
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group-sm"></div> -->
                            <div class="col-md-7">
                                <div class="row">
                                    
                                    <div class="col-md-4" id="servicedate">
                                        <div class="form-group form-float form-group-sm">
                                            <div class="form-line">
                                                <input type="text" name="service_date" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                                <label class="form-label">Date</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6" id="datefrom">
                                        <div class="form-group form-float form-group-sm">
                                            <div class="form-line">
                                                <input type="text" name="datefrom" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                                <label class="form-label">Date From</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6" id="datetoo">
                                        <div class="form-group form-float form-group-sm">
                                            <div class="form-line">
                                                <input type="text" name="dateto" class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                                <label class="form-label">Date To</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                    
                            </div>
                        </div>
                        
                        
                        <!-- <h5 class="text-uppercase text-center">Offerings/Tithes</h5> -->
                            {{ csrf_field() }}   
                            

                            <table class="table table-bordered table-hover" id="income">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;">Income Heading</th>
                                        <th style="text-align: center; text-transform: uppercase;">Cash</th>
                                        <th style="text-align: center; text-transform: uppercase;">POS/Transfer</th>
                                        <th style="text-align: center; text-transform: uppercase;">Cheques</th>
                                        <th style="text-align: center; text-transform: uppercase;">Total</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sources as $isource)
                                    <input class="total-ignore" type="hidden" name="iSourceId[]" value="{{$isource->id}}">
                                    <tr>
                                        <td width="23%">{{$isource->name}}</td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add cash" name="cash[]" id="cash" value="0" align="center" style="text-align: center; " onchange="sumOffering(); sumup();" onkeyup="sumOffering();" />
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm add pos" name="pos[]" id="pos" value="0" align="center" style="text-align: center; " onchange="sumOffering(); sumup();" /></td>
                                        <td><input type="number" class="form-control form-control-sm add cheques" name="cheques[]" id="cheques" value="0" align="center" style="text-align: center; " onchange="sumOffering(); sumup();" /></td>
                                        <td style="text-align: center; text-transform: uppercase; font-size: 17px;" width="5%" colspan=""> &#8358; <span id="sumOffering"></span></td>
                                    </tr>
                                    @endforeach
                                <tr>
                                <td colspan="4">Grand Total</td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm text-bolder h3">
                                        <b>&#8358; <span id="grandT"></span></b>
                                    </div>
                                </td>
                            </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                           
                        </div>

                        
                        <div class="col-md-12" align="center">
                            <hr>
                        <!-- <hr> -->
                          <button type="submit" class="btn btn-success">Submit Report</button>
                        </div>
                    </div>
                    </form>
                </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-md-12">
        <div class="card ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <div class="card-body">
                        <h4 class="text-center text-uppercase"> 
                            <span class="float-right">  
                                <!-- <a data-toggle="modal" data-target="#newincome" aria-expanded="false" aria-controls="collapseExample" class="btn btn-info btn-xs"> <i class="icon icon-download"></i> Submit</a> -->
                                <a href="{{ route('income.my-location-daily-reports', \Crypt::encrypt(434)) }}" class="btn btn-success btn-xs"> <i class="icon icon-print"></i> Todays Report</a>
                                @role('administrator|senior-pastor')
                                <a href="{{ route('income.my-location-monthly-reports', \Crypt::encrypt(434)) }}" class="btn btn-primary btn-xs"> <i class="icon icon-print"></i> Monthly Report</a>
                                <a href="{{ route('income.location-summary', \Crypt::encrypt(48930)) }}" class="btn btn-warning btn-xs"> <i class="icon icon-print"></i> Year Report</a>
                                @endrole
                            </span> 
                            Daily income Summary report </h4>  <hr><br>

                <table class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="25%" style="text-align: center; text-transform: uppercase;">income source Name</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Cash </th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">POS/Transfer</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Cheques</th>
                        <th width="8%" style="text-align: center; text-transform: uppercase;">Sub Total</th>
                        @role('administrator|auditor|hq-accountant')
                        <th width="12%" style="text-align: center; text-transform: uppercase;">Month's Total</th>
                        <th style="text-align: center; text-transform: uppercase;">Year Total</th>
                        @endrole
                        </tr>
                    </thead>
                     <tbody>
                            <tr class="odd gradeX">
                            @foreach($sources as $count => $source)
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$source->id}}">
                                <td><a href="{{route('classes.one', \Crypt::encrypt(1)) }}"> <b>{{ $source->name }}</b></a></td>
                                @php
                                    $today = \Carbon\Carbon::now()->toDateString();
                                    $todayCash = \App\IncomeReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->whereRaw('DATE(created_at) = ? ', [$today])->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash');
                                    $todayPos = \App\IncomeReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->whereRaw('DATE(created_at) = ? ', [$today])->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos');
                                    $todayCheque = \App\IncomeReport::where('year', \Carbon\Carbon::now()->format('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->whereRaw('DATE(created_at) = ? ', [$today])->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques');
                                @endphp

                                <td align="right">
                                    {{ number_format($todayCash, 0)}}
                                </td>
                                <td align="right">
                                    {{ number_format($todayPos, 0)}}
                                </td>
                                <td align="right">
                                    {{ number_format($todayCheque, 0)}}
                                </td>
                                <td align="right">
                                    {{ number_format($todayCash + $todayPos + $todayCheque, 0)}}
                                </td>
                                @role('administrator|auditor|hq-accountant')
                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }} <!-- Month's Total-->
                                </td>

                                <td align="right">{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->where('income_report_source_id', $source->id)->sum('cheques')), 0) }} <!-- Month's Total-->
                                </td>
                                @endrole
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="font-weight: bold;">Grand Daily Total</td>
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at',  \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('cash')), 0) }}</td>
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at',  \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('pos')), 0) }}</td>
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at',  \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at', \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at', \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->whereDate('created_at', \Carbon\Carbon::today())->where('location_id', \Auth::user()->location_id)->sum('cheques')), 0) }}</td>
                        @role('administrator|auditor|hq-accountant')
                            <td align="right" style="font-weight: normal;"> &#8358; {{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->whereDate('created_at', \Carbon\Carbon::today())->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->whereDate('created_at', \Carbon\Carbon::today())->sum('pos') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->whereDate('created_at', \Carbon\Carbon::today())->sum('cheques')), 0) }}</td>
                           
                            <td align="right" style="font-weight: normal;"> &#8358;{{
                                    number_format(( \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('cash') + \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('pos') +  \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->where('location_id', \Auth::user()->location_id)->sum('cheques') ), 0) }}</td>
                        @endrole
                        </tr>
                    </tbody>
              </table>  
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@include('accounts.income.modals.submitweekincome')
@endsection
@section('scripts')
    <!-- Page Script  -->


<script type="text/javascript">

   function sumup() {
    $("#income").on('input', '.add', function () {
     var GTotal = 0;
     $("#income .add ").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });

    $("#income").on('input', '.add', function () {
     var GTotal = 0;
     $("#income .add ").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });

    $("#income").on('input', '.add', function () {
     var GTotal = 0;
     $("#income .add ").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }

  function sumOffering() {
    $("#income").on('input', '.offerings', function () {
     var GTotal = 0;
     $("#income .offerings").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumOffering").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }

  function sumTithe() {
    $("#income").on('input', '.tithes', function () {
     var GTotal = 0;
     $("#income .tithes").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumTithe").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }
  function sumProjOff() {
    $("#income").on('input', '.project', function () {
     var GTotal = 0;
     $("#income .project").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumProjOff").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }
  function sumSacOff() {
    $("#income").on('input', '.sacrifice', function () {
     var GTotal = 0;
     $("#income .sacrifice").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumSacOff").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }

  function sumOtherOff() {
    $("#income").on('input', '.others', function () {
     var GTotal = 0;
     $("#income .others").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumOtherOff").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }

  function sumcol() {
      $("#income").on('input', '.add', function () {
     var GTotal = 0;
     $("#income .add").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumOtherOff").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }



</script>

@endsection