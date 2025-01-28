<div class="card my-3 col-md-12">
    <div class="card-body">
        <h4 class="text-center text-uppercase">Edit People Category </h4> <hr><br>
        <form class="form-material" action="{{ route('peoplecategories.editone') }}" method="POST">
            <input type="hidden" name="catId" value="{{ $category->id}}">
            {{ csrf_field() }}
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="catname" required  value="{{ $category->cat_name}}" />
                            <label class="form-label"> Category Names</label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <input type="text" class="form-control" name="shortname" value="{{ $category->short_name}}"  />
                            <label class="form-label">Short Name</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <textarea class="form-control" rows="3" name="description" required>{{ $category->description}}</textarea>
                            <label class="form-label">Description:</label>
                        </div>
                    </div>
                </div>
            <br>
            </div>

            <div class="col-sm-12" align="center">
                <button type="submit" class="btn btn-primary btn-sm mt-2">Update Info</button>
            </div>
        </form>
    </div>
</div>
<br>