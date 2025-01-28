@role('administrator|resident-pastor|fd-supervisor|mobile-church')
<div class="tab-pane fade show" id="v-pills-dhc" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-14">Home Church Menu</span>
            </div>
        </div>
    </div>
@endrole
    <ul class="sidebar-menu">
        @role('administrator|resident-pastor|fd-supervisor')
        <li class="treeview"><a href=""><i class="icon icon-circle-o"></i>All Home Churches</a></li>
        <li class="treeview"><a href=""><i class="icon icon-circle-o"></i>Add Home</a></li>
        @endrole
        @role('administrator|front-desk|fd-supervisor|mobile-church')
        <li class="treeview"><a href="{{route('dhc.districts', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>All Districts</a></li>
        @endrole
        @role('administrator|front-desk|fd-supervisor')
        <li class="treeview"><a href=""><i class="icon icon-circle-o"></i>All Zone</a></li>
        <li class="treeview"><a href=""><i class="icon icon-circle-o"></i>All Area</a></li>
        <li class="treeview"><a href=""><i class="icon icon-circle-o"></i>DHC Leadership</a></li>
        @endrole
    </ul>
</div>
