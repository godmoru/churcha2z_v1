@extends('layouts.master')
@section('content')
<div class="row row-eq-height my-3 mt-3">
    <div class="col-md-12">
        <div class="card-group pt-2 pb-3" >
            
            <div class="card blue lighten-2 border-primary col-md-4" align="center" >
                <div class="p-5 text-white" style="height: 180px;">
                    <h5 class="font-weight-normal s-36 text-uppercase"><b>Income statement</b></h5>
                    <span class="bolder font-weight-heavy text-primary" style="font-size: 20px;">&#8358; {{ number_format((
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('cash') + 
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('pos') + 
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('cheques') - \App\LocationExpenditure::where('year', \Carbon\Carbon::now('Y'))->sum('amount')
                        ),2) }}</span>
                </div><br/>
                 <b style="color: white; font-size: 12px;">*************************************************************************************</b> 
                <div class="row text-white p-2 s-18 text-center">
                    <div class="col-6 b-r text-uppercase"> 
                        Income <br>
                        <div>&#8358; {{ number_format((
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('cash') + 
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('pos') + 
                        \App\IncomeReport::where('year', \Carbon\Carbon::now('Y'))->sum('cheques')  
                        ),2) }}</div>
                    </div>
                    <div class="col-6 text-uppercase"> 
                        Expenditures <br>
                        <div>&#8358; {{ number_format((
                        \App\LocationExpenditure::where('year', \Carbon\Carbon::now('Y'))->sum('amount')  
                        ),2) }}</div>
                    </div>
                </div>

            </div>
            <div class="card col-md-7">
                <div class="card-header bg-white text-uppercase">
                    <strong> Location Income Submission</strong> 
                    <!--<span class="float-right"> <a href="{{route('dhc.districts', \Crypt::encrypt(4235) ) }}" class="btn btn-outline-primary btn-xs">View All Income</a></span>-->
                </div>
                <div class="card-body bg-white slimScroll" data-height="229" style="overflow: hidden; width: auto; height: 100px;">
                    <div class="table-responsive">
                        <table class="table bg-white ">
                            <!-- Table heading -->
                            <thead>
                                <tr class="no-b">
                                    <th>#</th>
                                    <th style="text-transform: uppercase;">Location</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Monthly</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Yearly</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Total Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach(\App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get() as $count => $loc)
                                    <td>{{ ++$count }}</td>  
                                    <td><a href="{{route('converts.one', \Crypt::encrypt($loc->id)) }}"> <b>{{ strtoupper($loc->loc_name) }}</b></a></td>
                                    <td align="center">{{ number_format((
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->where('month', date('m'))->sum('cash') + 
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->where('month', date('m'))->sum('pos') + 
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->where('month', date('m'))->sum('cheques')  
                                        ),2) }}</td>
                                    <td align="center">{{ number_format((
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->sum('cash') + 
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->sum('pos') + 
                                        \App\IncomeReport::where('year', date('Y'))->where('location_id', $loc->id)->sum('cheques')  
                                        ),2) }} </td>
                                    <td align="center">{{ number_format((
                                        \App\IncomeReport::where('status', 1)->where('location_id', $loc->id)->sum('cash') + 
                                        \App\IncomeReport::where('status', 1)->where('location_id', $loc->id)->sum('pos') + 
                                        \App\IncomeReport::where('status', 1)->where('location_id', $loc->id)->sum('cheques')  
                                        ),2) }} </td>
                                </tr>
                                    @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card col-md-2">
                <div class="card-header white text-uppercase">
                        <strong> Monthly Income Progress</strong>
                    </div>
                <div class="card-body">
                   <div class="my-3">
                        <small>0.00% - North East</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{798988 }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>100.00% - North Central</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>0.00% - North West</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>0.00% - South East</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>0.00% - South South</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: 57%;" aria-valuenow="57" aria-valuemin="0" aria-valuemax="57"></div>
                        </div>
                    </div>
                    <div class="my-3">
                        <small>0.00% - South West</small>
                        <div class="progress" style="height: 3px;">
                            <div class="progress-bar" role="progressbar" style="width: 57%;" aria-valuenow="57" aria-valuemin="0" aria-valuemax="57"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>
    </div>
    
    <div class="col-md-12">
        <div class=" card b-0">
            <div class="card-body p-5 slimScroll" data-height="700">
                <h5 class="text-uppercase">Location Expenditures as at {{ date('jS M, Y')}} 
                    <!--<span class="float-right"> <a href="{{route('expenditure.locations.yearly', \Crypt::encrypt(4236))}}" class="btn btn-outline-primary btn-xs">View All Expenditures</a></span><br>-->
                </h5>

                <div class="table-responsive">
                        <table class="table bg-white ">
                            <!-- Table heading -->
                            <thead>
                                <tr class="no-b">
                                    <th>#</th>
                                    <th style="text-transform: uppercase;">Location</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Monthly</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Yearly</th>
                                    <th style="text-transform: uppercase; text-align: center;"> Total Expenditure</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach(\App\Location::where('id', '!=', '')->orderBy('id_state', 'asc', 'loc_name', 'asc')->get() as $count => $loc)
                                    <td>{{ ++$count }}</td>  
                                    <td><a href="{{route('converts.one', \Crypt::encrypt($loc->id)) }}"> <b>{{ strtoupper($loc->loc_name) }}</b></a></td>
                                    <td align="center">{{ number_format((\App\LocationExpenditure::where('year', date('Y'))->where('month', date('m'))->where('location_id', $loc->id)->sum('amount')) ,2) }}</td>
                                    <td align="center">{{ number_format((\App\LocationExpenditure::where('year', date('Y'))->where('location_id', $loc->id)->sum('amount')) ,2) }}</td>
                                    <td align="center">{{ number_format((\App\LocationExpenditure::where('status', 1)->where('location_id', $loc->id)->sum('amount')) ,2) }}</td>
                                </tr>
                                    @endforeach
                            
                            </tbody>
                        </table>
                    </div>

                <!--<a href="" class="btn btn-primary darken-3 btn-sm btn-block">View More Expenditure Chart</a>-->
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
 <script type="text/javascript">

</script>

@endsection
