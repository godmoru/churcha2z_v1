@role('administrator|resident-pastor|fd-supervisor|counters-hod|counter-desk-officer')
<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
     aria-labelledby="v-pills-home-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Service Attendance Menu</span>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        @role('administrator|snr-pastor')
            <!--<li><a href="{{ route('locations.index', \Crypt::encrypt(32))}}"><i class="icon icon-circle-o"></i>All Locations</a></li>-->
        @endrole
        @role('administrator|reg-pastor|counter|fd-supervisor|counters-hod|counter-desk-officer')
            <li><a href="{{ route('locations.show-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i> Service Attendances</a></li>
            @endrole
           @role('administrator|reg-pastor|counter|fd-supervisor|counters-hod') 
            <li><a href="{{ route('locations.show-attendance-count-areas', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i> Attendance Count Areas</a></li>
            <li><a href="{{ route('locations.show-attendance-details', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i> View Attendance Data</a></li>
            @endrole
            @role('administrator|reg-pastor|counter|fd-supervisor|counters-hod|counter-desk-officer')
            <!-- <li><a href=""><i class="icon icon-circle-o"></i> Add Attendance</a></li> -->
            <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Add Attendance<i class=" icon-angle-left  pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('location.add-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Main Bowl</a></li>
                    <!-- <li><a href="#"><i class="icon icon-circle-o"></i>Galleries</a></li> -->
                    <li><a href="#"><i class="icon icon-circle-o"></i>Galleries<i class=" icon-angle-left  pull-right"></i></a>
                        <ul class="treeview-menu" style="display: block;">
                            <li><a href="{{ route('location.add-under-gallery-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Under Gallery</a></li>
                            <li><a href="{{ route('location.add-gallery-1-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Gallery 1</a></li>
                            <li><a href="{{ route('location.add-gallery-2-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Gallery 2</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('location.add-overflows-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Overflows</a></li>
                    <li><a href="{{ route('location.add-additional-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Additional Attendance</a></li>
                    <li><a href="{{ route('location.add-special-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Special Attendance</a></li>
                    <li><a href="{{ route('location.add-vehicle-attendance', \Crypt::encrypt(98))}}"><i class="icon icon-circle-o"></i>Vehicles/Cars</a></li>
                </ul>
            </li>
        @endrole
    </ul>
</div>
@endrole