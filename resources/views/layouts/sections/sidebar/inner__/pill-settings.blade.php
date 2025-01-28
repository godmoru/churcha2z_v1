<div class="tab-pane fade show" id="v-pills-settings" role="tabpanel"
     aria-labelledby="v-pills-settings-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">System Settings </span>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="treeview">
            <a href="{{ route('sysroles.index', \Crypt::encrypt(23))}}">
            <i class="icon icon-dvr s-24"></i> <span>Preferences</span>
            </a>
        </li>
        
        <li class="treeview"><a href="#"><i class="icon icon-key s-24"></i>Access Controll<i
                class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('sysroles.index', \Crypt::encrypt(33))}}"><i class="icon icon-circle-o"></i>Roles</a></li>
                <li><a href="panel-page-users-create.html"><i class="icon icon-circle-o"></i>Permissions</a></li>
            </ul>
        </li>
        <li class="treeview"><a href="#">
            <i class="icon icon-user-o s-24"></i>
            <i class=" icon-angle-left  pull-right"></i>
            <span>Users</span>
        </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('users.index', \Crypt::encrypt(2))}}"><i class="icon icon-circle-o"></i>Users</a></li>
            </ul>
        </li>    
    </ul>
</div>




<!-- 070 83 93 6670 -->