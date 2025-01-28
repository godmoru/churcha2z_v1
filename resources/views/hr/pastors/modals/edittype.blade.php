<div class="card my-3 col-md-12">
    <div class="card-body">
        <!-- <h4 class="text-uppercase text-center">Confirm Deletion  of {{ $pastor->surname.' '.$pastor->othernames }} Information</h4> <hr> -->
        <form class="form-material" action="{{ route('pastor.modifyResponsibility') }}" method="POST">
            <input type="hidden" name="pstid" value="{{$pastor->id}}">
            {{ csrf_field() }}
            <div class="row clearfix">
            	<div class="col-sm-12">
                    <div class="form-group form-float form-group-sm">
                        <div class="form-line">
                            <select class="select2" name="type_id[]" multiple required="" style="width: 100%;">
                                <option value="">Position/Capacity</option>
                                @foreach($psttype as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                	<p align="justify" >You are modifying <strong>{{$pastor->surname}}'s</strong> capacity/responsibility in the commission? This action is logged against your user account. Do you want to proceed with this operation? </p>
                </div>
            </div>
            <div class="col-sm-12" align="center">
                @role('sys-admin | administrator|snr-pastor')
                <button type="submit" class="btn btn-primary btn-sm mt-2"> Make Changes</button>
                @endrole
            </div>
        </form>
    </div>
</div>
<br>
<hr>


