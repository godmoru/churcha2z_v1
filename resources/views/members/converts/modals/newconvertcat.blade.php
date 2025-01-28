<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New People Category form</h4> <hr><br>
        <form class="form-material" action="{{ route('peoplecategories.new') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="catname" required />
                            <label class="form-label"> Category Names</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="shortname" />
                            <label class="form-label">Short Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="3" name="resaddress" required></textarea>
                            <label class="form-label">Description <small style="color: red;">Give a detailed description as possible</small></label>
                        </div>
                    </div>
                </div>
            <br>
            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
            </div>
        </form>
    </div>
</div>
<br>