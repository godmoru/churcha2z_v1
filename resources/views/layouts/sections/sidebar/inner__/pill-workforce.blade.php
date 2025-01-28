@role('counselor|administrator|resident-pastor')
<div class="tab-pane fade show" id="v-pills-workforce" role="tabpanel"
     aria-labelledby="v-pills-workforce-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-14">Work Force Menu</span>
            </div>
        </div>
    </div>
    @endrole
    <ul class="sidebar-menu">
        <li class="treeview"><a href="{{route('workforce.depts', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>All Departments/Units</a></li>
        <!-- <li class="treeview"><a href="{{route('workforce.depts.hods', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>HOD(s)</a></li> -->
        <!-- <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Disciplinary Records</a></li> -->
    </ul>
</div>