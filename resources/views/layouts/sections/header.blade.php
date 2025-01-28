<div class="sticky">
    <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
        <div class="relative">
            <div class="d-flex">
                <div class="d-none d-md-block">
        
                    <h1 class="nav-title"><!-- <img src="{{asset('img/dunamis.png')}}" alt="" style="height: 30px; width: 35px;" /> --> {{isset($pageName) ? $pageName : ""}}</h1>
                </div>
            </div>
        </div>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages-->
                <li class="dropdown custom-dropdown messages-menu">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="icon-envelope-o"></i>
                        <span class="badge badge-success badge-mini rounded-circle">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu pl-2 pr-2">
                                <!-- start message -->
                                <li>
                                    <a href="#">
                                        <div class="avatar float-left">
                                            <img src="{{asset('img/dummy/u1.png')}}" alt="">
                                            <span class="avatar-badge busy"></span>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="icon icon-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>New updates are available</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer s-12 p-2 text-center"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- Right Sidebar Toggle Button -->
                <li>
                    <a class="nav-link ml-2" data-toggle="control-sidebar">
                        <i class="icon-format_align_right"></i>
                    </a>
                </li>
                <!-- User Account-->
                <li class="dropdown custom-dropdown user user-menu ">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <img src="{{asset('img/dummy/u8.png')}}" class="user-image" alt="User Image">
                        <i class="icon-more_vert "></i>
                    </a>
                    <div class="dropdown-menu p-4 dropdown-menu-right">
                        <div class="row box justify-content-between my-4">
                            <div class="col">
                                <a href="{{route('auditLogs',\Crypt::encrypt('334534'))}}">
                                    <i class="icon-apps purple lighten-2 avatar  r-5"></i>
                                    <div class="pt-1">History</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{route('user.profile', \Crypt::encrypt(\Auth::user()->id))}}">
                                <i class="icon-beach_access pink lighten-1 avatar  r-5"></i>
                                <div class="pt-1">Profile</div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="#">
                                    <i class="icon-perm_data_setting indigo lighten-2 avatar  r-5"></i>
                                    <div class="pt-1">Settings</div>
                                </a>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row box justify-content-between my-4">
                            <div class="col">
                                <a data-toggle="modal" data-target="#changeP">
                                    <i class="icon-padlock orange lighten-2 avatar  r-5"></i>
                                    <div class="pt-1">Change Password</div>
                                </a>
                            </div>
                            
                            <div class="col">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form')
                                     .submit();">

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                <i class="icon-power_settings_new blue lighten-1 avatar  r-5"></i>
                                <div class="pt-1">Log Out</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>