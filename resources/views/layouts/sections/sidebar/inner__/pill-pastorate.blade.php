@role('counselor|administrator|resident-pastor')
<div class="tab-pane fade show" id="v-pills-pastorate" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Pators Menu</span>
            </div>
        </div>
    </div>
    @endrole
    <ul class="sidebar-menu">
        <li><a href="{{route('pastors.index', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Resident Pastors</a></li>
        <li><a href="{{route('pastors.createnew', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Add Pastor</a></li>
        <li><a href="#"><i class="icon icon-circle-o"></i>Other Pastors</a></li>
        <!-- <li><a href="#"><i class="icon icon-circle-o"></i>Pastors Location Matrixes</a></li> -->
    </ul>
</div>