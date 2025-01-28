@extends('layouts.master')

@section('content')
<div class="row my-3 col-md-12">
    <div class="col-md-12">
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-people_outline 2x blue-text"></i> <strong class="text-uppercase"> Converts Contacts Grabbed </strong> 
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
              
                    <div class="col-sm-12" align="center">
                        <!-- <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Member</button> -->
                    </div>
                </form>   

                <br><br>   
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection