@extends('layouts.master')

@section('content')
<div class="row row-eq-height my-3 mt-3">
    <div class="col-md-12">
         <div class="row no-gutters">
            <div class="col-md-2">
                <a href="{{ route('members.index') }}">
                <div class="p-5 blue1 text-white">
                    <h5 class="font-weight-normal s-14">Total Members</h5>
                    <span class="s-48 font-weight-lighter text-primary bolder">{{ number_format(count($members), 0) }}</span>
                    <div>  Growth %
                        <span class="text-primary">
                            <i class="icon icon-arrow_downward"></i> 1.07%</span>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('locations.index') }}">
                <div class="p-5 white">
                    <h5 class="font-weight-normal s-14">Locations</h5>
                    <span class="s-48 font-weight-lighter light-green-text bolder">{{ number_format(count($locations), 0) }}</span>
                    <div> Global % 
                        <span class="text-light-green">
                            <i class="icon icon-arrow_downward"></i> 100%</span>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('converts.newconverts') }}">
                    
                <div class="p-5 blue lighten-3 text-white">
                    <h5 class="font-weight-normal text-white s-14">New Converts</h5>
                    <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($newconverts), 0) }}</span>
                    <div> Global %
                        <span class="text-primary">
                            <i class="icon icon-arrow_downward"></i> 21.32%</span>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ route('converts.firsttimers') }}">
                <div class="p-5 white">
                    <h5 class="font-weight-normal s-14">First Timers</h5>
                    <span class="s-48 font-weight-lighter amber-text bolder">{{ number_format(count($firsttimers), 0) }}</span>
                    <div> Global % 
                        <span class="amber-text">
                            <i class="icon icon-arrow_downward"></i> 5.67%</span>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2">
                <div class="p-5  blue lighten-4 text-white">
                    <h5 class="font-weight-normal s-14 text-white">Foundation Class</h5>
                    <span class="s-48 font-weight-lighter text-white bolder">{{ number_format(count($fclassPeople), 0) }}</span>
                    <div> Global %
                        <span class="text-white">
                            <i class="icon icon-arrow_downward"></i> 0.00%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="p-5 white">
                    <h5 class="font-weight-normal s-14">DLTC</h5>
                    <span class="s-48 font-weight-lighter pink-text bolder">{{ number_format(count($dltcPeople), 0) }}</span>
                    <div> Global %
                        <span class="pink-text">
                            <i class="icon icon-arrow_downward"></i> 0.00%</span>
                    </div>
                </div>
            </div>

        </div>
        <hr>
    </div>
    <div class="col-md-6">
        <div class="card no-b p-2" style="height: 498px;">
            <div class="card-body">
                <div class="card-body">
                    <div class="height-300">
                        <canvas
                            data-chart="chartJs"
                            data-chart-type="doughnut"
                            data-dataset="[[2, 2,152,125],]"
                            data-labels="[['Members'],['DHC Establishment'],['First Timers'],['New Converts'],['Database2']]"
                            data-dataset-options="[
                                            { label: 'Members',
                                                backgroundColor: [
                                                    '#03a9f4',
                                                    '#8f5caf',
                                                    '#3f51b5'],},]"data-options="{legend: {display: !0,position: 'bottom',labels: {fontColor: '#7F8FA4',usePointStyle: !0}},}">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-md-6">
         <div class="row text-white no-gutters no-m shadow">
           
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="#">
                    <div class="p-2 green counter-box text-white">
                        <h5 class="font-weight-normal s-14">Members</h5>
                        <span class="sc-counter s-48 font-weight-lighter text-primary">{{ number_format(count($members), 0) }}</span>
                        <div class="float-right">
                            <span class="icon icon-arrow_downward s-48"></span>
                        </div>
                    </div>
                    <div class="row p-1 s-18 text-center text-success">
                        <div class="col-4 b-r"> 
                            NC (%)<div>2.5%</div>
                        </div>
                        <div class="col-4"> 
                            FT (%) <div>6.5%</div>
                        </div>
                        <div class="col-4"> 
                            DHC (%) <div>6.5%</div>
                        </div>
                    </div>
                </a>
            </div>

			<div class="col-lg-6 col-md-6 col-sm-12">
				<a href="#">
                    <div class="p-2 blue1 counter-box p-30 text-white">
                         <h5 class="font-weight-normal s-14">Total Converts</h5> 
                        <div class="float-right">
                            <span class="icon icon-people_outline s-48"></span>
                        </div>

                        &emsp;&emsp;<span class="sc-counter  s-48 font-weight-lighter text-primary">{{ number_format(count($people), 0) }}</span>
                        &emsp;&emsp;&emsp;&ensp;<h6 class="counter-title">Total Converts</h6>
                    </div>
                    <div class="row p-1 s-18 text-center">
                        <div class="col-6 b-r text-green"> 
                            New Converts <div>{{ number_format(count($newconverts), 0) }}</div>
                        </div>
                        <div class="col-6 text-green"> 
                            First Timers    <div class="text-green " >0.0% <span class="icon icon-arrow_upward s-24 text-green green"></span></div>
                        </div>
                    </div>
				</a>
			</div>
        </div> 
        <div class="row text-white no-gutters no-m shadow">
            <div class="col-lg-6 col-md-6 col-sm-12">
	            <a href="#">
				    <div class="lime counter-box p-40">
	                    <div class="float-right">
	                        <span class="icon icon-sitemap s-48"></span>
	                    </div>
	                    <div class="sc-counter s-36">0</div>
	                    <h6 class="counter-title">Discipleship Class</h6>
	                </div>
	            </a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<a href="#">
				    <div class="sunfollower counter-box p-40">
	                    <div class="float-right">
	                        <span class="icon icon-certificate2 s-48"></span>
	                    </div>
	                    <div class="sc-counter s-36">0</div>
	                    <h6 class="counter-title">Dunamis School of Ministry</h6>
	                </div>
				</a>
			</div>
        </div> -->
        <!--  <hr>
        <div class="row text-white no-gutters no-m shadow">
            <div class="col-lg-6 col-md-6 col-sm-12">
            	<a href="#">
				    <div class="deep-orange lighten-2 counter-box p-40">
	                    <div class="float-right">
	                        <span class="icon icon-home s-48"></span>
	                    </div>
                        <div class="sc-counter s-36">{{ number_format(count($homecell), 0) }}</div>
	                    <h6 class="counter-title">Dunamis Home Church</h6>
	                </div>
	            </a>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<a href="{{ route('locations.index') }}">
				    <div class="purple accent-1 counter-box p-40">
	                    <div class="float-right">
	                        <span class="icon icon-building s-48"></span>
	                    </div>
	                    <div class="sc-counter s-36">{{ $locs->count() }}</div>
	                    <h6 class="counter-title">Locations/Branches</h6>
	                </div>
	            </a>
			</div>
        </div> 
    </div>-->
    <div class="col-md-6">
    	<div class=" card b-0">
            <div class="card-body p-5 slimScroll" data-height="500"">
            	<h5 class="text-uppercase">Location Attendance Analysis for {{ date('jS M, Y')}} 
                    <!-- <div class="pull-right">Print This</div> -->
                    &ensp; &ensp;&ensp; &ensp;&ensp; &ensp;&ensp; &ensp;&ensp; &ensp;&ensp; &ensp; &ensp;&ensp; &ensp;&ensp; &ensp; <a href="{{route('attendance.printpeoplesummary', \Crypt::encrypt('dfae43'))}}"> <i class="icon icon-print s-24"></i></a>
                <!-- <div class="pull-right" align="right"><a data-toggle="collapse" data-target="#addAttendance" aria-expanded="false" class="btn btn-primary btn-xs">Take Attendance</a></div> -->
            </h5>

            	<table class="table table-hover earning-box">
            		<thead>
            			<!-- <tr>
            				<th colspan="6" style="text-align: center; text-transform: uppercase;">Location Attendance Analysis</th>
            			</tr> -->
            		</thead>
                    <tbody>
                    	<tr>
                    		<td rowspan="8" style="font-size: 10px;"><a href="">{{ $locs->loc_name}}</a></td>
                    		<td colspan="" style="text-align: center;" width="19%">Services </td>
                            <td style="text-align: center;">MALE</td>
                            <td style="text-align: center;">FEMALE</td>
                            <td style="text-align: center;">CHILD.</td>
                            <td style="text-align: center;">NC</td>
                    		<td style="text-align: center;">FT</td>
                            <td style="text-align: center;">Total</td>
                    	</tr>
                            @foreach($services as $svc)
                            <?php 
                                $fsvcftimr = \App\People::where('service_id',1)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $secsvcftimr = \App\People::where('service_id',2)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $thirdsvcftimr = \App\People::where('service_id',3)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $forthsvcftimr = \App\People::where('service_id',4)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $fifthsvcftimr = \App\People::where('service_id',5)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $sixthsvcftimr = \App\People::where('service_id',6)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();

                                $fsvcnewconverts = \App\People::where('service_id',1)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $secsvcnewconverts = \App\People::where('service_id',2)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $thirdsvcnewconverts = \App\People::where('service_id',3)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $forthsvcnewconverts = \App\People::where('service_id',4)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $fifthsvcnewconverts = \App\People::where('service_id',5)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                                $sixthsvcnewconverts = \App\People::where('service_id',6)->where('people_category_id',1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
                            ?>
                    	<tr>
                    		<td>{{ $svc->name}}</td>
                            <td align="center"> 
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                            </td>
                           
                            <td align="center">
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                            </td>

                            <td align="center">
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                            </td>
                            <td align="center">
                               @if($svc->id == 1)
                                {{number_format(count($fsvcnewconverts),0)}}
                                @elseif($svc->id == 2)
                                {{number_format(count($secsvcnewconverts),0)}}
                                @elseif($svc->id == 3)
                                {{number_format(count($thirdsvcnewconverts),0)}}
                                @elseif($svc->id == 4)
                                {{number_format(count($forthsvcnewconverts),0)}}
                                @elseif($svc->id == 5)
                                {{number_format(count($fifthsvcnewconverts),0)}}
                                @elseif($svc->id == 6)
                                {{number_format(count($sixthsvcnewconverts),0)}}
                                @else
                                0
                                @endif
                            </td>
                            <td align="center">
                                @if($svc->id == 1)
                                {{number_format(count($fsvcftimr),0)}}
                                @elseif($svc->id == 2)
                                {{number_format(count($secsvcftimr),0)}}
                                @elseif($svc->id == 3)
                                {{number_format(count($thirdsvcftimr),0)}}
                                @elseif($svc->id == 4)
                                {{number_format(count($forthsvcftimr),0)}}
                                @elseif($svc->id == 5)
                                {{number_format(count($fifthsvcftimr),0)}}
                                @elseif($svc->id == 6)
                                {{number_format(count($sixthsvcftimr),0)}}
                                @else
                                0
                                @endif
                            </td>
                            <td align="center">
                                @if($svc->id ==1)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 1)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}

                                @elseif($svc->id ==2)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}

                                @elseif($svc->id ==3)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 3)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}

                                @elseif($svc->id ==4)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 4)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}
                                
                                @elseif($svc->id ==5)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 5)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}

                                @elseif($svc->id ==6)
                                {{$fm = number_format($m = \App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $ch = \App\ServiceAttendance::where('service_id', 6)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'), 0) }}
                                @else
                                {{$fm = 0}}
                                @endif
                            </td>
                            @endforeach
                    	</tr>
                    	<tr>
                    		<td>Total</td>
                            <td align="center">
                                <strong>
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                                </strong>
                            </td>
                            <td align="center">
                                <strong>
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                                </strong>
                            </td>
                            <td align="center">
                                <strong>
                                @if($svc->id ==1)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==2)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==3)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==4)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==5)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}

                                @elseif($svc->id ==6)
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                                @else
                                {{$fm = 0}}
                                @endif
                                </strong>
                            </td>
                            <td align="center">
                                <strong>
                                    {{number_format(count($fsvcnewconverts) + count($secsvcnewconverts) + count($thirdsvcnewconverts) + count($forthsvcnewconverts) + count($fifthsvcnewconverts) + count($sixthsvcnewconverts),0)}}
                                </strong>
                            </td>
                            <td align="center">
                                <strong>
                                    {{number_format(count($fsvcftimr) + count($secsvcftimr) + count($thirdsvcftimr) + count($forthsvcftimr) + count($fifthsvcftimr) + count($sixthsvcftimr),0)}}
                                </strong>
                            </td>
                    		<td align="center">
                                <strong>
                                {{$fm = number_format(\App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('male') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('female') + $fm = \App\ServiceAttendance::where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->sum('children'),0)}}
                                </strong>
                            </td>
                    	</tr> 
                    </tbody>
                </table>
                <a href="{{route('locations.show-attendance')}}" class="btn btn-primary darken-3 btn-sm btn-block">View More Attendance Chart</a>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
 <script type="text/javascript">
    //function calculateAttendance(savings){
      //Get selected data  
      // console.log(document.getElementById("male").value);
      // var male = document.getElementById("male").value;
      // var female = document.getElementById("female").value;
      // var children = document.getElementById("children").value;
      //convert data to integers
      // fmale = parseInt(male);
      // ffemale = parseInt(female);
      // fchildren = parseInt(children);
      // var total = fmale+ffemale+fchildren; 
      //print value to screen 
      // total = total.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      // document.getElementById("total").value=total;

    //}

    <?php 
        $fsvcftimr = \App\People::where('service_id',1)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        $secsvcftimr = \App\People::where('service_id',2)->where('people_category_id',2)->where('service_date', \Carbon\Carbon::now()->format('Y-m-d'))->get();
     ?>
    //Gender Pie Chart
        var ctx = document.getElementById("peoplecateCart").getContext('2d');
        var m = malex;
        var f = femalex;
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Male %", "Female %"],
            datasets: [{
              backgroundColor: [
                "#2ecc71",
                "#3498db"],
              label: 'View',
              data: [Math.round(100/60 * 46).toFixed(2), Math.round(100 / 60 * 13).toFixed(2)]
            }]
          }
        });
        //End Gender Chart

</script>

@endsection
