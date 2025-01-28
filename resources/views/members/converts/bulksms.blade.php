@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-people_outline 2x blue-text"></i> <strong class="text-uppercase"> Converts Contacts Index </strong> 
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <form role="form" method="POST" action="{{ route('converts.grabcontacts') }}">
                            {{ csrf_field() }}
                            <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                Converts Since:<span class="symbol required"></span>
                                            </label>
                                            <input type="text" name="datefrom" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                Converts To:<span class="symbol required"></span>
                                            </label>
                                            <input type="text" name="dateto" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>
                                                Converts Category:<span class="symbol required"></span>
                                            </label>
                                            <select class="custom-select select2" required name="converttype" id="converttype">
                                                <option value="">Convert Category</option>
                                                <option value="9999">All Categories</option>
                                                @foreach($peoplecats as $cat)
                                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <button class="btn btn-primary btn-block">Grab Contacts</button>
                        </form>
                    </div>
                    <div class="col-md-6" align="left">
                        <textarea class="form-control" rows="7" id="grabbedcontacts" name="grabbedcontacts" placeholder="Grabbed contacts appears here" >
                            @foreach($converts as $convt)
                            {{ $convt->phone1.','. $convt->phone2.',' }}
                            @endforeach
                        </textarea>
                    </div>
                </div>
                <hr>
                <div class="row clearfix">
                        
                        <!-- <div class="col-md-"></div> -->
                        <div class="col-sm-2">


                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">1st Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($firststsvcconverts as $fscv)
                                        {{ $fscv->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">2nd Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($secstsvcconverts as $secscv)
                                        {{ $secscv->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">3rd Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($thirdstsvcconverts as $thirdscv)
                                        {{ $thirdscv->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">4th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($fouthsvcconverts as $forthsvc)
                                        {{ $forthsvc->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">5th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($fifthsvcconverts as $fifthsvc)
                                        {{ $fifthsvc->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">6th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($sixthsvcconverts as $sixsvc)
                                        {{ $sixsvc->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-sm-12" align="center">
                        <!-- <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Member</button> -->
                    </div>
                </form>   

                <br><br>
            <div class="card-header white">
                <i class="icon-people_outline 2x blue-text"></i> <strong class="text-uppercase"> First Timers </strong> 
            </div>  <br>
            <div class="row clearfix">
                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">1st Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($fttmrs as $fttmr)
                                        {{ $fttmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">2nd Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($sectmrs as $sectmr)
                                        {{ $sectmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">3rd Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($thirdtmrs as $thirdtmr)
                                        {{ $thirdtmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">4th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($forthtmrs as $forthtmr)
                                        {{ $forthtmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">5th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($fifttmrs as $fifttmr)
                                        {{ $fifttmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">6th Svc {{ date('jS M, Y') }}  <small style="color: red;"></small></label>
                                    <textarea class="form-control" rows="10" name="mresaddress" >
                                        @foreach($sixtmrs as $sixtmr)
                                        {{ $sixtmr->phone1 }},
                                        @endforeach
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <!-- <p>Congrat! This decision to surrender your life to Christ marks a new begining in your life. Pls locate a Home Church near U & enrol in foundation Class. Bless U</p>
                        <p>Thank you for your presence in Church today. We are sure God ministered to you. We hope to see more of you. God bless you richly in Jesus Name.</p> -->


                    </div>     
            </div>
        </div>
    </div>

    <!-- <div class="col-md-2">

        <div class="card white p-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="card r-3 bg-info text-white">
               <div class="p-4">
                   <div class="float-right"><span class="icon-people s-48"></span>
                   </div>
                   <div class="counter-title ">New Convert </div>
                   <h5 class="sc-counter mt-3">{{ number_format(count($newconverts), 0) }}</h5>
               </div>
           </div>
       </div>
       <hr>
       <div class="col-lg-12 col-sm-12">
           <div class="white card bg-lime text-white">
               <div class="p-4">
                   <div class="float-right"><span class="icon-people s-48"></span>
                   </div>
                   <div class="counter-title">First Timers</div>
                   <h5 class="sc-counter mt-3">{{ number_format(count($firsttimers), 0) }}</h5>
               </div>
           </div>
       </div>
        </div>
    </div> -->

</div>
@endsection
@section('scripts')

@endsection