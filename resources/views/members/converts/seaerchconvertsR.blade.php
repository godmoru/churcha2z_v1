
@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
    <div class="card ">
        
    <div class="col-md-12">
        <div class=" card b-0">
            <!-- <div class="card-header white"> -->
                <!-- <i class="icon-people 2x blue-text"></i> <strong class="text-uppercase"> Converts Registration Portal </strong>  -->
            <!-- </div> -->
            <div class="card-body">
                <h4 class="text-center text-uppercase"> Convert Search/Query Portal</h4> <hr><br>
        <form class="form-material" action="{{ route('converts.searched') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                 <div class="col-sm-1">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="datefrom" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" style="font-size: 14px;" />
                            <label class="form-label">Date From</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-1">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="dateto" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" style="font-size: 14px;" />
                            <label class="form-label">Date To</label>
                        </div>
                    </div>
                </div> 
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="fullname"  />
                            <label class="form-label"> Full Names</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" />
                            <label class="form-label">eMail Address</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <select class="custom-select select2" required name="svc" id="svc">
                        <option value="">Service</option>
                        <option value="9000">All Service</option>
                        @foreach($services as $svc)
                        <option value="{{$svc->id}}">{{$svc->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select select2" required name="converttype" id="converttype">
                        <option value="">Convert Type</option>
                        <option value="9000">All Categories</option>
                        @foreach($peoplecats as $cat)
                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-1">
                    <select class="custom-select select2" name="gender" id="gender">
                        <option value="">Gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="custom-select select2" name="mstatus" id="mstatus">
                        <option value="">Marital Status</option>
                        @foreach($mstatus as $mst)
                        <option value="{{$mst->id}}">{{$mst->name}}</option>
                        @endforeach
                    </select>
                </div>               
            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Search Database</button>
            </div>
        </form>
        <hr>
        	<div class="row" id="searchresult">
        		
        	</div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<!-- Page Script  -->

@endsection