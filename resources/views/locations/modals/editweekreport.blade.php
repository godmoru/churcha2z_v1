<div class="modal fade" id="editWeeklyReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-uppercase" id="myModalLabel">Edit Weekly Report Record</h4>
			</div>
			<div class="modal-body">
				<form  class="form-material" role="form" method="POST" action="{{ route('locations.edit-weekly-reports', 'do-update') }}">
					<input type="hidden" name="id" id="id">
      				{{method_field('patch')}}
					{{ csrf_field() }}
					<div class="row ">
		               <div class="col-sm-12 col-md-3">
                          <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="svctype" id="svctype">
                                        <option value="">Service Type</option>
                                        @foreach($serviceTypes as $svcT)
                                        <option value="{{$svcT->id}}">{{$svcT->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="svc" id="svc">
                                        <option value="">Service</option>
                                        <option value="999999">All Services</option>
                                        @foreach($services as $svc)
                                        <option value="{{$svc->id}}">{{$svc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <input type="text" name="serviceDate" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="ccenter" />
                                    <label class="form-label">Service Date</label>
                                </div>
                            </div>
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="week" id="week">
                                        <option value="">Week Under Review</option>
                                        <option value="1">Week 1</option>
                                        <option value="2">Week 2</option>
                                        <option value="3">Week 3</option>
                                        <option value="4">Week 4</option>
                                        <option value="5">Week 5</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3" align="">
                          <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="preacher" id="preacher">
                                        <option value="">Preacher</option>
                                        @foreach($pastors as $pst)
                                        <option value="{{$pst->id}}">{{$pst->surname.' '.$pst->othernames}}</option>
                                        @endforeach
                                        <option value="909090909">Others - Specify</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md" id="preacher_other">
                              <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                  <input type="text" name="preacher_other_name" class="form-control" placeholder="Preacher Name" align="ccenter" />
                                  <input type="text" name="preacher_other_ministry" class="form-control" placeholder="Preacher Ministry" align="ccenter" />
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4" align="">
                          <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                  <input type="text" id="msgtitle" name="messagetitle" required class="form-control" placeholder="Message Title here" align="ccenter" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 form-group">
                        <h5 class="text-uppercase text-center">Attendance</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Male</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Female</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Children</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add male" name="male" id="male" value="0" align="center" onkeyup="sumup();" onchange="sumup()" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add female" name="female" id="female" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm add children" name="children" id="children" value="0" align="center" onchange="sumup()" style="text-align: center; " />
                                        </td> 
                                        <td align="center">
                                          <b style="text-align: center; font-size: "><span id="grandT"></span></b>
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-5 form-group">

                        	<h5 class="text-uppercase text-center">New Converts/First Timers</h5>
                            <table class="table table-bordered table-hover table-responsive" id="humanCount">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">New Converts</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%">First Timers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm newconverts" name="newconverts" id="newconverts" value="0" align="center" style="text-align: center; " />
                                        </td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm firsttimers" name="firsttimers" id="firsttimers" value="0" align="center" style="text-align: center; " />
                                        </td>                                  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
		            </div>
		          	<div class="row">
		          		<div class="col-md-12">
		          			<h5 class="text-uppercase text-center">Offerings/Tithes</h5>
                            {{ csrf_field() }}   
                            <table class="table table-bordered table-hover" id="income">
                                <thead>

                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%" colspan="3">Offerings</th>
                                        <th style="text-align: center; text-transform: uppercase;" width="5%" colspan="3">Tithes</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; text-transform: uppercase;">CASH</th>
                                        <th style="text-align: center; text-transform: uppercase;">POS</th>
                                        <th style="text-align: center; text-transform: uppercase;">TRANSFER</th>
                                        <th style="text-align: center; text-transform: uppercase;">CASH</th>
                                        <th style="text-align: center; text-transform: uppercase;">POS</th>
                                        <th style="text-align: center; text-transform: uppercase;">TRANSFER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm offerings" name="offering_cash" id="offering_cash" value="0" align="center" style="text-align: center; " onchange="sumOffering()" />
                                        </td>
                                        <td><input type="number" class="form-control form-control-sm offerings" name="offering_pos" id="offering_pos" value="0" align="center" style="text-align: center; " onchange="sumOffering()" /></td>
                                        <td><input type="number" class="form-control form-control-sm offerings" name="offering_transfer" id="offering_transfer" value="0" align="center" style="text-align: center; " onchange="sumOffering()" /></td>
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm tithes" name="tithes_cash" id="tithes_cash" value="0" align="center" style="text-align: center; " onchange="sumTithe()" />
                                        </td> <td align="center">
                                            <input type="number" class="form-control form-control-sm tithes" name="tithes_pos" id="tithes_pos" value="0" align="center" style="text-align: center; " onchange="sumTithe()" />
                                        </td> 
                                        <td align="center">
                                            <input type="number" class="form-control form-control-sm tithes" name="tithes_transfer" id="tithes_transfer" value="0" align="center" style="text-align: center; " onchange="sumTithe()" />
                                        </td>                                  
                                    </tr>

                                    <tr>
                                        <td style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 18px;" width="5%" colspan="3">  <span id="sumOffering"></span></td>
                                        <td style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 18px;" width="5%" colspan="3"> <span id="sumTithe"></span></td>
                                    </tr>
                                </tbody>
                            </table>
		          		</div>

		          		<div class="col-md-12">
		          			<textarea class="form-control" name="reason" rows="2" placeholder="Reason for this edit"></textarea>
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

  function sumOffering() {
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

  function sumTithe() {
    $("#income").on('input', '.tithes', function () {
     var GTotal = 0;
     $("#income .tithes").each(function () {
         var total = $(this).val();
         if ($.isNumeric(total)) {
            GTotal += parseFloat(total);
            }   
          });
            $("#sumTithe").text(GTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      });
  }
</script>
</form>