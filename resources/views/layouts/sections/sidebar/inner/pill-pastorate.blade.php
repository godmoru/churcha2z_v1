@role('senior-pastor|administrator|resident-pastor|hq-minister|assistant-pastor|location-admin')
<div class="tab-pane fade show" id="v-pills-pastorate" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Pastors' Menu</span>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        @role('administrator|snr-pastor')
        <li><a href="{{route('pastors.index', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Pastors</a></li>
        <li><a href="{{route('pastor.postinghistory', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Pastors Posting History</a></li>
        <li><a href="{{route('pastors.createnew', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Add Pastor</a></li>
        <!--<li><a href="{{ route('locations.index', \Crypt::encrypt(32))}}"><i class="icon icon-circle-o"></i>All Locations</a></li>-->
        @endrole
        @role('administrator|senior-pastor|resident-pastor|hq-minister|assistant-pastor|location-admin')
            <li><a href="{{ route('locations.weekly-reports-submit', \Crypt::encrypt(322))}}"><i class="icon icon-circle-o"></i>Weekly Reports</a></li>
            <li><a href="{{route('pastors.2index', \Crypt::encrypt(22)) }}"><i class="icon icon-circle-o"></i>Resident Pastors</a></li>

            @if(\Auth::user()->id == 9 | \Auth::user()->id == 1)
            <li><a href="{{ route('locations.weekly-reports', \Crypt::encrypt(322))}}"><i class="icon icon-circle-o"></i>Weekly Reports</a></li>
            <li><a href="{{ route('locations.weekly-reports2', \Crypt::encrypt(322))}}"><i class="icon icon-circle-o"></i>Weekly Reports II</a></li>
            <li><a href="{{ route('locations.all-weekly-reports', \Crypt::encrypt(\Auth::user()->location_id))}}"><i class="icon icon-circle-o"></i>All My Reports</a></li>
            @else
            
            @endif
        @endrole
        <!--<li><a href="#"><i class="icon icon-circle-o"></i>Other Pastors</a></li>-->
        <!-- <li><a href="#"><i class="icon icon-circle-o"></i>Pastors Location Matrixes</a></li> -->
    </ul>
</div>
@endrole