<div class="modal fade bt-white" id="editAttRecordx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Edit Attendance Record</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.att-data.doupdatex', 'doupdate') }}">
      				{{method_field('patch')}}
					{{ csrf_field() }}
					<div class="row ">
		               
		                <div class="col-sm-12 col-md-12">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <div class="row" id="humanCount">
	      								<input type="hidden" class="id" name="id" id="id" value="">
	      								<input type="hidden" class="datefrom" name="datefrom" id="datefrom" value="{{$datefrom}}">
				            			<div class="col-md-4" align="center">
				            				<label style="font-size: 18px;">Male</label>
				                    		<input style=" text-align: center; font-size: 14px;" type="number" class="form-control form-control-sm add male" name="male" id="male" value="0" align="center" onchange="sumup()" onkeyup="sumup()" value="" />
				            			</div>

				            			<div class="col-md-4" align="center">
				            				<label style="font-size: 18px;">Female</label>
				                    		<input style=" text-align: center; font-size: 14px;" type="number" class="form-control form-control-sm add female" name="female" id="female" value="0" align="center" onchange="sumup()" onkeyup="sumup()" />
				            			</div>

				            			<div class="col-md-4" align="center">
				            				<label style="font-size: 18px;">Children</label>
				                    		<input style=" text-align: center; font-size: 14px;" type="number" class="form-control form-control-sm add children" name="children" id="children" value="0" align="center" onchange="sumup()" onkeyup="sumup()" />
				            			</div>
				            		</div>
				            			<br /><br />
				            			<div class="col-md-12" align="center" >
				            				<label style="font-size: 18px;">Total:</label><br>
                                        	<b style="font-size: 18px;"><span id="grandT"></span></b>
				            			</div>
                                </div>
                            </div>
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
      $("#humanCount").on('input', '.add', function () {
       var GTotal = 0;
       $("#humanCount .add ").each(function () {
           var total = $(this).val();
           if ($.isNumeric(total)) {
              GTotal += parseFloat(total);
              }   

            });
              $("#grandT").text(GTotal.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });
    }
</script>
</form>