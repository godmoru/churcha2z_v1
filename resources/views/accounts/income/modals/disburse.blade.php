<div class="modal fade bt-white" id="disburse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Deposit</h4>
			</div>
			<div class="modal-body">
				<form role="form" method="POST" action="{{ route('disbursement.store') }}">
					{{ csrf_field() }}
					<div class="row">
						
						<div class="col-md-12">
							<div class="form-group">
								<label>
								Bank Name<span class="symbol required"></span>
								</label>
								<input type="text" class="form-control" name="bank_name" required/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
								Teller or Reference Number<span class="symbol required"></span>
								</label>
								<input type="text" class="form-control" name="teller_number" required/>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
								Name of Depositor<span class="symbol required"></span>
								</label>
								<input type="text" class="form-control" name="depositor_name" required />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>
								Date of Deposit<span class="symbol required"></span>
								</label>
								<input type="date" class="form-control" name="date_of_deposit" required />
							</div>
						</div>
                        <div class="col-md-12">
							<div class="form-group">
								<label>
								Type<span class="symbol required"></span>
								</label>
								<select class="custom-select select2" required name="type" id="month">
                                    <option value="branch">Branch</option>
                                    <option value="hq">Head Quarter</option>
                                </select>
							</div>
						</div>
                        <input type="hidden" class="form-control" id="month" name="month" required />
                        <input type="hidden" class="form-control" id="year" name="year" required />
                        <input type="hidden" class="form-control" id="branch_income" name="branch_income" required />
                        <input type="hidden" class="form-control" id="hq_income" name="hq_income" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-o" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</div>
</form>