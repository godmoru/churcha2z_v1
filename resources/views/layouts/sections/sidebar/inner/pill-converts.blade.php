@role('administrator|resident-pastor|fd-supervisor|front-desk|mobile-church')
<div class="tab-pane fade show" id="v-pills-converts" role="tabpanel"
     aria-labelledby="v-pills-members-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-18">Converts Menu</span>
            </div>
        </div>
    </div>
@endrole

    <ul class="sidebar-menu">
        @role('administrator|front-desk|fd-supervisor|snr-pastor|mobile-church')
        <li class="treeview"><a href="{{route('converts.reg', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>Add Convert(s)</a></li>
        <li class="treeview"><a href="{{route('converts.index', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>All Converts</a></li>
        @endrole
        @role('administrator|fd-supervisor|snr-pastor')
        <li class="treeview"><a href="{{route('converts.dailysummary', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>Daily Summaries</a></li>
        <li class="treeview"><a href="{{route('peoplecategories', \Crypt::encrypt(1)) }}"><i class="icon icon-circle-o"></i>Add Convert Category</a></li>
        <li class="treeview"><a href="{{route('converts.getBulkSMS', \Crypt::encrypt(4)) }}"><i class="icon icon-circle-o"></i>Get Contacts for Bulk SMS</a></li>
        
        @if(\Auth::user()->location_id ==1)
        <!-- <li class="treeview"><a href="{{route('converts.global-index', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>View Location Converts</a></li> -->
        @endrole
        @else
        @endif 
        @role('administrator|front-desk|fd-supervisor|mobile-church')
        <li class="treeview"><a href="{{route('converts.showsearch', \Crypt::encrypt(3)) }}"><i class="icon icon-circle-o"></i>Search Converts</a></li>
        @endrole
    </ul>
</div>