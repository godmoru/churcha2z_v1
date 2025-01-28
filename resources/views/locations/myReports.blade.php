@extends('layouts.master')

@section('content')

    <div class="container-fluid white col-md-12">
        <div class="row p-t-b-12 col-md-12 col-lg-12 ">
            <div class="card b-0">
                <div class="card-header white">
                    <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> {{ $pageName }} </strong> 
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                      <thead>
                        <tr>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">S/No</th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">Service Date</th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">Month</th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">Week</th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">Service Type</th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2">Service</th>
                            <th style="text-transform: uppercase; text-align: center;" colspan="3">Attendance</th>
                            <th style="text-transform: uppercase; text-align: center;" colspan="2">Converts</th>
                            <th style="text-transform: uppercase; text-align: center;" colspan="3" ><center>Offering</center></th>
                            <th style="text-transform: uppercase; text-align: center;" colspan="3" ><center>Tithe</center></th>
                            <th style="text-transform: uppercase; text-align: center;" rowspan="2"><center>options</center></th>
                            </tr>
                            <tr>
                                <th style="text-transform: uppercase; text-align: center;">Male</th>
                                <th style="text-transform: uppercase; text-align: center;">Female</th>
                                <th style="text-transform: uppercase; text-align: center;">Children</th>
                                <th style="text-transform: uppercase; text-align: center;">NC</th>
                                <th style="text-transform: uppercase; text-align: center;">FT</th>
                                <th style="text-transform: uppercase; text-align: center;"> Cash</th>
                                <th style="text-transform: uppercase; text-align: center;"> POS</th>
                                <th style="text-transform: uppercase; text-align: center;"> Cheques</th>
                                <th style="text-transform: uppercase; text-align: center;"> Cash</th>
                                <th style="text-transform: uppercase; text-align: center;"> POS</th>
                                <th style="text-transform: uppercase; text-align: center;"> Cheques</th>
                            </tr>
                        </thead>
                         <tbody>
                                <tr class="odd gradeX">
                                @foreach($wReports as $count => $rPort)
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif">{{ ++$count }}</td>  
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" width="10%">{{ \Carbon\Carbon::parse($rPort->service_date)->format("jS M, Y") }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif">
                                        @if($rPort->month == 1)
                                            January
                                        @elseif($rPort->month == 2)
                                            February
                                        @elseif($rPort->month == 3)
                                            March
                                        @elseif($rPort->month == 4)
                                            April
                                        @elseif($rPort->month == 5)
                                            May
                                        @elseif($rPort->month == 6)
                                            June
                                        @elseif($rPort->month == 7)
                                            July
                                        @elseif($rPort->month == 8)
                                            August
                                        @elseif($rPort->month == 9)
                                            September
                                        @elseif($rPort->month == 10)
                                            October
                                        @elseif($rPort->month == 11)
                                            November
                                        @elseif($rPort->month == 12)
                                            December
                                        @else
                                            Unknown Month
                                        @endif
                                    </td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">
                                        @if($rPort->week == 1)
                                            1st
                                        @elseif($rPort->week == 2)
                                            2nd
                                        @elseif($rPort->week == 3)
                                            3rd
                                        @elseif($rPort->week == 4)
                                            4th
                                        @elseif($rPort->week == 5)
                                            5th
                                        @else
                                            Error
                                        @endif
                                    </td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" width="13%">{{ $rPort->serviceType['name'] }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">
                                        @if($rPort->service_id == 1)
                                            1st
                                        @elseif($rPort->service_id == 2)
                                            2nd
                                        @elseif($rPort->service_id == 3)
                                            3rd
                                        @elseif($rPort->service_id == 4)
                                            4th
                                        @elseif($rPort->service_id == 5)
                                            5th
                                        @elseif($rPort->service_id == 5)
                                            6th
                                        @else
                                            Error
                                        @endif
                                    </td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->attendance_male,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->attendance_female,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->attendance_children,0) }}</td>

                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->new_converts,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->first_timers,0) }}</td>

                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->offering_cash,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->offering_pos,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->offering_transfer,0) }}</td>

                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->tithe_cash,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->tithe_pos,0) }}</td>
                                    <td style="@if($rPort->getEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif" align="center">{{ number_format($rPort->tithe_transfer,0) }}</td>
                                    <td align="center">
                                        @role('administrator|resident-pastor')
                                        <a data-male="{{$rPort->attendance_male}}" data-female="{{$rPort->attendance_female}}" data-children="{{$rPort->attendance_children}}" data-ocash="{{$rPort->offering_cash}}" data-opos="{{$rPort->offering_pos}}" data-otransfer="{{$rPort->offering_transfer}}" data-tcash="{{$rPort->tithe_cash}}" data-tpos="{{$rPort->tithe_pos}}" data-ttransfer="{{$rPort->tithe_transfer}}" data-svcDate="{{$rPort->service_date}}" data-msgtitle="{{$rPort->message_title}}" data-newconverts="{{$rPort->new_converts}}" data-firsttimers="{{$rPort->first_timers}}" data-id="{{$rPort->id}}" data-toggle="modal" data-target="#editWeeklyReport" class="btn btn-xs btn-warning orange accent-1"> Modify</a>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                  </table>                
                </div>
            </div>
        </div>
    </div>
@include('locations.modals.editweekreport')
@endsection
@section('scripts')
    <!-- Page Script  -->


<script type="text/javascript">

$('#editWeeklyReportx').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
});
 $('#editWeeklyReport').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var male = button.data('male') 
      var female = button.data('female') 
      var children = button.data('children') 
      var aT = male + female + children 
      var first_timers = button.data('firsttimers') 
      var new_converts = button.data('newconverts') 
      var ocash = button.data('ocash') 
      var opos = button.data('opos') 
      var otransfer = button.data('otransfer') 
      var tcash = button.data('tcash') 
      var tpos = button.data('tpos') 
      var ttransfer = button.data('ttransfer') 
      var msgtitle = button.data('msgtitle') 
      var preacher = button.data('preacher') 
      var svcDtate = button.data('svcDtate') 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #male').val(male);
      modal.find('.modal-body #female').val(female);
      modal.find('.modal-body #children').val(children);
      modal.find('.modal-body #grandT').val(aT);
      modal.find('.modal-body #firsttimers').val(first_timers);
      modal.find('.modal-body #newconverts').val(new_converts);
      modal.find('.modal-body #offering_cash').val(ocash);
      modal.find('.modal-body #offering_pos').val(opos);
      modal.find('.modal-body #offering_transfer').val(otransfer);
      modal.find('.modal-body #tithes_cash').val(tcash);
      modal.find('.modal-body #tithes_pos').val(tpos);
      modal.find('.modal-body #tithes_transfer').val(ttransfer);
      modal.find('.modal-body #preacher').val(preacher);
      modal.find('.modal-body #msgtitle').val(msgtitle);
      modal.find('.modal-body #service_date').val(svcDtate);

      modal.find('.modal-body #id').val(id);
});
</script>
@endsection