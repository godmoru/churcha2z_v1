@extends('layouts.master')

@section('content')

<?php
    $enlisted = new DateTime($counselor->date_enlisted);
    $confirmed = new DateTime($counselor->date_confirmed);
    $to   = new DateTime('today');
    $fpath = public_path().'/images/counselors/'.$counselor->id.'.png';
?>
<header class="white pt-3 relative shadow">
        <div class="container-fluid">
           <div class="row collapse" id="editRecord">
              @include('hr.counselors.modals.edit')
            </div>

            <div class="row collapse" id="deleteC">
              @include('hr.counselors.modals.delete')
            </div>



            <div class="row p-t-b-12 col-md-12 col-lg-12">
              <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="image m-3">
                              @if (file_exists($fpath))
                                  <img src="{{asset('images/counselors/'.$counselor->id.'.png')}}" class="user_avatar no-b no-p" style="height: 80px; width: 80px;"> 
                              @else
                                <img class="user_avatar no-b no-p" src="{{asset('img/dummy/u6.png')}}" alt="User Image" style="height: 80px; width: 80px;"> 
                              @endif
                            </div>
                            <div>
                            <button data-toggle="collapse" data-target="#takeimage" aria-expanded="false" aria-controls="collapseExample" class="btn btn-xs btn-outline-warning"><i class="icon-photo_camera s-24 "></i></button>
                                <h5 class="p-t-10">{{ $counselor->surname .' '.$counselor->othernames}}</h5>
                                {{$counselor->email.',  '.$counselor->phone1}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2" align="center">
                  <p class="text-uppercase text-bold text-center"> Class/Batch Assigned</p>
                  <p class="text-center text-uppercase h3 text-bold"><strong>{{ isset($counselor->getClassBatch) ? $counselor->getClassBatch->name : "Not Assigned"  }}</strong></p>
                  <p class="text-center text-uppercase h4">{!!DNS1D::getBarcodeHTML($counselor->tag_no, "C128A",1);!!} <strong>{{$counselor->tag_no}}</strong></p>
                </div>
                
                <div class="col-lg-5">
                <!-- @if (\Carbon\Carbon::parse($counselor->dob)->isBirthday())
                Happy Birthday
                @else

                @endif -->


                  <div class="row collapse" id="takeimage">
                      <!--include('hr.counselors.modals.takepic')-->
                  </div>
                </div>

                <div class="col-md-2">
                  <br><br>
                  <a data-toggle="collapse" data-target="#editRecord" class="btn btn-warning btn-xs btn-block"> Update Info</a>
                  <a data-toggle="modal" data-target="#assignClass" class="btn btn-primary btn-xs btn-block"> Assign Class</a>
                  <button data-toggle="modal" data-target="#enableLogin" class="btn btn-outline-primary btn-xs btn-block"> Enable Login</button>
                  <a data-toggle="collapse" data-target="#deleteC" class="btn btn-danger btn-xs btn-block"> Disable/Delete</a> 
                  <button data-toggle="collapse" data-target="#newconvert" aria-expanded="false" aria-controls="collapseExample" class="btn btn-outline-secondary btn-xs btn-block"> Print Data Card</button> 
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
                      <a class="nav-link" id="v-pills-mbers-tab" data-toggle="pill" href="#v-pills-mbers" role="tab" aria-controls="v-pills-mbers" aria-selected="false"><i class="icon icon-people_outline"></i>Batches/Class List</a>
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
                                       <h6>Class Distributions <small>Per Month</small></h6>
                                   </div>
                                   <div class="card-body">
                                      <div class="height-300">
                                          <canvas
                                                  data-chart="bar"
                                                  data-dataset="[
                                                  [21, 90, 55, 25, 79, 0],
                                                  [12, 22, 55, 60, 79, 0],
                                                  [12, 40, 16, 17, 0, 0],
                                                  [12, 40, 16, 17, 79, 0],
                                                  ]"
                                                  data-labels="['July','August','September','October','Novemeber','December']"
                                                  data-dataset-options="[
                                              {
                                                  label: 'Non Graduated',
                                                  borderColor:   'rgba(255, 99, 132, 1)',
                                                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                  borderWidth: 1
                                              },
                                              {
                                                   label: 'Currently In Session',
                                                   borderColor:  'rgba(54, 162, 235, 1)',
                                                   backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                   borderWidth: 1
                                               },
                                              {
                                                    label: 'Graduated',borderColor:
                                                   'rgba(75, 192, 192, 1)',
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderWidth: 1
                                                },
                                                {
                                                    label: 'Total Participants',borderColor:
                                                   'rgba(75, 192, 192, 3)',
                                                    backgroundColor: 'rgba(75, 192, 192, 2.1)',
                                                    borderWidth: 1
                                                }
                                              ]"
                                                  data-options="{
                                                legend: {
                                                      display: true,
                                                },
                                                  scales: {
                                                      yAxes: [{
                                                          stacked: true
                                                      }]
                                                  }
                                          }"
                                          >
                                          </canvas>
                                      </div>
                                   </div>
                               </div>
                           </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                        <div class="card no-b p-3 my-0">
                          <div class="card-header white">
                              <strong> Current Class Performance</strong>
                          </div>
                            <p></p>
                            <div class="height-300">
                                <canvas
                                        data-chart="chartJs"
                                        data-chart-type="pie"
                                        data-dataset="[
                                                        [89, 12],
                                                        [75, 25],
                                                    ]"
                                        data-labels="[['Presents'],['Absents']]"
                                        data-dataset-options="[
                                                    {
                                                        label: 'Presents',
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                        ],

                                                    },
                                                    {
                                                        label: 'Absents',
                                                        backgroundColor: [
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        ],

                                                    },

                                                    ]" >
                                </canvas>
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
    @include('systems.users.enablelogin')
    @include('hr.counselors.modals.assignclass')
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