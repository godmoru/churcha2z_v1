<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New Convert & Others foundation class registration form</h4> <hr><br>
        <form class="form-material" action="{{ route('converts.new') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="fullnames" id="fullnames" required />
                            <input type="hidden" class="form-control" name="pid" id="pid" required />
                            <label class="form-label"> Full Names</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" id="phone" required onkeyup="FindPerson();" />
                            <label class="form-label">Phone No 1</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" name="dob" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                            <label class="form-label">Date Class Started</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select select2" required name="converttype" id="converttype">
                        <option value="">Convert Type</option>
                        @foreach($peoplecats as $cat)
                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                </div>  

                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary btn-xs mt-2"> Add To Class 1</button>
                </div> 

            <br>

            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit</button>
            </div>
        </form>
    </div>
</div>
<br>