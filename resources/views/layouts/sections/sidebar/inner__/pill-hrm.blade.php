<div class="tab-pane fade show" id="v-pills-hrm" role="tabpanel"
     aria-labelledby="v-pills-home-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">HRM Menu</span>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="treeview">
            <a href="index.html">
            <i class="icon icon-desktop_mac s-24"></i> <span>Dashboard</span>
            </a>
        </li>
        
        <li class="treeview"><a href="#"><i class="icon icon-user-o s-24"></i>Pastors<i
                class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{route('pastors.index', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Resident Pastors</a></li>
                <li><a href="#"><i class="icon icon-circle-o"></i>Other Pastors</a></li>
                <li><a href="#"><i class="icon icon-circle-o"></i>Pastors Location Matrixes</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="icon icon-user-o s-24"></i>
                <i class=" icon-angle-left  pull-right"></i>
                <span>Counselors</span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="icon icon-circle-o"></i>Dashboard</a>
                </li>
                <li><a href="{{route('counselors.index', \Crypt::encrypt(2)) }}"><i class="icon icon-people"></i>Counselors' Index</a>
                </li>
                <li><a href="#"><i class="icon icon-add"></i>Class Assignment</a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="icon icon-user-o s-24"></i>
                <i class=" icon-angle-left  pull-right"></i>
                <span>Counters</span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="icon icon-circle-o"></i>Dashboard</a></li>
                <li><a href="{{route('counselors.index', \Crypt::encrypt(2)) }}"><i class="icon icon-people"></i>Counter' Index</a></li>
                <li><a href="#"><i class="icon icon-add"></i>Class Assignment</a></li>
            </ul>
        </li>

       <!--  <li class="treeview">
            <a href="#">
                <i class="icon icon-user-o s-24"></i>
                <i class=" icon-angle-left  pull-right"></i>
                <span>Home Cell Leaders</span>
            </a>
            <ul class="treeview-menu">
                <li><a href="inbox.html"><i class="icon icon-circle-o"></i>Inbox</a>
                </li>
                <li><a href="inbox2.html"><i class="icon icon-circle-o"></i>Inbox 2</a>
                </li>
                <li><a href="inbox-create.html"><i class="icon icon-add"></i>Compose</a>
                </li>
            </ul>
        </li> -->        
    </ul>
</div>