@php
$users = \App\User::all();
@endphp
<aside class="control-sidebar fixed white ">
    <div class="sidebar-header">
        <h4>Online Users</h4>
        <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
    </div>

        <div class="p4">
            <div class="p-3">
                <!-- start online users -->
                @if($users)
                    @foreach($users as $user)
                        @if($user->isOnline())
                            <ul class="menu pl-2 pr-2">
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="{{asset('img/dummy/u1.png')}}" alt="">
                                            <span class="avatar-badge online"></span>
                                        </div>
                                        <h6>
                                           &nbsp; <a href="{{ route('user.profile', \Crypt::encrypt($user->id))}}">{{ $user->first_name.' '.$user->last_name }}</a> <br> &nbsp;&nbsp;{{ $user->location->loc_name }}
                                            <small> 5 mins Ago</small>
                                        </h6>
                                    </a>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                @endif
                <!-- end online users -->
            </div>
        </div>

        <div class="sidebar-header">
            <h4>Most Recent Activity</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <!-- <div class="p-4">
            <div class="activity-item activity-primary">
                <div class="activity-content">
                    <small class="text-muted">
                <i class="icon icon-user position-left"></i> 5 mins ago
            </small>
                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                </div>
            </div>
        </div> -->
    </div>
</aside>