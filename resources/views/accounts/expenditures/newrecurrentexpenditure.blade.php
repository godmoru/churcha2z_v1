<div class="modal fade bt-white" id="newexp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel" style="font-weight: bold;">New Recurrent Expenditure</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('expenditure.submit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">Report Date</label>
                                    <input type="text" name="report_date" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p>Please note that the date information selected is the date used for the report.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="Tamount" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="1%" style="text-align: center; text-transform: uppercase;">S/No</th>
                        <th width="45%" style="text-align: center; text-transform: uppercase;">Type Name</th>
                        <th width="28%" style="text-align: center; text-transform: uppercase;">Total</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach($expTypes as $count => $type)
                            <tr class="odd gradeX">
                                <td>{{ ++$count }}</td>  
                                <input type="hidden" name="typeId[]" value="{{$type->id}}">
                                <input type="hidden" name="cap_id[]" value="{{$type->category['id']}}">
                                <td><a href="#"> <b>{{ $type->name }}</b></a></td>
                                <td><input type="number" class="form-control form-control-sm amount" name="amount[]" id="amount" value="0" align="center" style="text-align: center; " onchange="sumup();" onkeyup="sumup();" tabindex="{{++$count}}"/></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">Grand Total </td>
                            <td style="text-align: center;  font-weight: bold; font-size: 16px;">
                                <div class="form-group form-float form-group-sm text-bolder h4">
                                        <b> &#8358; <span id="Atotal"></span></b>
                                    </div>
                            </td>

                        </tr>
                    </tbody>
              </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-o">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    
</script>

