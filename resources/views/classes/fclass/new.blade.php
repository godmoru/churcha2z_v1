    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4>New Class Batch</h4> <hr><br>
            <form class="form-material" action="{{ route('fclassbatch.new') }}" method="POST">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" class="form-control" name="batchname"  value="C-{{$cno}}"/>

                                <label class="form-label">Batch Name</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-12 col-md-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="startdate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter"  style="text-align: center;" />
                                <label class="form-label">Date Batch Starts</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-12 col-md-2">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <input type="text" name="enddate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter"  style="text-align: center;" />
                                <label class="form-label">Date Batch Ends</label>
                            </div>
                        </div>
                    </div>
                 <br><br>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="3" name="description"></textarea>
                                <label class="form-label">Description</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit</button>
                </div>
            </form>
        </div>
    </div>
<br>
<hr>