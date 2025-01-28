@role('counselor|administrator|resident-pastor')
<div class="tab-pane fade show" id="v-pills-report" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-14">Central Report Portal</span>
            </div>
        </div>
    </div>
    @endrole
    <ul class="sidebar-menu">
        <li class="treeview"><a href="{{route('members.index', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>General Report</a></li>
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i> Converts Reports</a></li>
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i> Locations Reports</a></li>
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Home Church Report</a></li>
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Classes Reports</a></li>
    </ul>
</div>