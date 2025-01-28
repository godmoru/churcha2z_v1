@extends('layouts.master')

@section('content')

<?php
    $enlisted = new DateTime($accountant->date_taken);
    $confirmed = new DateTime($accountant->date_confirmed);
    $to   = new DateTime('today');
    $fpath = public_path().'/images/accountants/'.$accountant->id.'.png';
?>
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
           <div class="row collapse" id="editRecord">
              @include('hr.accountants.modals.edit')
            </div>

            <div class="row collapse" id="assignLoc">
              @include('hr.accountants.modals.assignlocation')
            </div>
            <div class="row collapse" id="postToLoc">
              @include('hr.accountants.modals.postlocation')
            </div>

            <div class="row collapse" id="deleteC">
              @include('hr.accountants.modals.delete')
            </div>



            <div class="row p-t-b-12 col-md-12 col-lg-12">
              <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="image m-3">
                              @if (file_exists($fpath))
                                  <img src="{{asset('images/accountants/'.$accountant->id.'.png')}}" class="user_avatar no-b no-p" style="height: 80px; width: 80px;"> 
                              @else
                                <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 80px; width: 80px;"> 
                              @endif
                            </div>
                            <div>
                            <button data-toggle="collapse" data-target="#takeimage" aria-expanded="false" aria-controls="collapseExample" class="btn btn-xs btn-outline-warning"><i class="icon-photo_camera s-24 "></i></button>
                                <h5 class="p-t-10">{{ $accountant->surname .' '.$accountant->othernames}}</h5>
                                {{$accountant->email.',  '.$accountant->phone1}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2" align="center">
                  <p class="text-uppercase text-bold text-center"> Current Location</p>
                  <p class="text-center text-uppercase h3 text-bold"><strong>{{ isset($accountant->loc) ? $accountant->loc->loc_name : "Not Assigned"  }}</strong></p>
                  <p class="text-center text-uppercase h4">{!!DNS1D::getBarcodeHTML($accountant->tag_no, "C128A",1);!!} <strong>{{$accountant->tag_no}}</strong></p>
                </div>
                
                <div class="col-lg-5">
                <!-- @if (\Carbon\Carbon::parse($accountant->dob)->isBirthday())
                Happy Birthday
                @else

                @endif -->


                  <div class="row collapse" id="takeimage">
                       <!--include('hr.accountants.modals.takepic') -->
                  </div>
                </div>

                <div class="col-md-2">
                  <br><br>
                  <a data-toggle="collapse" data-target="#editRecord" class="btn btn-warning btn-xs btn-block"> Update Info</a>
                  <!--<a data-toggle="collapse" data-target="#assignLoc" class="btn btn-primary btn-xs btn-block"> Change Location</a>-->
                  <div class="btn-group btn-block" >
                      <button class="btn btn-primary btn-xs btn-flat btn-block ">Location Posting/Assignment</button>
                      <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                          <li><a class="btn" data-toggle="collapse" data-target="#assignLoc" aria-expanded="false" aria-controls="collapseExample">Assign Location</a></li>
                          <li class="divider"></li>
                          <li><a class="btn" data-toggle="collapse" data-target="#postToLoc" aria-expanded="false" aria-controls="collapseExample">Post to Location</a></li>

                      </ul>
                  </div>
                  <button data-toggle="modal" data-target="#enableLogin" class="btn btn-outline-primary btn-xs btn-block"> Enable Login</button>
                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> 
                  <!-- <button data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-secondary btn-xs btn-block"> Print Data Card</button>  -->
                </div>
                  
                    
                </div>
            </div>
            <hr>
          <div class="w">
              <ul class="nav nav-material responsive-tab" id="v-pills-tab" role="tablist">
                  <li>
                      <a class="nav-link active" id="v-pills-home1-tab" data-toggle="pill" href="#v-pills-home1" role="tab" aria-controls="v-pills-home1" aria-selected="false"><i class="icon icon-home2"></i>Home</a>
                  </li>
                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-certificate2"></i>Awards & Recommendation</a>
                  </li>

                  <li>
                      <a class="nav-link" id="v-pills-attendance-tab" data-toggle="pill" href="#v-pills-attendance" role="tab" aria-controls="v-pills-attendance" aria-selected="false"><i class="icon icon-gavel"></i>Disciplinary Record(s)</a>
                  </li>


                  <li>
                      <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i class="icon icon-agenda"></i>Timeline</a>
                  </li>
              </ul>
          </div>
        </div>
    </header>
    
  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
       <div class="tab-content" id="v-pills-tabContent">
           <div class="tab-pane fade show active" id="v-pills-home1" role="tabpanel" aria-labelledby="v-pills-home1-tab">
              <div class="row"> 
                   
                   <div class="col-md-9">
                    
                      <div class="row">
                          <div class="col-md-12">
                               <div class="card">
                                   <div class="card-header white">
                                       <h6>Work  performance <small>Per Month</small></h6>
                                   </div>
                                   <div class="card-body">
                                      
                                   </div>
                               </div>
                           </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                        <div class="card no-b p-3 my-0">
                          <div class="card-header white">
                              <strong> Performance Trends</strong>
                          </div>
                            <p></p>
                            <div class="height-300">
                                
                            </div>
                        </div>
                    </div>
               </div>

           </div>

         
           
           <div class="tab-pane fade" id="v-pills-home-church" role="tabpanel" aria-labelledby="v-pills-home-church-tab">
            <div class="row">
                   <div class="col-md-12">
                      <div class="card">
                        
                      </div>
                   </div>
               </div>
           </div>

        

           <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">
               <div class="row">
                   <div class="col-md-12">
                       <!-- The time line -->
                       <ul class="timeline">
                           <!-- timeline time label -->
                           <li class="time-label">
                            <span class="badge badge-danger r-3">
                              10 Feb. 2014
                            </span>
                           </li>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-envelope bg-primary"></i>
                               <div class="timeline-item card">
                                   <div class="card-header white"><a href="#">Support Team</a> sent you an email    <span class="time float-right"><i class="ion icon-clock-o"></i> 12:05</span></div>
                                   <div class="card-body">
                                       Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                       weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                       jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                       quora plaxo ideeli hulu weebly balihoo...
                                   </div>
                                   <div class="card-footer">
                                       <a class="btn btn-primary btn-xs">Read more</a>
                                       <a class="btn btn-danger btn-xs">Delete</a>
                                   </div>
                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-user yellow"></i>

                               <div class="timeline-item  card">

                                   <div class="card-header white"><h6><a href="#">Sarah Young</a> accepted your friend request<span class="float-right"><i class="ion icon-clock-o"></i> 5 mins ago</span></h6></div>


                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           <li>
                               <i class="ion icon-comments bg-danger"></i>

                               <div class="timeline-item  card">


                                   <div class="card-header white"><h6><a href="#">Jay White</a> commented on your post   <span class="float-right"><i class="ion icon-clock-o"></i> 27 mins ago</span></h6></div>

                                   <div class="card-body">
                                       Take me to your leader!
                                       Switzerland is small and neutral!
                                       We are more like Germany, ambitious and misunderstood!
                                   </div>
                                   <div class="card-footer">
                                       <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                   </div>
                               </div>
                           </li>
                           <!-- END timeline item -->
                           <!-- timeline time label -->
                           <li class="time-label">
                          <span class="badge badge-success r-3"> 3 Jan. 2014</span>
                           </li>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                          
                           <!-- END timeline item -->
                           <!-- timeline item -->
                           
                           <!-- END timeline item -->
                           <li>
                               <i class="ion icon-clock-o bg-gray"></i>
                           </li>
                       </ul>
                   </div>
                   <!-- /.col -->
               </div>
           </div>
         
       </div>
   </div>
    @include('systems.users.enableloginacct')
    @include('systems.users.enableloginacct')
</div>
@endsection
@section('scripts')
    <!-- Page Script  -->
     <?php
        $states = \App\State::all(); 
        $lgas = \App\Lga::all();            
    ?>
    <script hidden="">
      var states = <?= json_encode($states); ?>;
      var lgas = <?= json_encode($lgas); ?>;
    </script>

<script type="text/javascript">
    //<!-- State & Lgas -->
         $("select[name=state]").on('change',function(){
            var select = '<select class="custom-select select2" name="lga" id="lga" required="">';
                var options = '<option value="">Select Host LGA</option>';
                for(var i in lgas){
                    if($(this).val() == lgas[i].state_id){
                        options+='<option value="'+lgas[i].id+'">'+lgas[i].lga_name+'</option>';
                    }
               }
               select+=options+'</select>';
               $("select[name=lga]").replaceWith(select);
        });
</script>
@endsection