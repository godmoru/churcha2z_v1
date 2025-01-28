
<div class="modal fade" id="modifyRecEx" tabindex="-1" role="dialog" aria-labelledby="{{$capex->id}}" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Edit Recurrent Expenditure</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('location.edit-income-report', 'do-update') }}">
					<input type="hidden" name="id" id="id">
      				{{method_field('patch')}}
					{{ csrf_field() }}
		          	<div class="row">
		          		<div class="col-md-12">
		          			<h5 class="text-uppercase text-center">Capital Expenditure for all month</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover" id="income">
                                <thead>

                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%" colspan="3" id="eTitle"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;">Month</th>
                                        
                                        <th style="text-align: center; text-transform: uppercase;">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >January</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="jan" id="jan" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                    
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >February</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="feb" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >March</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="mar" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >April</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="apr" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >May</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="may" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >June</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="jun" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >July</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="jul" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >August</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="aug" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >September</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="sep" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >October</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="oct" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >November</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="nov" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>
                                       <tr>
                                        <td align="center">
                                            <p class="text-bold months_text" >December</p>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm offerings" name="pos" id="dec" value="0" align="center" style="text-align: center; "/>
                                        </td>
                                      

                                    </tr>

                                 
                                </tbody>
                            </table>
		          		</div>

		          		<div class="col-md-12">
		          			<textarea class="form-control" name="reason" rows="2" required placeholder="Reason for this edit"></textarea>
		          		</div>
		          	</div>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update Data</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  function sumup() {
    $("#income").on('input', '.offerings', function () {
     var GTotal = 0;
     $("#income .offerings").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumOffering").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }
</script>
</form>