@extends('layouts.master')

@section('content')

    <hr><br>
    <div class="col-md-12">
    
        <div class=" card b-0">
            <div class="card-header white">
                <i class="icon-home 2x blue-text"></i> <strong class="text-uppercase"> Converts Daily Summary </strong> 
                <div class="pull-right" align="right">
                    <a href="{{route('converts.print') }}" class="btn btn-success btn-xs"> <i class="icon-download"></i> Download Record</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
                  <thead>
                    <tr>
                        <th width="2%" rowspan="2"  style="text-align: center; text-transform: uppercase;">Month</th>
                        <th width="10%" rowspan="3" style="text-align: center; text-transform: uppercase;">Category</th>
                        <th width="22%" colspan="7" style="text-align: center; text-transform: uppercase;"> <strong>Week 1 </strong> </th>
                        <th width="20%" colspan="7" style="text-align: center; text-transform: uppercase;"> <strong>Week 2 </strong> </th>
                        <th width="20%" colspan="7" style="text-align: center; text-transform: uppercase;"> <strong>Week 3 </strong> </th>
                        <th width="20%" colspan="7" style="text-align: center; text-transform: uppercase;"> <strong>Week 4 </strong> </th>
                        <th width="7%" rowspan="2" style="text-align: center; text-transform: uppercase;"> <strong>Total </strong> </th>
                        </tr>
                        <tr>
                            <!-- Week 1 Summary -->
                            <th> <strong>S</strong></th>
                            <th> <strong>M</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>W</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>F</strong></th>
                            <th> <strong>S</strong></th>

                            <!-- Week 2 Summary -->
                            <th> <strong>S</strong></th>
                            <th> <strong>M</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>W</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>F</strong></th>
                            <th> <strong>S</strong></th>
                            
                            <!-- Week 3 Summary -->
                            <th> <strong>S</strong></th>
                            <th> <strong>M</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>W</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>F</strong></th>
                            <th> <strong>S</strong></th>
                            
                            <!-- Week 4 Summary -->
                            <th> <strong>S</strong></th>
                            <th> <strong>M</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>W</strong></th>
                            <th> <strong>T</strong></th>
                            <th> <strong>F</strong></th>
                            <th> <strong>S</strong></th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr class="odd gradeX">
                            <td rowspan="3">Jan., 2019</td>
                            <td style="font-size: 11px;">Daily Evang.</td>
                            
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-05')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-07')->get())}}</td>
                            
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-12')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-14')->get())}}</td>
                            
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-19')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-20')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-21')->get())}}</td>
                            
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-26')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-01-27')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-21-28')->get())}}</td>
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',6)->where('service_date', 'like', '%' . '2019-01' . '%')->get()),0)}}</strong></td>
                        </tr>
                        <tr class="odd gradeX">

                            <td style="font-size: 11px;">New Conv.</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2018-12-30')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2018-12-31')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-05')->get())}}</td>
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-07')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-12')->get())}}</td>
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{ count(\App\People::where('people_category_id',1)->where('service_date', '=', '2019-01-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-14')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-19')->get())}}</td>
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-20')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-21')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-01-26')->get())}}</td>
                            
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',1)->where('service_date', 'like', '%' . '2019-01' . '%')->get()),0)}}</strong></td>
                        </tr>
                        <tr class="odd gradeX">

                            <td style="font-size: 11px;">First Timers</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-12-')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-12-31')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-01-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-05')->get())}}</td>
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-07')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-12')->get())}}</td>
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-14')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-19')->get())}}</td>
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = number_format(count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-20')->get()), 0)}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-21')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-01-26')->get())}}</td>
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',2)->where('service_date', 'like', '%' . '2019-01' . '%')->get()),0)}}</strong></td>
                        </tr>
                        <!--February, 2019-->
                        <tr class="odd gradeX">
                            <td rowspan="3">Feb., 2019</td>
                            <td style="font-size: 11px;">Daily Evang.</td>
                            
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-05')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-07')->get())}}</td>
                            
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-12')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-14')->get())}}</td>
                            
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-19')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-20')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-21')->get())}}</td>
                            
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-02-26')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-21-27')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',6)->where('service_date', '2019-21-28')->get())}}</td>
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',6)->where('service_date', 'like', '%' . '2019-02' . '%')->get()),0)}}</strong></td>
                        </tr>
                        <tr class="odd gradeX">

                            <td style="font-size: 11px;">New Conv.</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2018-12-30')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2018-12-31')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-05')->get())}}</td>
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-07')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-12')->get())}}</td>
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '=', '2019-02-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-14')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-19')->get())}}</td>
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-20')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-21')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',1)->where('service_date', '2019-02-26')->get())}}</td>
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',1)->where('service_date', 'like', '%' . '2019-02' . '%')->get()),0)}}</strong></td>
                        </tr>
                        <tr class="odd gradeX">

                            <td style="font-size: 11px;">First Timers</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-12-')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-12-31')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-01')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-02')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2018-02-03')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-04')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-05')->get())}}</td>
                            <div class="divider"></div><!--WK2-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-06')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-07')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-08')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-09')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-10')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-11')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-12')->get())}}</td>
                            <div class="divider"></div><!--WK 3-->
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-13')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-14')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-15')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-16')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-17')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-18')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-19')->get())}}</td>
                            <div class="divider"></div> <!--WK 4-->
                            <td style="font-size: 10px;">{{$fm = number_format(count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-20')->get()), 0)}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-21')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-22')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-23')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-24')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-25')->get())}}</td>
                            <td style="font-size: 10px;">{{$fm = count(\App\People::where('people_category_id',2)->where('service_date', '2019-02-26')->get())}}</td>
                            <div class="divider"></div>
                            <td align="center" style="font-size: 11px;"><strong>{{$fm = number_format(count(\App\People::where('people_category_id',2)->where('service_date', 'like', '%' . '2019-02' . '%')->get()),0)}}</strong></td>
                        </tr>
                        
                    </tbody>
              </table>                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
   
</script>

@endsection