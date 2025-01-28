@extends('layouts.master')

@section('content')
<header class="white pt-3 relative shadow">

        <div class="container-fluid">
            <div class="row p-t-b-12 col-md-12 col-lg-12 ">
                <div class="col-lg-3 col-md-2">
                   <div class="row collapse col-md-12" id="editconvertcat">
                      @include('members.converts.modals.editconvertcat')
                  </div>
                  <div class="row collapse col-md-12" id="deleteconvertcat">
                      @include('members.converts.modals.delete')
                  </div>

                    <div class="pb-3">
                      <div class="card-body text-center">
                            <div class="image m-3">
                                <!-- <img class="user_avatar no-b no-p r-5" src="assets/img/dummy/u1.png" alt="User Image"> -->
                                <!-- <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 120px; width: 110px;" align="center"> -->
                            </div>

                            <div>
                                <h6 class="p-t-10">{{ $category->cat_name}}</h6>
                                {{ number_format(count($category->get_peopleincat), 0) }}
                                <hr>
                                <p align="justify">{{ $category->description }}</p>
                            </div>
                                  
                            <hr>
                            <!-- <a href="#" class="btn btn-success btn-sm mt-3">View Profile</a> <br> -->
                              <a data-toggle="collapse" data-target="#editconvertcat" class="btn btn-primary btn-xs"><i class="icon-user-plus"></i> Edit</a>
                              <a data-toggle="collapse" data-target="#deleteconvertcat" class="btn btn-danger btn-xs"><i class="icon-user-plus"></i> Delete</a>
                        </div>
                    </div>
                    <div class="card">
                    <!-- <div class="card-header white">
                        <strong> DHC WIDGET </strong>
                    </div> -->
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="icon icon-people text-blue"></i> General Summary:
                                <span class="float-right mt-2 font-weight-bold"> {{ number_format(count($category->get_peopleincat), 0) }}</span>
                            </li>
                            <li class="list-group-item">
                                <i class="icon icon-user text-yellow"></i>My Location Summary:
                                <span class="float-right mt-2 font-weight-bold"> {{ number_format(count($category->get_peopleincatLocation), 0) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                  </div>

                  <!-- <div style="border-left: 3px solid #42a5f5; height: absolute;"></div> -->
                  <div class="card b-0 col-lg-9 col-md-10" align="center" style="align-content: center;"> 

                      <div class="row">
                          <div class="col-sm-12 col-md-12">
                              <div class="card no-b">
                                  <div class="card-header bg-primary text-white text-uppercase">
                                      <h4>People in category </h4>
                                      <div class="row justify-content-end">
                                         <div class="col">
                                          <ul id="myTab4" role="tablist" class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                              @if(\Auth::user()->location_id ==1)
                                              <li class="nav-item">
                                                  <a class="nav-link active show" id="tab1" data-toggle="tab" href="#v-pills-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">General People in Category</a>
                                              </li>
                                              @else
                                              @endif
                                              <li class="nav-item">
                                                  <a class="nav-link" id="tab2" data-toggle="tab" href="#v-pills-tab2" role="tab" aria-controls="tab2" aria-selected="false"> People from my Location</a>
                                              </li>
                                              
                                          </ul>
                                      </div>
                                      </div>
                                  </div>
                                  <div class="card-body no-p">
                                      <div class="tab-content">
                                          <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                            <br><br>
                                            @if(count($category->get_peopleincat)>0)
                                              <div class="table-responsive">
                                                 <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                                  <thead>
                                                    <tr>
                                                        <th width="2%">S/No</th>
                                                        <th width="22%">Full Name</th>
                                                        <th width="20%">Location</th>
                                                        <th width="10%"> Phone No</th>
                                                        <th>SVC</th>
                                                        <th>Found. Class</th>
                                                        <th>DLTC</th>
                                                        <th> Status</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                                        <tr class="odd gradeX">
                                                        @foreach($category->get_peopleincat as $count => $convt)
                                                            <td>{{ ++$count }}</td>  
                                                            <td><a href="{{route('converts.one', \Crypt::encrypt($convt->id)) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
                                                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                                                            <td>{{ $convt->phone1 }}</td>
                                                            <td align="center">{{isset($convt->serviceT) ? $convt->serviceT->name : "Not Defined"}}</td>
                                                            <td align="center">
                                                                @if($convt->fclass_status  == 1)
                                                                Yes
                                                                @else
                                                                No
                                                                @endif
                                                            </td>
                                                            <td align="center">
                                                                @if($convt->dltc_status  == 1)
                                                                Yes
                                                                @else
                                                                No
                                                                @endif
                                                            </td>
                                                            <td align="center">
                                                                @if($convt->membership_decision  == 1)
                                                                Decided
                                                                @else
                                                                Not decided
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                              </table> 
                                              </div>
                                              @endif
                                          </div>
                                          <div class="tab-pane fade text-center p-5" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2">
                                              <br><br>
                                            @if(count($category->get_peopleincatLocation)>0)
                                              <div class="table-responsive">
                                                 <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                                                  <thead>
                                                    <tr>
                                                        <th width="2%">S/No</th>
                                                        <th width="22%">Full Name</th>
                                                        <th width="20%">Location</th>
                                                        <th width="10%"> Phone No</th>
                                                        <th>SVC</th>
                                                        <th>Found. Class</th>
                                                        <th>DLTC</th>
                                                        <th> Status</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                                        <tr class="odd gradeX">
                                                        @foreach($category->get_peopleincatLocation as $count => $convt)
                                                            <td>{{ ++$count }}</td>  
                                                            <td><a href="{{route('converts.one', \Crypt::encrypt($convt->id)) }}"> <b>{{ strtoupper($convt->fullnames) }}</b></a></td>
                                                            <td>{{ isset($convt->people_loc) ? $convt->people_loc->loc_name : " NA"}}</td>
                                                            <td>{{ $convt->phone1 }}</td>
                                                            <td align="center">{{isset($convt->serviceT) ? $convt->serviceT->name : "Not Defined"}}</td>
                                                            <td align="center">
                                                                @if($convt->fclass_status  == 1)
                                                                Yes
                                                                @else
                                                                No
                                                                @endif
                                                            </td>
                                                            <td align="center">
                                                                @if($convt->dltc_status  == 1)
                                                                Yes
                                                                @else
                                                                No
                                                                @endif
                                                            </td>
                                                            <td align="center">
                                                                @if($convt->membership_decision  == 1)
                                                                Decided
                                                                @else
                                                                Not decided
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                              </table> 
                                              </div>
                                              @endif
                                          </div>
                                          <div class="tab-pane fade text-center p-5" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3">
                                              <h4 class="card-title">Tab 3</h4>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional
                                                  content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                  <hr>
              </div>
    <br><br>
    </header>

    

    
 <!--   -->
@endsection
@section('scripts')

@endsection