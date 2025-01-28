<div class="modal fade" id="modifyIReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Edit Income Report</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('location.edit-income-report', 'do-update') }}">
					<input type="hidden" name="id" id="id">
      				{{method_field('patch')}}
					{{ csrf_field() }}
		          	<div class="row">
		          		<div class="col-md-12">
		          			<h5 class="text-uppercase text-center">Offerings/Tithes</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover" id="income">
                                <thead>

                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%" colspan="3">Offerings</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;">CASH</th>
                                        <th style="text-align: center; text-transform: uppercase;">POS/TRansfer</th>
                                        <th style="text-align: center; text-transform: uppercase;">Cheques</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm offerings" name="cash" id="cash" value="0" align="center" style="text-align: center; " onchange="sumup()" />
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm offerings" name="pos" id="pos" value="0" align="center" style="text-align: center; " onchange="sumup()" />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm offerings" name="cheques" id="cheques" value="0" align="center" style="text-align: center; " onchange="sumup()" />
                                        </td> 

                                    </tr>

                                    <tr>
                                        <td style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 18px;" width="5%" colspan="3">  <span id="sumOffering"></span></td>
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