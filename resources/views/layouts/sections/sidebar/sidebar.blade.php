<aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
    <div class="sidebar">
        <div class="d-flex hv-100 align-items-stretch">
            <div class="blue lighten-2 text-white" >
                <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <center><img src="{{asset('img/dunamis.png')}}" alt="" style="height: 30px; width: 35px;" /></center>

                  @role('administrator|reg-pastor|auditor|resident-pastor|location-admin')
                    <a href="{{route('home')}}" ><i class="icon-desktop tooltiptext" title="Home & Dashboards"></i></a>
                  @endrole
                  @role('administrator|reg-pastor|front-desk|fd-supervisor|mobile-church')
                    <a class="nav-link" id="v-pills-class-tab" data-toggle="pill" href="#v-pills-converts" role="tab" aria-controls="v-pills-converts" aria-selected="false"><i class="icon-user-plus tooltiptext" title="Converts"></i></a>
                  @endrole
                  @role('administrator|fc-coordinator|counselor-hod|fd-supervisor')
                    <a class="nav-link" id="v-pills-class-tab" data-toggle="pill" href="#v-pills-class" role="tab" aria-controls="v-pills-class" aria-selected="false"><i class="icon-people tooltiptext" title="Classes & Soul Establishment"></i></a>
                  @endrole
                  @role('administrator|fd-supervisor|hc-front-desk|mobile-church')
                    <a class="nav-link" id="v-pills-dhc-tab" data-toggle="pill" href="#v-pills-dhc" role="tab" aria-controls="v-pills-dhc" aria-selected="true" href="#"><i class="icon-home2 tooltiptext" title="Home Church"></i></a>
                  @endrole
                  @role('administrator|fd-supervisor|front-desk')
                    <a class="nav-link" id="v-pills-members-tab" data-toggle="pill" href="#v-pills-members" role="tab" aria-controls="v-pills-members" aria-selected="false"><i class="icon-people_outline tooltiptext" title="Members"></i></a>
                  <!-- <a class="nav-link" id="v-pills-hrm-tab" data-toggle="pill" href="#v-pills-hrm" role="tab" aria-controls="v-pills-hrm" aria-selected="false"><i class="icon-people"></i></a> -->
                  @endrole
                  @role('administrator|counselor-hod|fd-supervisor')
                    <a class="nav-link" id="v-pills-workforce-tab" data-toggle="pill" href="#v-pills-workforce" role="tab" aria-controls="v-pills-workforce" aria-selected="false"><i class="icon-object-group tooltiptext" title="Workforce & Departments"></i></a>
                  @endrole
                  @role('administrator|reg-pastor|counters-hod|counter-desk-officer|fd-supervisor')
                    <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="icon-home tooltiptext" title="Locations"></i></a>
                  @endrole
                  @role('administrator')
                    <a class="nav-link" id="v-pills-locations-tab" data-toggle="pill" href="#v-pills-locations" role="tab" aria-controls="v-pills-locations" aria-selected="false"><i class="icon-building tooltiptext" title="Locations"></i></a>
                    @endrole
                  @role('administrator|senior-pastor|resident-pastor|hq-minister|assistant-pastor|location-admin')
                    <a class="nav-link" id="v-pills-pastorate-tab" data-toggle="pill" href="#v-pills-pastorate" role="tab" aria-controls="v-pills-pastorate" aria-selected="true"><i class="icon-user tooltiptext" title="Pastoral"></i></a>
                  @endrole
                  @role('administrator|senior-pastor|auditor|hq-accountant|resident-pastor|account-officer|location-admin')
                    <a class="nav-link" id="v-pills-accounts-tab" data-toggle="pill" href="#v-pills-accounts" role="tab" aria-controls="v-pills-accounts" aria-selected="true"><i class="icon-folder tooltiptext" title="Financial Records"></i></a>
                  @endrole
                  @role('administrator|senior-pastor')
                    <a class="nav-link" id="v-pills-report-tab" data-toggle="pill" href="#v-pills-report" role="tab" aria-controls="v-pills-report" aria-selected="true"><i class="icon-printer tooltiptext" title="System Reports"></i></a>
                  @endrole
                  @role('administrator|senior-pastor|resident-pastor')
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true"><i class="icon-settings tooltiptext" title="System Settings"></i></a>
                  @endrole
                  @role('fc-coordinator|administrator|counselor-hod|counter-desk-officer|counter-hod|front-desk|fd-supervisor|counter-desk-officer|hc-frontdesk|hc-office|snr-pastor|resident-pastor|auditor|hq-accountant|account-officer|mobile-church|assistant-pastor|hq-minister|location-admin')
                    <a class="nav-link" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="true">
                        <figure class="avatar tooltiptext" title="My Account">
                            <img src="{{asset('img/dummy/u3.png')}}" alt="">
                            <span class="avatar-badge online"></span>
                        </figure>
                    </a>
                  @endrole
                </div>
            </div>
            <div class="tab-content flex-grow-1" id="v-pills-tabContent">
               @include('layouts.sections.sidebar.inner.pills')
            </div>
        </div>
    </div>
</aside>