@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="col-md-12">
                <div class=" card b-0">
                    <div class="card-body">
                         <h4 class="text-center text-uppercase">Add weekly report</h4> <hr><br>
                    <form class="form-material" action="{{ route('locations.weekly-reports-add') }}" method="POST">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-3">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="svctype" id="svctype">
                                                <option value="">Service Type</option>
                                                @foreach($serviceTypes as $svcT)
                                                <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                                @endforeach
                                                <option value="9000">Other Specify</option>
                                            </select>
                                        </div>
                                        <div class="col-md" id="service_other">
                                          <div class="form-group form-float form-group-sm">
                                                <div class="form-line">
                                                    <select class="custom-select select2" name="svctype_other" id="svctype_other">
                                                        <option value="">Other Service</option>
                                                        <option value="9001">Monday's Service</option>
                                                        <option value="9004">Tuesday's Service</option>
                                                        <option value="9002">Thursday's Service</option>
                                                        <option value="9003">Saturday's Service</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="svc" id="svc">
                                                <option value="">Service</option>
                                                <option value="999999">All Services</option>
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
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="week" id="week">
                                                <option value="">Week Under Review</option>
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                                <option value="5">Week 5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3" align="">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <select class="custom-select select2" required name="preacher" id="preacher">
                                                <option value="">Preacher</option>
                                                @foreach(\App\Pastor::whereBetween('id', [1,2])->get() as $pst)
                                                <option value="{{$pst->id}}">{{$pst->surname.' '.$pst->othernames}}</option>
                                                @endforeach
                                                
                                                @foreach($pastors as $pst)
                                                <option value="{{$pst->id}}">{{$pst->surname.' '.$pst->othernames}}</option>
                                                @endforeach
                                                <option value="909090909">Others - Specify</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md" id="preacher_other">
                                      <div class="form-group form-float form-group-sm">
                                            <div class="form-line">
                                              <input type="text" name="preacher_other_name" class="form-control" placeholder="Preacher Name" align="ccenter" />
                                              <input type="text" name="preacher_other_ministry" class="form-control" placeholder="Preacher Ministry" align="ccenter" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" align="">
                                  <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                          <input type="text" name="messagetitle" required class="form-control" placeholder="Message Title here" align="ccenter" />
                                        </div>
                                    </div>
                                </div>
                        <br>
                            </div>
                        </div>
                        <hr>
                        
                        
                        <div class="col-md-7 form-group">
                        <h5 class="text-uppercase text-center">Attendance</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Male</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Female</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Children</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add male" name="male" id="male" value="0" align="center" onkeyup="sumup();" onchange="sumup();" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add female" name="female" id="female" value="0" align="center" onchange="sumup();" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add children" name="children" id="children" value="0" align="center" onchange="sumup();" style="text-align: center; " />
                                        </td> 
                                        <td align="center">
                                          <b style="text-align: center; font-size: "><span id="grandT"></span></b>
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="col-md-5 form-group">
                            {{ csrf_field() }}   
                            <h5 class="text-uppercase text-center">New Converts/First Timers</h5>
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">New Converts</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">First Timers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm newconverts" name="newconverts" id="newconverts" value="0" align="center" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm firsttimers" name="firsttimers" id="firsttimers" value="0" align="center" style="text-align: center; " />
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
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
                                <a href="{{ route('locations.week-reports-print') }}" class="btn btn-success btn-xs"> <i class="icon icon-print"></i> This Report</a>
                                @role('administrator|senior-pastor')
                                <a href="{{ route('locations.monthly-reports') }}" class="btn btn-primary btn-xs"> <i class="icon icon-print"></i> Monthly Report</a>
                                <a href="{{ route('locations.yearly-reports') }}" class="btn btn-warning btn-xs"> <i class="icon icon-print"></i> Year Report</a>
                                @endrole
                            </span> 
                            Summmary report week {{ isset(\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->first()->week) ? \Carbon\Carbon::now()->weekNumberInMonth : \Carbon\Carbon::now()->weekNumberInMonth.', '. date('F, Y')}}</h4>  <hr><br>
                    <table id="example2" class="table table-bordered table-hover table-responsive" border="1" width="100%" data-options='{ "paging": false; "searching":false}'>
                    <thead>

                        <tr>
                            <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2">Service Days/Weeks</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="4">WEEK {{ isset(\App\WeeklyReport::where('month', \Carbon\Carbon::now()->format('m'))->where('location_id', \Auth::user()->location_id)->first()->week) ? \Carbon\Carbon::now()->weekNumberInMonth : \Carbon\Carbon::now()->weekNumberInMonth}} </td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">New Converts</td>
                            <td width="6%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">First Timers</td>
                        </tr>
                        <tr>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">MALE</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">FEMALE</td>
                            <td width="7%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">CHILDREN</td>
                            <td width="10%" style="text-align: center; text-transform: uppercase; font-weight: bold;" colspan="">WEEK TOTAL</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                //Sundays//
                                $sMATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;
                                $sFATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;
                                $sCATT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0;
                                
                                $sNC = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $sFT = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;

                                $sTithe = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount : 0;

                                $sOffering = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_amount) ? $reports::where('service_type_id', '!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_amount : 0;

                                 $offcashS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash : 0;

                                $offposS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos : 0;

                                $offchequeS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer: 0;

                                $tithecashS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash : 0;

                                $titheposS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos : 0;

                                $thithechequeS = isset($reports::where('service_type_id', '!=', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer) ? $reports::where('service_type_id','!=',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer: 0;


                                //Mondays
                                
                                $mMATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $mFATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $mCATT = isset($reports::where('service_type_other_id', '=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;
                                $mNC = isset($reports::where('service_type_other_id', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $mFT = isset($reports::where('service_type_other_id', 9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9001)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;



                                //Tuesdays
                                
                                $tMATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $tFATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $tCATT = isset($reports::where('service_type_id', '=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id','=', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $tNC = isset($reports::where('service_type_id', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',4)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $tFT = isset($reports::where('service_type_id', 4)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',4)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;

                                
                                //Tuesdays Evening or other service
                                $toMATT = isset($reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $toFATT = isset($reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $toCATT = isset($reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $toNC = isset($reports::where('service_type_other_id', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $toFT = isset($reports::where('service_type_other_id', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id', '=', 9004)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;
                                
                                
                                //Wednesday//
                                $wMATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;
                                $wFATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;
                                $wCATT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0;

                                $wNC = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $wFT = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;

                                $wTithe = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_amount : 0;


                                //Thursdays\\

                                $thMATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $thFATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $thCATT = isset($reports::where('service_type_other_id', '=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $thNC = isset($reports::where('service_type_other_id', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $thFT = isset($reports::where('service_type_other_id', 9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9002)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;


                                //Fridays\\

                                $friMATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $friFATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $friCATT = isset($reports::where('service_type_id', '=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_id','=', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $friNC = isset($reports::where('service_type_id', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_id',6)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $friFT = isset($reports::where('service_type_id', 6)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_id',6)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;


                                //Saturday\\

                                $stMATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_male : 0 ;

                                $stFATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_female : 0 ;


                                $stCATT = isset($reports::where('service_type_other_id', '=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children) ? $reports::where('service_type_other_id','=', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->attendance_children : 0 ;

                                $stNC = isset($reports::where('service_type_other_id', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts) ? $reports::where('service_type_other_id',9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->new_converts : 0;
                                $stFT = isset($reports::where('service_type_other_id', 9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers) ? $reports::where('service_type_other_id',9003)->where('location_id', \Auth::user()->location_id)->latest()->first()->first_timers : 0;





                                $offcashW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_cash : 0;

                                $offposW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_pos : 0;

                                $offchequeW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->offering_transfer: 0;

                                $tithecashW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_cash : 0;

                                $titheposW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_pos : 0;

                                $thithechequeW = isset($reports::where('service_type_id', 5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer) ? $reports::where('service_type_id',5)->where('location_id', \Auth::user()->location_id)->latest()->first()->tithe_transfer: 0;



                            @endphp
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Sunday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($sMATT)  }}</td>
                            <td align="center">{{number_format($sFATT,0)   }}</td>
                            <td align="center">{{number_format($sCATT, 0)    }}</td>
                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($sMATT + $sFATT + $sCATT,0)}}
                            </td>
                                <!-- Sunday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($sNC,0)   }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($sFT,0)   }}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CASH</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">POS/Transfer</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CHEQUES</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">SUB TOTAL</td>
                            <td  style="font-size:  14px;text-align: center; text-transform: uppercase;  font-weight: bold;" colspan="2">SUM TOTAL</td>
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($tithecashS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;"> {{ number_format($titheposS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($thithechequeS, 0)}}</td>

                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #f4ece5; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($tithecashS + $titheposS + $thithechequeS, 0)}}
                            </td>

                            
                            <td colspan="2" rowspan="2" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashS + $offposS + $offchequeS + $tithecashS + $titheposS + $thithechequeS, 0)}}
                            </td>
                        </tr>
                         <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offcashS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offposS, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offchequeS, 0)}}</td>
                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashS + $offposS + $offchequeS, 0)}}
                            </td>
                            
                        </tr> -->
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Monday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($mMATT, 0)  }}</td>
                            <td align="center">{{number_format($mFATT, 0) }}</td>
                            <td align="center">{{number_format($mCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($mMATT + $mFATT + $mCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($mNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($mFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Tuesday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($tMATT + $toMATT, 0)  }}</td>
                            <td align="center">{{number_format($tFATT + $toFATT, 0) }}</td>
                            <td align="center">{{number_format($tCATT + $toCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($tMATT + $tFATT + $tCATT + $toMATT + $toFATT + $toCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($tNC + $toNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($tFT + $toFT,0) }}</td>
                        </tr>

                        <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Wednesday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($wMATT, 0)  }}</td>
                            <td align="center">{{number_format($wFATT, 0) }}</td>
                            <td align="center">{{number_format($wCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($wMATT + $wFATT + $wCATT,0)}}
                            </td>
                                <!-- Wednesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($wNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($wFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Thursday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($thMATT, 0)  }}</td>
                            <td align="center">{{number_format($thFATT, 0) }}</td>
                            <td align="center">{{number_format($thCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($thMATT + $thFATT + $thCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($thNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($thFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Friday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($friMATT, 0)  }}</td>
                            <td align="center">{{number_format($friFATT, 0) }}</td>
                            <td align="center">{{number_format($friCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($friMATT + $friFATT + $friCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($friNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($friFT,0) }}</td>
                        </tr>
                         <tr>
                            <td rowspan="1" style="text-transform: uppercase; font-weight: bold">Saturday</td>
                            <td style="text-transform: uppercase; font-weight: bold">ATTendance</td>
                            <td align="center">{{number_format($stMATT, 0)  }}</td>
                            <td align="center">{{number_format($stFATT, 0) }}</td>
                            <td align="center">{{number_format($stCATT, 0) }}</td>

                            <td align="center" style="background-color: #82b1ff; color: white; font-weight: bold;">
                                {{number_format($stMATT + $stFATT + $stCATT,0)}}
                            </td>
                                <!-- Tuesday Week Total -->
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($stNC,0) }}</td>
                            <td align="center" style="background-color: #e6ee9c;">{{number_format($stFT,0) }}</td>
                        </tr>
                        <!-- <tr>
                            <td></td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CASH</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">POS/Transfer</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">CHEQUES</td>
                            <td style="font-size:  14px; text-align: center; text-transform: uppercase; font-weight: bold;">SUB TOTAL</td>
                            <td  style="font-size:  14px;text-align: center; text-transform: uppercase;  font-weight: bold;" colspan="2">SUM TOTAL</td>
                        </tr>

                        <tr>
                            <td style="text-transform: uppercase; font-weight: bold">tithe</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($tithecashW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;"> {{ number_format($titheposW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($thithechequeW, 0)}}</td>

                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #f4ece5; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($tithecashW + $titheposW + $thithechequeW, 0)}}
                            </td>

                            
                            <td colspan="2" rowspan="2" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashW + $offposW + $offchequeW + $tithecashW + $titheposW + $thithechequeW, 0)}}
                            </td>
                        </tr>
                         <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offcashW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offposW, 0)}}</td>
                            <td colspan="" align="center" style="font-size:  14px; font-weight: bolder;">{{ number_format($offchequeW, 0)}}</td>
                            <td colspan="" rowspan="" align="center" style="color: white; background-color: #c8e6c9; font-size: 24px;font-weight: bolder;">
                                &#8358; {{number_format($offcashW + $offposW + $offchequeW, 0)}}
                            </td>
                        </tr> -->
                        <!--  <tr>
                            <td style="text-transform: uppercase; font-weight: bold">Offerings</td>
                            <td colspan="4" align="center" style="font-size: 18px;font-weight: bolder;">
                                {{ number_format($tithecashW , 0)}}
                            </td>
                        </tr> -->
                        <!-- End Wednesday Services -->
                    </tbody>
                </table>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <!-- Page Script  -->


<script type="text/javascript">
   function sumup() {
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
</script>

@endsection