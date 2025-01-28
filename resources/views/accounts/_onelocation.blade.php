@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-2">
                    <div class="pb-3">
                        <div class="image mr-3  float-left">
                            <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
                        </div>
                        <div>
                            <h6 class="p-t-10"><i class="icon-people"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->surname.' '.$location->get_loc_pst->othernames : " Not set"}}</h6>
                            <i class="icon-envelope"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->email : " Not set"}}<br> 
                            <?php $pastortype = json_decode($location->get_loc_pst->pastor_type_id);?>
                              @foreach($pastortype as $ptype)
                              <i class="icon-cubes"></i>   {{App\PastorType::find($ptype)->name}}<br>
                              @endforeach
                            <i class="icon-phone"></i> {{ isset($location->get_loc_pst) ? $location->get_loc_pst->phone1.', '.$location->get_loc_pst->phone2 : " Not set"}} <br>
                              <!-- <a data-toggle="modal" data-target="#cpastor" class="btn btn-warning btn-xs"><i class="icon-user-times"></i> Min.</a>
                              <a data-toggle="modal" data-target="#updatePinfo" class="btn btn-primary btn-xs"><i class="icon-clipboard-edit"></i> Min. Info</a>
                              <a data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-danger btn-xs"><i class="icon-user-plus"></i> Convert</a>
                              <a data-toggle="collapse" data-target="#addmember" aria-expanded="false" aria-controls="collapseExample" class="btn btn-success btn-xs"><i class="icon-user-plus"></i> Member</a> -->
                              <br>
                          </div>
                        </div>
                    </div>
                    <div class="col-lg-10">  
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="p-3 blue1 text-white">
                                <h5 class="font-weight-normal s-14">Month Income</h5>
                                <span class="s-48 font-weight-lighter text-primary bolder">&#8358; {{
                                    number_format(( 
                                    \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('cheques')), 2) 
                                }}</span>
                                <div>  Growth %
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_upward"></i> {{number_format(4.1, 2)}} %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                            <div class="p-3 blue lighten-3 text-white">
                                <h5 class="font-weight-normal text-white s-14">Month Expenditure</h5>
                                <span class="s-48 font-weight-lighter text-white bolder"> &#8358; {{ number_format(\App\LocationExpenditure::where('year', date('Y'))->where('month', date('m'))->where('location_id', $location->id)->sum('amount'), 2) }}</span>
                                <div> Saved (%)
                                    <span class="text-primary">
                                        <i class="icon icon-arrow_upward"></i> {{number_format(5.17, 2)}} %</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 white">
                                <h5 class="font-weight-normal s-14">Yearly Summary <small>Income - Expenditure</small></h5>
                                <span class="s-48 font-weight-lighter text-success bolder"> &#8358; {{ number_format(
                                  \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->sum('cheques') - \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->sum('amount'), 2) }}</span>
                                <div> Growth % 
                                    <span class="text-success">
                                        <i class="icon icon-arrow_upward"></i> {{number_format(24.3, 2)}} %</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <hr>
          <div class="w">
              <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                 @role('resident-pastor|administrator|location_admin|snr-pastor|hq-accountant|auditor')
                  <li>
                      <a class="nav-link active" id="v-pills-home1-tab" data-toggle="pill" href="#v-pills-home1" role="tab" aria-controls="v-pills-home1" aria-selected="false"><i class="icon icon-home2"></i> Home <small>Monthly Report</small></a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-years-tab" data-toggle="pill" href="#v-pills-years" role="tab" aria-controls="v-pills-years" aria-selected="false"><i class="icon icon-credit-card"></i> Year Income</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-income-history-tab" data-toggle="pill" href="#v-pills-income-history" role="tab" aria-controls="v-pills-income-history" aria-selected="false"><i class="icon icon-credit-card"></i> Income History</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-capex-tab" data-toggle="pill" href="#v-pills-capex" role="tab" aria-controls="v-pills-capex" aria-selected="false"><i class="icon icon-money"></i> Capital Expenditures History</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-recurrentexp-tab" data-toggle="pill" href="#v-pills-recurrentexp" role="tab" aria-controls="v-pills-recurrentexp" aria-selected="false"><i class="icon icon-calendar"></i> Recurrent Expenditures History</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-expsummary-tab" data-toggle="pill" href="#v-pills-expsummary" role="tab" aria-controls="v-pills-expsummary" aria-selected="false"><i class="icon icon-chart"></i> Expenditures Summary</a>
                  </li>
                  @endrole
              </ul>
          </div>
        </div>
    </header>
    
  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
       <div class="tab-content" id="v-pills-tabContent">
          @role('resident-pastor|administrator|location_admin|snr-pastor|acount-officer|auditor|hq-accountant')
           <div class="tab-pane fade show active" id="v-pills-home1" role="tabpanel" aria-labelledby="v-pills-home1-tab">
              <div class="row"> 
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="newconvert">

                  </div>
                  <div class="p-t-b-12 container-fluid collapse col-md-12" id="addmember">
                    <!-- include('members.newmember') -->
                  </div>
                   <div class="col-md-3">
                       <div class="card ">
                           <ul class="list-group list-group-flush">
                               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone</strong> <span class="float-right s-12">{{$location->phone1}}</span></li>
                               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email</strong> <span class="float-right s-12">{{$location->loc_email}}</span></li>
                               <li class="list-group-item"><i class="icon icon-account_balance text-primary"></i><strong class="s-12">Address</strong> <span class="float-right s-12">{{$location->loc_add}}</span></li>
                           </ul>
                       </div>
                       <br>
                         <div class="card">
                          <!-- <div class="card-header white">
                              <strong> Global Rating </strong>
                                  <span class=" float-right"><a href="#" style="font-size: 11px; font-style: italic; text-underline-position: all;">View Rating</a></span>
                          </div> -->
                          <div class="card-body pt-0">
                              <div class="my-3">
                                  <small>{{number_format(count($location->loc_members), 0)}} Members</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-success" role="progressbar" style="width: {{number_format(342536, 2)}}%;" aria-valuenow="{{number_format(536, 2)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>6% Financial Health</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-warning" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                              <div class="my-3">
                                  <small>7% Home Churches</small>
                                  <div class="progress" style="height: 3px;">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                   </div>
                   <div class="col-md-9">
                    
                      <div class="row">
                          <div class="col-md-8">
                               <div class="card">
                                   <div class="card-header white">
                                       <h6>Monthly Income <small>for {{date('F, Y')}} </small></h6>
                                   </div>
                                   <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                                      <thead>
                                          <tr>
                                              <td  colspan="2" rowspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;">
                                                  <br> Days/Transaction Time
                                              </td>
                                              <td colspan="4" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Income summary"}}</td>
                                          </tr>
                                          <tr>
                                              <th width="15%" style="text-align: center; text-transform: uppercase;">Cash &nbsp;</th>
                                              <th width="15%" style="text-align: center; text-transform: uppercase;">POS/Transfer &nbsp;</th>
                                              <th width="15%" style="text-align: center; text-transform: uppercase;">Cheques &nbsp;</th>
                                              <!-- <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td> -->
                                          </tr>
                                          <tr>

                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach($reports as $count => $iRep)
                                          <tr>
                                              <td width="3%">{{++$count}}</td>
                                              <td width="10%" style="text-transform: uppercase; font-weight: bold;">{{date_format($iRep->created_at, "jS F, Y" .' - ' ."h:m:s A")}}</td>
                                              <td align="right">{{number_format($iRep->cash, 2)}}
                                              <td align="right">{{number_format($iRep->pos, 2)}}
                                              <td align="right">{{number_format($iRep->cheques, 2)}}
                                              <!-- <td align="right">{{number_format(($iRep->cash + $iRep->pos + $iRep->cheques), 2)}} -->
                                              </td>
                                          </tr>
                                          @endforeach

                                          <tr>
                                              <td colspan="2" style="text-transform: uppercase; font-weight: bold;">{{date('F, Y')}}</td>
                                              <td  width="15%" align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cash'), 2) }}</td>
                                              <td width="15%"  align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('pos'), 2) }}</td>
                                              <td width="15%"  align="right"> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cheques'), 2) }}</td>
                                          </tr>
                                      </tbody>
                                  </table>
                                   </div>
                               </div>
                           </div>

                           <div class="col-md-4">
                               <!-- <div class="card">
                                   <div class="card-header white">
                                       <h6>Income Analysis <small>Breakdown</small></h6>
                                   </div>
                                   <div class="card-body">

                                   </div>
                               </div> -->
                               <div class="card blue lighten-2 border-primary " align="center" >
                            <div class="p-5 text-white" style="height: 180px;">
                                <h5 class="font-weight-normal s-24 text-uppercase">Month Summary</h5><br>
                                <span class="s-36 bolder font-weight-heavy text-primary"> &#8358; {{ number_format((\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cash') + \App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('pos') + \App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cheques')), 0) }}</span>
                            </div>
                             <b style="color: white; font-size: 12px;">********************************************************************</b> 
                            <div class="row text-white p-2 s-18 text-center">
                                <div class="col-4 b-r text-uppercase"> 
                                    CASH <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cash'), 0) }}</div>
                                </div>
                                <div class="col-4 b-r text-uppercase"> 
                                    pos/online <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('pos'), 0) }}</div>
                                </div>
                                <div class="col-4 text-uppercase"> 
                                    cheques <br>
                                    <div> &#8358; {{ number_format(\App\IncomeReport::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('cheques'), 0) }}</div>
                                </div>
                            </div>
                        </div>
                           </div>
                        <hr>
                      </div>
                  </div>
               </div>
           </div>
           @endrole
           <div class="tab-pane fade" id="v-pills-years" role="tabpanel" aria-labelledby="v-pills-years-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                    <thead>
                        <tr>
                            <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                {{$location->loc_name ."'s " . date('Y') .'Income History'}}
                            </th>
                        </tr>
                        <tr>
                            <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                <br>Branch Name
                            </td>
                            <td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
                            <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand </td>

                        </tr>

                        <tr>
                            <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Jan &nbsp; </th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Feb &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Mar &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Apr &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">May &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Jun &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Jul &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Aug &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Sept &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Oct &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Nov &nbsp;</th>
                            <th width="8%" style="text-align: center; text-transform: uppercase;">Dec &nbsp;</th>
                            <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                        </tr>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($iRSource as $irSource)
                        <tr>
                            <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$irSource->name}}</td>
                            <td align="right">
                              {{
                                            number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 1)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 1)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 1)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2)

                                        }}
                                    </td>
                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 2)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 2)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 2)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                        }}
                                    </td>
                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 3)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 3)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 3)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                        }}
                                    </td>

                                    <td align="right">{{
                                            number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 4)->where('location_id', $location->id )->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 4)->where('location_id', $location->id )->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 4)->where('location_id', $location->id )->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                        }}
                                    </td>

                                   <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 5)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 5)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 5)->where('location_id', $location->id )->where('income_report_source_id', $irSource->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 6)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 6)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 6)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 7)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 7)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 7)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 8)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 8)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 8)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 9)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 9)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 9)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 10)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 10)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 10)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 11)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 11)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 11)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('month', 12)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('month', 12)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('month', 12)->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                    <td align="right">
                                    {{
                                        number_format(( \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cash') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('pos') + \App\IncomeReport::where('year', date('Y'))->where('location_id', $location->id)->where('income_report_source_id', $irSource->id)->sum('cheques')), 2) 
                                    }}
                                    </td>

                                  </tr>
                                  
                                  @endforeach

                              </tbody>
                          </table>
                        </div>
                       </div>
                   </div>
               </div>
           </div>
            <div class="tab-pane fade" id="v-pills-income-history" role="tabpanel" aria-labelledby="v-pills-income-history-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                            <thead>
                                <tr>
                                    <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                        <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                        {{$location->loc_name ."'s " . date('Y') .'Income History'}}
                                    </th>
                                </tr>
                                <tr>
                                    <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                        <br>Transaction date & Time
                                    </td>
                                    <td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"All time income"}}</td>
                                </tr>

                                <tr>

                                    <th width="8%" style="text-align: center; text-transform: uppercase;">Cash &nbsp; </th>
                                    <th width="8%" style="text-align: center; text-transform: uppercase;">POS/Transfer &nbsp;</th>
                                    <th width="8%" style="text-align: center; text-transform: uppercase;">Cheques &nbsp;</th>
                                    <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                                    <th width="18%" style="text-align: center; text-transform: uppercase;">Submitted By &nbsp;</th>
                                    <th width="12%" style="text-align: center; text-transform: uppercase;">Options &nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports->where('location_id', $location->id)->orderBy('created_at', 'desc')->get() as $report)
                                <tr>
                                  <td style="font-size: 15px;">{{date_format($report->created_at, "jS F, Y" .' - ' ."h:m:s A")}}</td>
                                  <td style="@if($report->isEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif"  align="right">{{number_format($report->cash, 0)}}</td>
                                  <td style="@if($report->isEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif"  align="right">{{number_format($report->pos, 0)}}</td>
                                  <td style="@if($report->isEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif"  align="right">{{number_format($report->cheques, 0)}}</td>
                                  <td style="@if($report->isEdited->count() > 0 ) background-color: #F4ECE5;" @else @endif"  align="right">{{number_format(($report->cash + $report->pos + $report->cheques), 0)}}</td>
                                  <td>{{$report->submittedBy->first_name .' '.$report->submittedBy->last_name}}</td>
                                  <td align="center">
                                        @role('administrator|auditor|hq-accountant')
                                        <a data-cash="{{$report->cash}}" data-pos="{{$report->pos}}" data-cheques="{{$report->cheques}}" data-id="{{$report->id}}" data-toggle="modal" data-target="#modifyIReport" class="btn btn-xs btn-warning orange accent-1"> Modify</a>
                                        <a data-id="{{$report->id}}" data-toggle="modal" data-target="#deleteiReport" class="btn btn-xs btn-danger danger accent-1"> Delete</a>
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
           </div>
           <div class="tab-pane fade" id="v-pills-capex" role="tabpanel" aria-labelledby="v-pills-capex-tab">
               <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                              <thead>
                                  <tr>
                                      <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                          <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                          {{$location->loc_name .' capital expenditure for '. date('Y')}}
                                      </th>
                                  </tr>
                                  <tr>
                                      <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                          <br>Branch Name
                                      </td>
                                      <td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
                                      <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand Summary</td>

                                  </tr>

                                  <tr>
                                      <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jan &nbsp; </th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Feb &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Mar &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Apr &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">May &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jun &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jul &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Aug &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Sept &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Oct &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Nov &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Dec &nbsp;</th>
                                      <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                                  </tr>
                                  <tr>

                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($capexp as $capex)
                                  <tr>
                                      <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$capex->name}}</td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 1)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>

                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 2)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 3)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 4)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 5)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 6)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 7)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 8)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 9)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 10)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 11)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 12)->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount') ), 2) }}
                                      </td>
                                              

                                      <td align="right">
                                      {{
                                          number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->where('expenditure_type_id', $capex->id)->sum('amount')), 2) 
                                      }}
                                      </td>

                                  </tr>
                                  
                                  @endforeach

                              </tbody>
                          </table>
                        </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-recurrentexp" role="tabpanel" aria-labelledby="v-pills-recurrentexp-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                         <div class="card-body">
                           <table id="example2" class="table table-bordered table-hover" data-options='{ "paging": false; "searching":false}'>
                              <thead>
                                  <tr>
                                      <th colspan="16" width="20%" style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 16px;" >
                                          <img src="{{asset('img/dunamis.png')}}" style="width: 110px; height: 90px"><br>
                                          {{$location->loc_name .' recurrent expenditure for '. date('Y')}}
                                      </th>
                                  </tr>
                                  <tr>
                                      <td  colspan="" rowspan="2" style="text-align: left; text-transform: uppercase; font-weight: bold;">
                                          <br>Branch Name
                                      </td>
                                      <td colspan="12" style="text-align: left; text-transform: uppercase; font-weight: bold; text-align: center;">{{"Months"}}</td>
                                      <td colspan="2" style="text-align: center; text-transform: uppercase; font-weight: bold;"> Grand Summary</td>

                                  </tr>

                                  <tr>
                                      <!-- <td style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="2"></td> -->
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jan &nbsp; </th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Feb &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Mar &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Apr &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">May &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jun &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Jul &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Aug &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Sept &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Oct &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Nov &nbsp;</th>
                                      <th width="8%" style="text-align: center; text-transform: uppercase;">Dec &nbsp;</th>
                                      <td width="15%" style="text-align: center; text-transform: uppercase; font-weight: bold;" rowspan="2" colspan="">Grand Total</td>
                                  </tr>
                                  <tr>

                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($recexp as $recex)
                                  <tr>
                                      <td width="15%" rowspan="" style="text-transform: uppercase; font-weight: bold">{{$recex->name}}</td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 1)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ), 2) }}
                                      </td>

                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 2)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 3)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 4)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 5)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 6)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 7)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 8)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 9)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 10)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 11)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                      <td align="right">
                                          {{ number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('month', 12)->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount') ),2) }}
                                      </td>
                                              

                                      <td align="right">
                                      {{
                                          number_format(( \App\LocationExpenditure::where('year', date('Y'))->where('location_id', $location->id)->where('expenditure_type_id', $recex->id)->sum('amount')), 2) 
                                      }}
                                      </td>

                                  </tr>
                                  
                                  @endforeach

                              </tbody>
                          </table>
                         </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-expsummary" role="tabpanel" aria-labelledby="v-pills-expsummary-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row clearfix">
                            <div class="col-md-6">
                               <div class="card blue lighten-2 border-primary " align="center" >
                                <div class="p-5 text-white" style="height: 180px;">
                                    <h5 class="font-weight-normal s-24 text-uppercase">Month Summary</h5><br>
                                    <span class="s-36 bolder font-weight-heavy text-primary"> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->sum('amount')), 2) }}</span>
                                </div>
                                 <b style="color: white; font-size: 12px;">*******************************************************************************************************************</b> 
                                <div class="row text-white p-2 s-18 text-center">
                                    <div class="col-6 b-r text-uppercase"> 
                                        Capital <br>
                                        <div> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->where('expenditure_type_id', 1)->sum('amount')), 2) }}</div>
                                    </div>
                                    
                                    <div class="col-6 text-uppercase"> 
                                        Recurrent <br>
                                        <div> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('month', date("m"))->where('location_id', $location->id)->where('expenditure_type_id', 2)->sum('amount')), 2) }}</div>
                                    </div>
                                </div>
                            </div>
                           </div>


                           <div class="col-md-6">
                               <div class="card success lighten-2 border-success " align="center" >
                                <div class="p-5 text-white" style="height: 180px;">
                                    <h5 class="font-weight-normal s-24 text-uppercase">Year Summary</h5><br>
                                    <span class="s-36 bolder font-weight-heavy text-primary"> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('location_id', $location->id)->sum('amount')), 2) }}</span>
                                </div>
                                 <b style="color: white; font-size: 12px;">*******************************************************************************************************************</b> 
                                <div class="row text-white p-2 s-18 text-center">
                                    <div class="col-6 b-r text-uppercase"> 
                                        Capital <br>
                                        <div> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('location_id', $location->id)->where('expenditure_type_id', 1)->sum('amount')), 2) }}</div>
                                    </div>
                                    
                                    <div class="col-6 text-uppercase"> 
                                        Recurrent <br>
                                        <div> &#8358; {{ number_format((\App\LocationExpenditure::where('year', date("Y"))->where('location_id', $location->id)->where('expenditure_type_id', 2)->sum('amount')), 2) }}</div>
                                    </div>
                                </div>
                            </div>
                           </div>
                          </div>
                        </div>
                       </div>
                   </div>
               </div>
               <hr>
               <div class="row clearfix">
                 
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel" aria-labelledby="v-pills-attendance-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        
                       </div>
                   </div>
               </div>
           </div>

           <div class="tab-pane fade" id="v-pills-update-location" role="tabpanel" aria-labelledby="v-pills-update-location-tab">
            <div class="card my-3 col-md-12">
                <div class="card-body">
                   
                </div>
            </div>
        <br>
           </div>
       </div>
   </div>
</div>
@include('locations.modals.editallincomereports')
@include('locations.modals.deleteIncomeReport')
@endsection
@section('scripts')
<!-- Page Script  -->
 <?php
    $states = \App\State::all(); 
    $lgas = \App\Lga::all();            
?>
<script hidden="">
  var states = <?= json_encode($states); ?>;
  var lgas = <?= json_encode($lgas); ?>;
</script>

<script type="text/javascript">     
  //<!-- State & Lgas -->
   $("select[name=state]").on('change',function(){
      var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
          var options = '<option value=""> LGA of Origin</option>';
          for(var i in lgas){
              if($(this).val() == lgas[i].state_id){
                  options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
              }
         }
         select+=options+'</select>';
         $("select[name=lga]").replaceWith(select);
      });

   $('#modifyIReport').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var cash = button.data('cash') 
      var pos = button.data('pos') 
      var cheques = button.data('cheques')  
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #cash').val(cash);
      modal.find('.modal-body #pos').val(pos);
      modal.find('.modal-body #cheques').val(cheques);
      modal.find('.modal-body #id').val(id);
});

   $('#deleteiReport').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 
      var id = button.data('id') 
      var modal = $(this)

      modal.find('.modal-body #id').val(id);
});


</script>
@endsection