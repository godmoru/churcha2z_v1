<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">New Workforce Department registration</h4> <hr><br>
        <form class="form-material" action="{{ route('workforce.depts.new') }}" method="POST">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" required />
                            <label class="form-label"> Department Name</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" required />
                            <label class="form-label"> Department e-Mail</label>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" required />
                            <label class="form-label"> Department Phone Number</label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="hod" required />
                            <label class="form-label"> Head of Department</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="hodphone" required />
                            <label class="form-label"> HOD Phone</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="hodmail" required />
                            <label class="form-label"> HOD eMail</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix"></div>
            <br>
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="3" name="description" ></textarea>
                            <label class="form-label">Description <small style="color: red;">Give a detailed description as possible</small></label>
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

