@role('snr-pastor|administrator|resident-pastor|fd-supervisor|front-desk')
<div class="tab-pane fade show" id="v-pills-members" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Members Menu</span>
            </div>
        </div>
    </div>
    
    <ul class="sidebar-menu">
        @role('snr-pastor|administrator|resident-pastor|fd-supervisor')
        <li class="treeview">
            <a href="index.html">
                <i class="icon icon-desktop_mac s-24"></i> <span>Dashboard</span>
            </a>
        </li>
        @endrole
        @role('snr-pastor|administrator|resident-pastor|fd-supervisor')
        <li class="treeview"><a href="{{route('members.index', \Crypt::encrypt(3)) }}"><i class="icon icon-users"></i>All Members</a></li>
        @endrole
        @role('snr-pastor|administrator|resident-pastor|fd-supervisor|front-desk')
        <li class="treeview"><a href="{{route('members.reg', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>Add Member</a></li>
        @endrole
        <!-- <li class="treeview"><a href="{{route('members.index', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>Search</a></li> -->
        <!-- <li class="treeview"><a href="panel-page-profile.html"><i class="icon icon-user"></i>Member Indexes </a></li> -->
    </ul>
</div>
@endrole
