@role('counselor-hod|fc-coordinator|administrator|resident-pastor|fd-supervisor')
<div class="tab-pane fade show" id="v-pills-class" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Classes Management Menu</span>
            </div>
        </div>
    </div>
    @endrole
    
    <ul class="sidebar-menu">
        @role('administrator|fd-supervisor')
        <li class="treeview"><a href="{{route('classes.index', \Crypt::encrypt(12)) }}"><i class="icon icon-circle-o"></i>All Classes</a></li>
        @endrole
        @role('counselor-hod|administrator|fd-supervisor|fc-coordinator')
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Foundation Classes<i class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                @role('counselor-hod|administrator|fc-coordinator|fd-supervisor')
                <li><a href="{{route('classes.foundation-classes', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>Foundation Class Batches</a></li>
                @endrole
                @role('administrator|counselor-hod|fd-supervisor')
                <li class="treeview"><a href="{{route('counselors.index', \Crypt::encrypt(12)) }}"><i class="icon icon-circle-o"></i>Counsellors/Facilitators</a></li>
                @endrole
            </ul>
        @endrole
        </li>
        @role('dltc-coordinator|administrator|fd-supervisor')
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>DLTC<i class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{route('classes.foundation-classes', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>DLTC Batches</a></li>
                <li class="treeview"><a href="{{route('counselors.index', \Crypt::encrypt(12)) }}"><i class="icon icon-circle-o"></i>Cordinators/Facilitators</a></li>
            </ul>
        </li>
    </ul>

    @endrole
</div>