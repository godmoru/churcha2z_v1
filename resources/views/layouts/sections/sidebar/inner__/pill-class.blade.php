@role('counselor|administrator|resident-pastor')
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
        <li class="treeview"><a href="{{route('classes.index', \Crypt::encrypt(12)) }}"><i class="icon icon-circle-o"></i>All Classes</a></li>
        @role('counselor|administrator')
        <li class="treeview"><a href="{{route('classes.foundation-classes', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>Foundation Class</a></li>
        @endrole
        <li class="treeview"><a href="inbox2.html"><i class="icon icon-circle-o"></i>DLTC </a></li>
        <!-- <li class="treeview"><a href="inbox-create.html"><i class="icon icon-circle-o"></i>DUSOM </a></li> -->

        <li class="treeview"><a href="{{route('counselors.index', \Crypt::encrypt(12)) }}"><i class="icon icon-circle-o"></i>Counsellors/Facilitators</a></li>
    </ul>
</div>