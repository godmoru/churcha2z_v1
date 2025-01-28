@role('senior-pastor|administrator')
<div class="tab-pane fade show" id="v-pills-locations" role="tabpanel"
     aria-labelledby="v-pills-locations-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Locations' Menu</span>
            </div>
        </div>
    </div>
    <ul class="sidebar-menu">
        @role('administrator|snr-pastor')
        <li><a href="{{ route('locations.index', \Crypt::encrypt(32))}}"><i class="icon icon-circle-o"></i>All Locations</a></li>
        <li><a href="{{ route('locations.plantingInfo', \Crypt::encrypt(32))}}"><i class="icon icon-circle-o"></i>Location Planting Info</a></li>
        <li><a href="{{ route('locations.findex', \Crypt::encrypt(32))}}"><i class="icon icon-circle-o"></i>Foreign Locations</a></li>
        @endrole
    </ul>
</div>
@endrole