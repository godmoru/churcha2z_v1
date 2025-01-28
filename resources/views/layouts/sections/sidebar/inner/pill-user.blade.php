<!--role('administrator|resident-pastor|counselor-hod|fd-supervisor|front-desk|auditor')-->
@role('auditor|fc-coordinator|administrator|counselor-hod|counter-hod|front-desk|counter-desk-officer|hc-frontdesk|hc-office|snr-pastor|reg-pastor|fd-supervisor|resident-pastor|account-officer|hq-accountant|assistant-pastor|hq-minister|location-admin')
<div class="tab-pane fade show" id="v-pills-user" role="tabpanel"
     aria-labelledby="v-pills-user-tab">
    <div class="relative brand-wrapper sticky b-b">
        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-xs-center">
                <span class="font-weight-lighter s-14"> {{\Auth::user()->first_name.' '.\Auth::user()->last_name}} </span>
            </div>
        </div>
    </div>
@endrole
    <ul class="sidebar-menu">
         @role('administrator|reg-pastor|snr-pastor|counselor-hod|auditor|resident-pastor|assistant-pastor|hq-minister')
        <li class="treeview">
            @if(\Auth::user()->pastorData)
            <a href="{{route('pastors.one', \Crypt::encrypt(\Auth::user()->pastorData->id))}}">
            <i class="icon icon-id-card-o s-20"></i> <span>Profile</span>
            </a>
            @endif
        </li>
        @endrole
         @role('administrator|reg-pastor|snr-pastor')
        <li class="treeview">
            <a href="{{route('auditLogs', \Crypt::encrypt(3)) }}">
            <i class="icon icon-note-list s-20"></i> <span>Audit Log</span>
            </a>
        </li>

        <li class="treeview">
            <a href="index.html">
            <i class="icon icon-settings s-20"></i> <span>Settings</span>
            </a>
        </li>
        @endrole
        @role('auditor|fc-coordinator|administrator|counselor-hod|counter-hod|front-desk|counter-desk-officer|hc-frontdesk|hc-office|snr-pastor|reg-pastor|fd-supervisor|resident-pastor|account-officer|hq-accountant|location-admin')
        <li class="treeview">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form')
             .submit();">

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <i class="icon icon-settings_power s-20"></i> <span>Logout</span>
            </a>
        </li>
        @endrole
    </ul>
    
</div>