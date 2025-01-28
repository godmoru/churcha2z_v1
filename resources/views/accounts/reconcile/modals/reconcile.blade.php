<div class="modal fade bt-white" id="reconcile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase" id="myModalLabel">Account Reconciliation/Budget Disbursement</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('accounts.do-reconcile') }}">
                    <input type="hidden" name="locationId" value="{{$location->id}}">
                    <input type="hidden" name="lastBalancer" id="lastBalancer">
                    <input type="hidden" name="tither" id="tither">
                    <input type="hidden" name="differencer" id="differencer">
                    <input type="hidden" name="kpr" id="kpr">
                    <input type="hidden" name="salariesr" id="salariesr">
                    <input type="hidden" name="missionr" id="missionr">
                    <input type="hidden" name="reservesr" id="reservesr">
                    <input type="hidden" name="recurrentr" id="recurrentr">
                    <input type="hidden" name="housingr" id="housingr">
                    <input type="hidden" name="locPr" id="locPr">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row clearfix ">
                                <div class="col-md-7"></div>

                                <div class="col-sm-2 col-md-5 text-right">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                        <label>Desired Date infomation of  account reconciliation</label>
                                            <input type="text" name="dateinfo" required class="date-time-picker form-control" data-options='{"timepicker":false, "format":"Y-m-d"}' value="{{date('Y-m-d')}}" align="center" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Last Month Total:<span class="symbol required"></span></label>
                                            <input style="font-size: 32px;" type="text" class="form-control text-center" name="lastBalance" id="lastBalance" readonly value="&#8358; {{number_format(\App\IncomeReport::where('location_id', $location->id)->where('month', date('m')-1)->sum('cash') + \App\IncomeReport::where('location_id', $location->id)->where('month', date('m')-1)->sum('pos') + \App\IncomeReport::where('location_id', $location->id)->where('month', date('m')-1)->sum('cheques'),2)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Cash in Bank:<span class="symbol required"></span></label>
                                            <input style="font-size: 22px;" type="number" pattern="[0-9]" class="form-control text-center btotal" id="btotal" name="btotal">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Difference:<span class="symbol required"></span></label>
                                            <input style="font-size: 22px;" type="text" readonly="" class="form-control text-center difference" id="difference" name="difference">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Tithe Amount (10%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center tithe" name="tithe" id="tithe" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Kingdom Practice (2%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center kp" name="kp" id="kp" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Salaries (16%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center salaries" name="salaries" id="salaries" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Mission (10%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center mission" name="mission" id="mission" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Reserves (5%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center reserves" name="reserves" id="reserves" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Recurrent (30%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center recurrent" name="recurrent" id="recurrent" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Housing (7%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center housing" name="housing" id="housing" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Location Projects (20%):<span class="symbol required"></span></label>
                                            <input type="text" class="form-control text-center locP" name="locP" id="locP" readonly>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <legend class="text-uppercase"> Other Disbursements</legend>
                            <hr>
                            <div class="row clearfix">
                                    <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Travel Allowance:<span class="symbol required"></span></label>
                                            <input type="number" pattern="[0-9]" class="form-control text-center travel" value="0" name="travel" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Packing Allowance:<span class="symbol required"></span></label>
                                            <input type="number" pattern="[0-9]" class="form-control text-center packing" value="0" name="packing" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Marriage Support:<span class="symbol required"></span></label>
                                            <input type="number" pattern="[0-9]" class="form-control text-center msupport" value="0" name="msupport" >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Bereavement Support:<span class="symbol required"></span></label>
                                            <input type="number" pattern="[0-9]" class="form-control text-center bereavement" value="0" name="bereavement">
                                        </div>
                                    </div>
                                </div>
                            </div>
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