@extends('layouts.master')

@section('content')
<div class="row"> 
  <div class="col-md-12">
    <div class="card">
         <div class="card-header white">
             <h6>History of Location(s) pastored
                <span class="float-right">  
                    @role('administrator|senior-pastor')
                    <div class="btn-group btn-block" >
                      <button class="btn btn-success btn-xs btn-flat btn-block ">Print Information</button>
                      <button class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <li><a href="{{ route('pastor.printpostinghistory', \Crypt::encrypt(434)) }}" class="btn"> Print All Records</a></li>
                          <li><a href="{{ route('pastor.printpostinghistory', \Crypt::encrypt(434)) }}" class="btn"> Pastors Without Posting Records</a></li>
                          <li><a href="{{ route('pastor.printpostinghistory', \Crypt::encrypt(434)) }}" class="btn"> Pastors With Posting Records</a></li>
                          <!-- <li class="divider"></li> -->
                      </ul>
                    </div>
                    @endrole
                </span>
             </h6>
         </div>
         <div class="card-body">
          <table id="example" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
              <thead>
                <tr>
                  <th width="3%" style="text-transform: uppercase; text-aling: center;">Serial</th>
                  <th width="9%" style="text-transform: uppercase; text-aling: center;">Pastor</th>
                  <th width="12%" style="text-transform: uppercase; text-aling: center;">Current State</th>
                  <th width="13%" style="text-transform: uppercase; text-aling: center;">Location Name</th>
                  <th width="7%" style="text-transform: uppercase; text-aling: center;">Serving From</th>
                  <th width="7%" style="text-transform: uppercase; text-aling: center;">Serving To</th>
                  <th width="5%" style="text-transform: uppercase; text-aling: center;">Duration</th>
                  <th width="7%" style="text-transform: uppercase; text-aling: center;">Position</th>
                  <th width="8%" style="text-transform: uppercase; text-aling: center;">Num. Att. Average</th>
                  <th width="8%" style="text-transform: uppercase; text-aling: center;">Purchse Landed Property</th>
                  <th width="8%" style="text-transform: uppercase; text-aling: center;">Built Structure(s)</th>
                  <th width="8%" style="text-transform: uppercase; text-aling: center;">Unfinished Structure(s)</th>
                  <th width="8%" style="text-transform: uppercase; text-aling: center;">Renovated Structure(s)</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                @foreach($pastors as $no => $pst)
                  <td>{{++$no}}</td>
                  <td><a href="{{route('pastors.one', \Crypt::encrypt($pst->id)) }}">{{$pst->surname .' '.$pst->othernames}}</a></td>
                  <td>{{isset($pst->get_loc->loc_state) ? $pst->get_loc->loc_state->state : "Undefined"}}</td>
                  <td>
                  	@foreach($pst->postingHistories as $his)
                  	<ul>
	                  	<li>{{$his->location->loc_name}}</li>
                  	</ul>
                  	@endforeach
                  </td>
                  <td>
                    @foreach($pst->postingHistories as $his)
                    <ul>
                      <li>{{$his->date_from}}</li>
                    </ul>
                    @endforeach
                  </td>
                  <td>
                    @foreach($pst->postingHistories as $his)
                    <ul>
                      <li>{{$his->date_to}}</li>
                    </ul>
                    @endforeach
                  </td>
                  <td>
                    @foreach($pst->postingHistories as $his)
                    @php 
                      $dfrom = \Carbon\Carbon::createFromFormat("Y-m-d", $his->date_from);
                      $dTo = \Carbon\Carbon::createFromFormat("Y-m-d", $his->date_to);
                    @endphp
                    <ul>
                      <li>
                      </li>
                        {{$dTo->diffInYears($dfrom)}} year(s)
                    </ul>
                    @endforeach
                  </td>
                  <td>
                    @foreach($pst->postingHistories as $his)
                    <ul>
                      <li>
                        @if($his->position ==7) 
                        Resident Pastor
                        @else
                        Assistant Pastor
                        @endif
                      </li>
                    </ul>
                    @endforeach
                  </td>

                  <td align="right">
                    @foreach($pst->postingHistories as $his)
                    <ul>
                      <li>
                        @if($his->numberical_attendance_average ==1)
                        51 - 100
                        @elseif($his->numberical_attendance_average ==2)
                        101 - 200
                        @elseif($his->numberical_attendance_average ==3)
                        201 - 500
                        @elseif($his->numberical_attendance_average ==4)
                        501 - 700
                        @elseif($his->numberical_attendance_average ==5)
                        701 - 1, 000
                        @elseif($his->numberical_attendance_average ==6)
                        1,500 - 2, 000
                        @elseif($his->numberical_attendance_average ==7)
                        2,001 - 3, 000
                        @elseif($his->numberical_attendance_average ==8)
                        3, 001 - 4, 000
                        @elseif($his->numberical_attendance_average ==9)
                        4, 001 - 6, 000
                        @elseif($his->numberical_attendance_average ==10)
                        7, 000 - 10, 000
                        @elseif($his->numberical_attendance_average ==10)
                        11, 000 - 15, 000
                        @else
                        Unspecified
                        @endif
                      </li>
                    </ul>
                    @endforeach
                  </td>
                  <td>
                    @foreach($pst->postingHistories as $his)
                    <ul>
                      <li>
                        {{isset($his->land_size) ? $his->land_size : "None"}}
                      </li>
                    </ul>
                    @endforeach
                  </td>

                  <td>
                    <?php $locStr = json_decode($his->structure_type_id);?>
                    @foreach($pst->postingHistories as $his)
                      @if(isset($locStr))
                        @foreach($locStr as $stype)
                        <ul>
                          <li>
                           {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                          </li>
                        </ul>
                        @endforeach
                        @else
                        <ul>
                          <li>
                            
                            None
                          </li>
                        </ul>
                        @endif
                      @endforeach
                  </td>

                  <td>
                    <?php $locStr = json_decode($his->unfinished_structure_type_id);?>
                    @foreach($pst->postingHistories as $his)
                      @if(isset($locStr))
                        @foreach($locStr as $stype)
                        <ul>
                          <li>
                           {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                          </li>
                        </ul>
                        @endforeach
                        @else
                        <ul>
                          <li>
                            
                            None
                          </li>
                        </ul>
                        @endif
                      @endforeach
                  </td>

                  <td>
                    <?php $locStr = json_decode($his->ren_structure_type_id);?>
                    @foreach($pst->postingHistories as $his)
                      @if(isset($locStr))
                        @foreach($locStr as $stype)
                        <ul>
                          <li>
                           {{isset($stype)  ? \App\StructureType::find($stype)->name : "None"}} &nbsp; 
                          </li>
                        </ul>
                        @endforeach
                        @else
                        <ul>
                          <li>
                            
                            None
                          </li>
                        </ul>
                        @endif
                      @endforeach
                  </td>

              </tr>

              @endforeach
              </tbody>
          </table>
         </div>
     </div>
 </div>
</div>

@endsection