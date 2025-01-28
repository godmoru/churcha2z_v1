
    <div class="card my-3 col-md-12">
        <div class="card-body">
            <h4 class="text-uppercase text-center">Service Attendance Status</h4> <hr>
        @include('locations.modals.newcountarea')
        @include('locations.modals.newservicetype')

           <!--  <form class="form-material" action="{{ route('location.submitAttendance') }}" method="POST">
                {{ csrf_field() }}
             
                <div class="row clearfix">
                        <div class="col-sm-12 col-md-2">
                            
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2"></div>
                        <div class="col-sm-12 col-md-1">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">Male</label>
                                    <input type="number" class="form-control" name="male" lang="en" required  id="male" onkeyup="calculateAttendance()" style="text-align: center;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-1">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <label class="form-label">Female</label>
                                    <input type="number" class="form-control" name="female" required  id="female" onkeyup="calculateAttendance()" style="text-align: center;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-1">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line text-center">
                                    <label class="form-label">Children</label>
                                    <input type="number" class="form-control" name="children" required id="children" onkeyup="calculateAttendance()" style="text-align: center;"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-12">:</div>
                        
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line text-center">
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total"  readonly id="total" disabled=""  align="center" style="text-align: center;" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
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
                                        @foreach($services as $svc)
                                        <option value="{{$svc->id}}">{{$svc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12 col-md-2">

                        </div>

                        <div class="col-sm-12 col-md-1">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line text-center">
                                    <label class="form-label">First Timers</label>
                                    <input type="number" class="form-control" name="first_timers" required id="first_timers" onkeyup="calculateAttendance()"  style="text-align: center;"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-1">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line text-center">
                                    <label class="form-label">New Converts</label>
                                    <input type="number" class="form-control" name="new_converts" required id="new_converts" onkeyup="calculateAttendance()" style="text-align: center;" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12":></div>
                        <div class="col-sm-12 col-md-2">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line text-center">
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total"  readonly id="cftotal" disabled=""  align="center"  style="text-align: center;"/>
                                </div>
                            </div>
                        </div>

                    </div>
                <br>
                <div class="row clearfix">
                    <div class="col-sm-12 col-md-5">
                        
                    </div>
                    <div class="col-sm-7">
                        <div class="form-group form-float form-group-sm">
                            <div class="form-line">
                                <textarea class="form-control" rows="2" name="attendance_note"></textarea>
                                <label class="form-label">Breifly describe the turn out of the service you are recording the attendance of.</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12" align="center">
                    <button type="submit" class="btn btn-primary btn-sm mt-2"> Submit Attendance</button>
                </div>
            </form> -->

        <form class="form-material" action="{{ route('location.submitAttendance') }}" method="POST">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="row clearfix">
                         <div class="col-sm-12 col-md-4">
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
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group form-float form-group-sm">
                                <div class="form-line">
                                    <select class="custom-select select2" required name="svc" id="svc">
                                        <option value="">Service</option>
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
                        </div>
                        <div class="col-md-2" align="center">
                            <a data-toggle="modal" data-target="#nServiceType" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-block btn-xs">Add New Service Category</a>
                            <a data-toggle="modal" data-target="#nCountArea" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary btn-block btn-xs">Add New Count Area</a>
                        </div>
                <br>
                    </div>
                </div>
                <div class="col-md-5">
                    <h5 class="text-uppercase text-center">Vehicle Attendance</h5>
                    {{ csrf_field() }}   
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center; text-transform: uppercase;" width="10%"> Car Park</th>
                                <th style="text-align: center; text-transform: uppercase;" width="40%">Coverage Area</th>
                                <th style="text-align: center; text-transform: uppercase;" width="9%">Total</th>
                                <!-- <th style="text-align: center; text-transform: uppercase;" width="15%">Sub Total</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Vcountareas as $varea)
                            <tr>
                                <input type="hidden" name="VcAreaId[]" value="{{$varea->id}}">
                                <td>{{$varea->name}}</td>
                                <td>{{$varea->description}}</td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm cartotal" name="total[]" id="cartotal" required align="center" style="text-align: center;" />
                                </td>
                                <!-- <td align="center"><label id="subTotal">4354</label></td> -->
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">G. Total</td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm cargrandtotal" name="" id="cargrandtotal" disabled align="center" style="text-align: center;" />
                                </td>
                            </tr>
                            <!-- <tr>
                                <td colspan="3  " align="center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit Attendance</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>

                 <div class="col-md-7">
                <h5 class="text-uppercase text-center">Human Attendance</h5>
                    <!-- <form class="form-material" action="{{ route('location.submitAttendance') }}" method="POST"> -->
                    <!-- {{ csrf_field() }}    -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center; text-transform: uppercase;" width="25%">Count Area</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Male</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Female</th>
                                <th style="text-align: center; text-transform: uppercase;" width="10%">Children</th>
                                <th style="text-align: center; text-transform: uppercase;" width="15%">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($countareas as $carea)
                                <td>{{$carea->name}}</td>
                                <input type="hidden" name="cAreaId[]" value="{{$carea->id}}">

                                <td align="center">
                                    <input type="number" class="form-control form-control-sm male" name="male[]" id="" required align="center" onkeyup="calculateSum()" style="text-align: center; " />
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm form-float female" name="female[]" id="" required align="center" onkeyup="calculateSum()" style="text-align: center; " />
                                </td>
                                <td align="center">
                                    <input type="number" class="form-control form-control-sm children" name="children[]" id="" required align="center" onkeyup="calculateSum()" style="text-align: center; " />
                                </td>
                                <!-- <td align="center"><label id="subTotal"></label></td> -->
                                    
                                <td>
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" class="form-control total" name="total"  readonly id="total" disabled=""  align="center"  style="text-align: center; font-weight: bolder; font-size: 14px;"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="1">Grand Total</td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" class="form-control totalmale" name="totalmale"  readonly id="totalmale" disabled=""  align="center"  style="text-align: center;"/>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" class="form-control totalfemale" name="totalfemale"  readonly id="totalfemale" disabled=""  align="center"  style="text-align: center;"/>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" class="form-control totalchildren" name="totalchildren"  readonly id="totalchildren" disabled=""  align="center"  style="text-align: center;"/>
                                        </div>
                                    </div>
                                </td>
                                <td align="center">
                                    <div class="form-group form-float form-group-sm">
                                        <div class="form-line">
                                            <input type="text" class="form-control grandtotal" name="grandtotal"  readonly id="grandtotal" disabled=""  align="center"  style="text-align: center;"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5" align="center">
                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Submit Attendance</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
           <!-- <button type="submit">SUbmit</button> -->
            </form>
        </div>
    </div>
<br>