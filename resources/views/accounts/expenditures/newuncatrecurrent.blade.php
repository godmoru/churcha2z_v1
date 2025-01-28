<div class="modal fade bt-white" id="newuncatexp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel" style="font-weight: bold;">Recurrent Expenditure (Uncategorized)</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('expenditure.submit.uncategorised') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">Report Date</label>
                                    <input type="text" name="report_date" id="report_date" required class="date-time-picker form-control form-control-sm report_date" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            <button type="button" name="add2" id="add2" class="btn btn-success btn-xs btn-block">Click here to add line item.</button>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="expUncat2" data-options='{ "paging": false; "searching":false}'>
                                  <thead>
                                    <tr>
                                        <th width="45%" style="text-align: center; text-transform: uppercase;">Expenditure Heading</th>
                                        <th width="24%" style="text-align: center; text-transform: uppercase;">Total</th>
                                        <th width="10%" align="right">
                                        </th>
                                        </tr>
                                    </thead>
                                     <tbody>
                                            <tr class="odd gradeX"> 
                                                <input type="hidden" name="expenditure_type_id[]" value="999999000">
                                                <input type="hidden" name="location_id[]" value="{{\Auth::user()->location_id}}">
                                                <input type="hidden" name="submitted_by[]" value="{{\Auth::user()->id}}">
                                                <input type="hidden" name="status[]" value="1">
                                            </tr>
                                        
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="">Grand Total </td>
                                            <td colspan="2" style="text-align: center;  font-weight: bold; font-size: 16px;">
                                                <div class="form-group form-float form-group-sm text-bolder h4">
                                                        <b> &#8358; <span id="Utotal2"></span></b>
                                                    </div>
                                            </td>

                                        </tr>
                                    </tfoot>
                              </table>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-o btn-xs">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    
   
</script>

