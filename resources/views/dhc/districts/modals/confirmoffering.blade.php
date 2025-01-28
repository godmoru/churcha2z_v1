<div class="modal fade bt-white" id="ConfirmOffering" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase text-center" id="myModalLabel">Confirm Offering</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('converts.get_by_criterias') }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12" align="ccenter">
							<h5 class="text-center text-uppercase">Amount Submitted</h5>
							<h3 class="my-3 text-center" style="font-size: 2.9em; font-weight: bold;">N25,000</h3> <hr>
						</div>
						<div class="col-md-4" align="center">
							<div class="form-group">
								<label>
									Amount Tendered:<span class="symbol required"></span>
								</label>
                                <input type="text" name="amounttendered" required class="form-control" align="ccenter" />
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label>
									Transaction Note:<span class="symbol required"></span>
								</label>
								<textarea class="form-control" rows="2" name="transNote"></textarea>
							</div>
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Confirm Offering</button>
				</div>
			</div>
		</div>
	</div>
</form>