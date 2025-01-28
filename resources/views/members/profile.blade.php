@extends('layouts.master')

@section('content')
<div class="row"> 

   <div class="col-md-3">
   	<div class="card col-md-12">
         	<div class="row " align="center">
	          <div class="col-md-5" align="center">
	          	<br>
	           <center>{!!DNS2D::getBarcodeHTML('Full Names: '.$member->sname.' '.$member->othernames .', '.' Phone: '.$member->phone1.', '.' DOB: '.\Carbon\Carbon::parse($member->dob)->format("jS F, Y").', '.' Dept: '.$member->getDept->dept_name.',  '.' Seek Code: '.$member->seek_code.', Home Cell: '.$member->gethomecell ? $member->gethomecell->homecell_name : "None".', Home Cell Code: '.$member->gethomecell ? $member->gethomecell->seek_code : "None".','.' Home Cell District: '.$member->gethomecell ? $member->gethomecell->district->dis_name : "None", "QRCODE", 4,4);!!} &nbsp;&nbsp;&nbsp; {{$member->seek_code}}</center>
	           <br>
	          </div>
	          &nbsp;
	          &nbsp;
	          &nbsp;
	          <div class="col-md-6" align="center">
	          	<br>
	          <a data-toggle="modal" data-target="#editDept" class="btn btn-primary btn-xs btn-block"> Edit Info</a>
	          @role('administrator|resident-pastor')
	          <a data-toggle="modal" data-target="#transferMember" class="btn btn-success btn-xs btn-block"> Tranfer to other Dept.</a>
	          @endrole
	          <a data-toggle="collapse" data-target="#deleteC" class="btn btn-warning btn-xs btn-block"> Disciplinary Action</a> 
	          <!--<a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> -->
	          <button data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-secondary btn-xs btn-block"> Print Data Card</button> 
	          <br />
	        </div>
	        <br>
	    </div>
      </div>
      <hr>
       <div class="card ">
        <div class="image mr-3  float-center">
          <br>
          <center>
            <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
          </center>
        </div>
        <br>
           <ul class="list-group list-group-flush">
               <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Full Names:</strong> <span class="float-right s-12">{{ $member->sname.' '.$member->othernames }}</span></li>
               <li class="list-group-item"><i class="icon icon-phone text-primary"></i><strong class="s-12">Phone:</strong> <span class="float-right s-12">{{ $member->phone1 .', '.$member->phone2}}</span></li>
               <li class="list-group-item"><i class="icon icon-envelope text-primary"></i><strong class="s-12">Email:</strong> <span class="float-right s-12">{{ $member->email }}</span></li>
               <li class="list-group-item"><i class="icon icon-people text-primary"></i><strong class="s-12">Department:</strong> <span class="float-right s-12">{{$member->getdept->dept_name}}</span></li>

           </ul>
       </div>
       <hr />
         <div class="card">
          <div class="card-header white">
              <strong> {{ $member->othernames }}'s Rating </strong>
                  <span class=" float-right"><a href="#" style="font-size: 11px; font-style: italic; text-underline-position: all;">View Rating</a></span>
          </div>
          <div class="card-body pt-0">
              <div class="my-3">
                  <small>5% Department Activities</small>
                  <div class="progress" style="height: 3px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 5%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
              <div class="my-3">
                  <small>2% Home Church Participation</small>
                  <div class="progress" style="height: 3px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 2%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
              <div class="my-3">
                  <small>20% General Atteandance</small>
                  <div class="progress" style="height: 3px;">
                      <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
          </div>
      </div>
      <br>
   </div>
   <div class="col-md-9">  
      	<div class="row">
          	<div class="col-md-12">

          		<div class="card no-b">
                    <div class="card-header blue lighten-3 text-white">
                        <h4>{{ $member->sname.' '.$member->othernames }} <small>- {{ $member->seek_code }} </small> Profile</h4>
                        <div class="row justify-content-end">
                           <div class="col">
                            <ul id="myTab4" role="tablist" class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="tab1" data-toggle="tab" href="#v-pills-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">General Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#v-pills-tab2" role="tab" aria-controls="tab2" aria-selected="false">Attendance History</a>
                                </li>
                                <li class="nav-item">
                                    <!--<a class="nav-link" id="tab3" data-toggle="tab" href="#v-pills-tab3" role="tab" aria-controls="tab3" aria-selected="false">Giving History</a>-->
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#v-pills-tab3" role="tab" aria-controls="tab3" aria-selected="false">DHC History</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab4" data-toggle="tab" href="#v-pills-tab4" role="tab" aria-controls="v-pills-tab4" aria-selected="false">Workforce History</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#v-pills-tab3" role="tab" aria-controls="tab3" aria-selected="false">Disciplinary History</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#v-pills-tab3" role="tab" aria-controls="tab3" aria-selected="false">Settings</a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="card-body no-p">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                <div class="card-group pt-3 pb-3">
						            <div class="card col-md-6">
						                <div class="card-body">
						                    <h5 class="card-title">Personnal Details</h5>
						                    <p class="card-text">This is a wider card my-3 with supporting text below as a natural lead-in to
						                        additional content. This content
						                        is a little bit longer.</p>
						                    <p class="card-text">
						                        <small class="text-muted">Last updated 3 mins ago</small>
						                    </p>

						                    <hr>
						                    <div class="row">
						                    	@php
							                     $dob = new DateTime($member->dob);
							                    @endphp
							                    <div class="col-md-5">Date of Birth: <strong>{{ $dob->format('jS F, Y')}}</strong></div>

							                    
							                    @if (\Carbon\Carbon::parse($member->dob)->isBirthday())
							                    <div class="col-md-7 text-white blue lighten-3 blink text-center"> &nbsp;
							                    	<strong>
										                <i class="icon icon-birthday-cake"></i> Happy Birthday!!! Celebrate @if($member->gender ==1) him @else her @endif today!
							                    	</strong>
							                    </div>

							                    @else
							                    <div class="col-md-7"> &nbsp;
							                    	<strong>
										                Today is not @if($member->gender ==1) his @else her @endif Birthday
							                    	</strong>
							                    </div>

							                    @endif
						                    </div>
						                    <hr>
						                    <div class="row">
							                    <div class="col-md-5">Marrital Status: <strong>{{ $member->getMmaritalStatus ? $member->getMmaritalStatus->name : "Nil"}}</strong></div>
							                    @if($member->marital_status_id == 2 )
							                    @php
							                     $mAnniv = new DateTime($member->m_anniversary);
							                    @endphp
							                    <div class="col-md-7">Marriage Anniversary: <strong>{{ $mAnniv->format('jS F, Y') }}</strong></div>
							                    @endif
						                    </div>

						                    <hr>
						                    <div class="row">
							                    <div class="col-md-6">State of Origin: <strong>{{ $member->get_mState ? $member->get_mState->state : "Nil"}}</strong></div>
							                    <div class="col-md-6">LGA of Origin: <strong>{{ $member->get_mLGA ? $member->get_mLGA->lga_name : "Nil"}}</strong></div>
						                    </div>
						                    <hr>
						                    <h5 class="card-title">Residential Address</h5>
						                    <p class="card-text">{{ $member->res_address }} </p>
						                </div>
						            </div>
						            <div class="card col-md-3">
						                <div class=""><br>
						                    <h5 class="card-title">Qualification(s) Information</h5>
						                    <div class="p-0">
							                    <div class="text-justify">
							                        <h6 class="p-t-10">
							                        	@foreach($member->getQualInfo as $quals)
						                    				{{ $quals->getQualName->qualification_name }}<br>
						                    				{{ $quals->field->fos_name }}<br>
						                    				{{ $quals->getCourse->sub_fos_name }}
							                        	@endforeach
							                        </h6>
							                    </div>
							                </div>
							                <br>
							                <h5 class="card-title">Employment Information</h5>
						                    <div class="p-0">
							                    <div class="text-justify">
							                        <h6 class="p-t-10">
						                    		Status:		@if(isset($member->getEmploymentInfo))
						                    					@if($member->getEmploymentInfo->employment_status == 1)
								                    				{{ "Unemployed" }}<br>
						                    					@elseif($member->getEmploymentInfo->employment_status == 5)
								                    				{{ "Retiree" }}<br>
						                    					@else
						                    							@if($member->getEmploymentInfo->employment_status == 2)
								                    						{{ "Student" }}<br>
						                    							@elseif($member->getEmploymentInfo->employment_status == 3)
								                    						{{ "Self Employeed" }}<br>
						                    							@elseif($member->getEmploymentInfo->employment_status == 4)
								                    						{{ "Employed" }}<br>
						                    							@else

						                    							@endif
								                    			Office:	{{ $member->getEmploymentInfo->office_business_name }}<br>
								                    			Office Address:	{{ $member->getEmploymentInfo->office_business_address }}
								                    			@endif
								                    		@else
								                    		Nil
								                    		@endif
						                    				<br>
							                        </h6>
							                    </div>
							                </div>


							                <hr>
						                    <div class="row">
							                    <div class="col-md-6" style="font-size: 12px;">DUSOM: 
							                    	<strong>
							                    	@if($member->dusom_status == 1)
							                    	Yes
							                    	@else
							                    	No
							                    	@endif
							                    	</strong>
							                	</div>
							                    <div class="col-md-6" style="font-size: 12px;"> 
							                    	<strong>
							                    		@if($member->dusom_status == 1)
								                    	@php
									                     $dusomwhen = new DateTime($member->dusom_when);
									                    @endphp
									                    {{ $dusomwhen->format('jS F, Y') }}
								                    	@else
								                    	Not done
								                    	@endif
							                    	</strong>
							                    </div>
						                    </div>

						                    <hr>
						                    <div class="row">
							                    <div class="col-md-6" style="font-size: 12px;">DLTC: 
							                    	<strong>
							                    	@if($member->dltc_status == 1)
							                    	Yes
							                    	@else
							                    	No
							                    	@endif
							                    	</strong>
							                	</div>
							                    <div class="col-md-6" style="font-size: 12px;"> 
							                    	<strong>
							                    		@if($member->dltc_status == 1)
								                    	@php
									                     $dltcwhen = new DateTime($member->dltc_when);
									                    @endphp
									                    {{ $dltcwhen->format('jS F, Y') }}
								                    	@else
								                    	Not done
								                    	@endif
							                    	</strong>
							                    </div>
						                    </div>						                    
						                    <hr>
						                    <div class="row">
							                    <div class="col-md-6" style="font-size: 12px;">Found. Class: 
							                    	<strong>
							                    	@if($member->fclass_status == 1)
							                    	Yes
							                    	@else
							                    	No
							                    	@endif
							                    	</strong>
							                	</div>
							                    <div class="col-md-6" style="font-size: 12px;"> 
							                    	<strong>
							                    		@if($member->fclass_status == 1)
								                    	@php
									                     $fclasswhen = new DateTime($member->fclass_when);
									                    @endphp
									                    {{ $fclasswhen->format('jS F, Y') }}
								                    	@else
								                    	Not done
								                    	@endif
							                    	</strong>
							                    </div>
						                    </div>
						                    <hr>
						                    <div class="row">
							                    <div class="col-md-6" style="font-size: 12px;">Water Baptism: 
							                    	<strong>
							                    	@if($member->water_baptism == 1)
							                    	Yes
							                    	@else
							                    	No
							                    	@endif
							                    	</strong>
							                	</div>
							                    <div class="col-md-6" style="font-size: 12px;"> 
							                    	<strong>
							                    		@if($member->water_baptism == 1)
								                    	@php
									                     $baptismwhen = new DateTime($member->water_baptism_when);
									                    @endphp
									                    {{ $baptismwhen->format('jS F, Y') }}
								                    	@else
								                    	Not done
								                    	@endif
							                    	</strong>
							                    </div>
						                    </div>
						                </div>
						                <br>
						            </div>
						            <div class="card col-md-3">
						                <div class=""><br>
						                    <h5 class="card-title">Next of Kin's Information</h5>
						                    <div class="p-3">
							                    <div class="image text-center">
							                        <img class="user_avatar" src="{{asset('img/dummy/u6.png')}}" alt="User Image">
							                    </div>
							                    <div class="text-center">
							                        <h6 class="p-t-10"> {{ $member->getNOK ? $member->getNOK->surname.' '.$member->getNOK->othernames : "Nil" }}</h6>
							                         {{ $member->getNOK ? $member->getNOK->email  : "Nil"}}
							                         {{ $member->getNOK ? $member->getNOK->phone_no  : "Nil"}}
							                    </div>
							                </div>
						                    <p class="card-text">
						                    	<!-- <div class="col-md-12">
								                  <br><br>
								                  <a data-toggle="modal" data-target="#editDept" class="btn btn-primary btn-xs btn-block"> Edit Info</a>
								                  @role('administrator|resident-pastor')
								                  <a data-toggle="collapse" data-target="#addMember" class="btn btn-success btn-xs btn-block"> Tranfer to other Dept.</a>
								                  @endrole
								                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-warning btn-xs btn-block"> Disciplinary Action</a> 
								                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> 
								                  <button data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-secondary btn-xs btn-block"> Print Data Card</button> 
								                </div> -->
						                        <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
						                    </p>
						                    <hr>
						                    <h5 class="card-title">Home Cell Information</h5>
						                <div class="row">
						                    <div class="col-md-12">Home Cell: &nbsp;&nbsp;&nbsp;<strong>{{ $member->gethomecell ? $member->gethomecell->homecell_name : "Nil" }}</strong></div>
						                    <hr>
						                    <div class="col-md-12">Cell Code: &nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $member->gethomecell ? $member->gethomecell->seek_code : "Nil"}}</strong></div>
						                    <hr>
						                    <div class="col-md-12">Home Cell District: &nbsp;&nbsp;<strong>{{ $member->gethomecell ? $member->gethomecell->district->dis_name : "Nil"}}</strong></div>
					                    </div>
						                </div>
						            </div>
						        </div>
                            </div>
                            <div class="tab-pane fade text-center p-5" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2">
                                <h4 class="card-title">Tab 2</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>

                            <div class="tab-pane fade p-4" id="v-pills-tab4" role="tabpanel" aria-labelledby="v-pills-tab4"> <!-- Pool of Service Departments posted to-->
                                <h4 class="card-title">Workforce Service Pool</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                    {{ $member->getPostings ? $member->getPostings->count() : "Nil"}}

                                    <table id="example2" class="table table-bordered table-hover data-tables" data-options='{ "paging": false; "searching":false}'>
					                  <thead>
					                    <tr>
					                        <th style="text-transform: uppercase;" width="2%">S/No</th>
					                        <th style="text-transform: uppercase;" width="15%">Department Name</th>
					                        <th style="text-transform: uppercase;" width="15%">Date Posted</th>
					                        <th style="text-transform: uppercase; text-align: center;"> Status</th>
					                        </tr>
					                    </thead>
					                     <tbody>
					                        <tr class="odd gradeX">
					                        @foreach($member->getPostings as $count => $post)
					                            <td>{{ ++$count }}</td>  
					                            <td ><a href="{{route('members.one', $post->id) }}"> <b>{{ strtoupper($post->dept->dept_name) }}</b></a></td>

					                            <td>{{ $post->created_at}}</td>
					                            <td>{{ "Established" }}</td>
					                        </tr>
					                        @endforeach
					                    </tbody>
					              </table>                

                            </div>

                            <div class="tab-pane fade text-center p-5" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3">
                                <h4 class="card-title">Tab 3</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>

      		</div>
  		</div>
	</div>
	@include('members.modals.transfertodept')
</div>
@endsection
@section('scripts')
<!-- Page Script  -->
<script type="text/javascript">
function FindPerson() {
obj = new Object();
obj._token = "{{csrf_token() }}";
obj.phone = document.getElementById("phone").value;
$.ajax({
url:"{{ route('findConvert') }}",
method:"post",
data:obj,
success:function(resp){
var objects = JSON.parse(resp);
for(var i in objects){
    // alert(document.getElementById("fullnames").value = objects[i].fullnames);
    document.getElementById("fullnames").value = objects[i].fullnames
    document.getElementById("pid").value = objects[i].id
    document.getElementById("phone").value = objects[i].phone1
}
}
// error:function(resp){
//     alert('The record do not match any of the persons registered before now. You can add him/her to the class directly from here.');
// }
});
}
</script>
@endsection

