@role('location-admin|auditor|administrator|resident-pastor|senior-pastor|hq-accountant|account-officer')
    <div class="tab-pane fade show" id="v-pills-accounts" role="tabpanel" aria-labelledby="v-pills-members-tab">
        <div class="relative brand-wrapper sticky b-b">
            <div class="d-flex justify-content-between align-items-center p-3">
                <div class="text-xs-center">
                    <span class="font-weight-lighter s-18">Financial Management</span>
                </div>
            </div>
        </div>
    @endrole

    <ul class="sidebar-menu">
        @role('administrator|hq-accountant|account-officer|auditor')
            <li><a href="{{ route('accounts.dashboard', \Crypt::encrypt(32)) }}"><i
                        class="icon icon-circle-o"></i>Dashboard</a></li>
        @endrole
        @role('administrator|hq-accountant|auditor')
            <li><a href="{{ route('locationgeneralstatement', \Crypt::encrypt(32)) }}"><i
                        class="icon icon-circle-o"></i>Locations Fin. Summary</a></li>
        @endrole
        @role('administrator|hq-accountant|auditor')
            <li><a href="{{ route('accountants.index', \Crypt::encrypt(32)) }}"><i
                        class="icon icon-circle-o"></i>Accountants</a></li>
        @endrole
        @role('administrator|resident-pastor|hq-accountant|account-officer|auditor|location-admin')
            <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Income<i
                        class=" icon-angle-left  pull-right"></i></a>
                <ul class="treeview-menu">

                    @role('administrator|resident-pastor|hq-accountant|account-officer|location-admin')
                        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Location Income<i
                                    class=" icon-angle-left  pull-right"></i></a>
                            <ul class="treeview-menu">
                                @role('resident-pastor|administrator|auditor|account-officer|location-admin')
                                    <li><a href="{{ route('income.bylocations', \Crypt::encrypt(32)) }}"><i
                                                class="icon icon-circle-o"></i>Add Income</a></li>
                                    <!-- Remember to remove pastors from this function -->
                                    <li><a href="{{ route('income.my-location-daily-reports', \Crypt::encrypt(32)) }}"><i
                                                class="icon icon-circle-o"></i>Daily Income</a></li>
                                    <li><a href="{{ route('income.my-location-monthly-reports', \Crypt::encrypt(32)) }}"><i
                                                class="icon icon-circle-o"></i>Monthly Income</a></li>
                                    <li><a href="{{ route('income.location-summary', 'summary') }}"><i
                                                class="icon icon-circle-o"></i>Yearly Income</a></li>
                                    <li><a href="{{ route('income.location-summary', 'disbursement_income_summary') }}"><i
                                                class="icon icon-circle-o"></i>Disbursement Monthly Income</a></li>
                                    <li><a href="{{ route('income.location-summary', 'disbursement_summary') }}"><i
                                                class="icon icon-circle-o"></i>Disbursement of regular income</a></li>
                                    <li><a href="{{ route('income.location-summary', 'income_distribution') }}"><i
                                                class="icon icon-circle-o"></i>Location regular income Disbursement</a></li>
                                    <li><a href="{{ route('income.location-summary', 'recurrent_income') }}"><i
                                                class="icon icon-circle-o"></i>Recurrent Income</a></li>
                                    <li><a href="{{ route('income.location-summary', 'location_project') }}"><i
                                                class="icon icon-circle-o"></i>Location Project</a></li>
                                    <li><a href="{{ route('income.location-summary', 'location_reserve') }}"><i
                                                class="icon icon-circle-o"></i>Location Reserve</a></li>
                                    <li><a href="{{ route('income.location-summary', 'year_income_distribution') }}"><i
                                                class="icon icon-circle-o"></i>5 Years Income Distribution</a></li>
                                @endrole
                                {{--  <li><a href="{{route('income.location-summary', 'branch_hq_income') }}"><i class="icon icon-circle-o"></i>HQ Income</a></li>  --}}
                                @role('administrator|auditor')
                                    <li><a href="{{ route('income.loc-years-reports', \Crypt::encrypt(32)) }}"><i
                                                class="icon icon-circle-o"></i> 5 Years Income/Projection</a></li>
                                @endrole
                            </ul>
                        </li>

                    @endrole
                    @role('administrator|hq-accountant|auditor')
                        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Locations Summary<i
                                    class=" icon-angle-left  pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{ route('income.locationmonthlysummary', \Crypt::encrypt(32)) }}"><i
                                            class="icon icon-circle-o"></i>Monthly Income Summary</a></li>
                                <li><a href="{{ route('income.locationmonthlysummary2', 'income_summary') }}"><i
                                            class="icon icon-circle-o"></i>Monthly Income by Locations</a></li>
                                <li><a href="{{ route('income.locationmonthlysummary2', 'location_income') }}"><i
                                            class="icon icon-circle-o"></i>Locations Income Summary</a></li>
                                <li><a href="{{ route('income.locationmonthlysummary2', 'location_distribution') }}"><i
                                            class="icon icon-circle-o"></i>Locations Remittance to HQ</a></li>
                                <li><a href="{{ route('income.locationmonthlysummary2', 'location_hq_distribution') }}"><i
                                            class="icon icon-circle-o"></i>Locations HQ Distribution</a></li>
                                {{-- <li><a href="{{route('income.statement', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>Monthly Income</a></li> --}}
                                <li><a href="{{ route('income.cummulativestatement', \Crypt::encrypt(32)) }}"><i
                                            class="icon icon-circle-o"></i>Yearly Income</a></li>
                                <li><a href="{{ route('income.by-years-reports', \Crypt::encrypt(32)) }}"><i
                                            class="icon icon-circle-o"></i> 5 Years Income/Projection</a></li>
                            </ul>
                        </li>
                    @endrole
                </ul>
            @endrole
        </li>
        @role('administrator|hq-accountant|auditor|resident-pastor|account-officer|location-admin')
            <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Expenditures<i
                        class=" icon-angle-left  pull-right"></i></a>
                <ul class="treeview-menu">
                    @role('administrator|auditor|hq-accountant')
                        <li><a href="{{ route('expenditure.categories', \Crypt::encrypt(32)) }}"><i
                                    class="icon icon-circle-o"></i>Expenditure Caategories</a></li>
                        <li><a href="{{ route('expenditure.types', \Crypt::encrypt(32)) }}"><i
                                    class="icon icon-circle-o"></i>Expenditure Types</a></li>
                    @endrole
                    @role('resident-pastor|administrator|auditor|account-officer|hq-accountant|account-officer|location-admin')
                        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Location Expenditures<i
                                    class=" icon-angle-left  pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Capital Expenditures<i
                                            class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ route('expenditure.locations.capital', \Crypt::encrypt(32)) }}"><i
                                                    class="icon icon-circle-o"></i>Monthly Expenditure</a></li>
                                        <li><a href="{{ route('expenditure.capex.location.yearly', \Crypt::encrypt(32)) }}"><i
                                                    class="icon icon-circle-o"></i>Yearly Expenditure</a></li>
                                    </ul>

                                <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Recurrent
                                        Expenditures<i class=" icon-angle-left  pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="{{ route('expenditure.locations.recurrent', \Crypt::encrypt(32)) }}"><i
                                                    class="icon icon-circle-o"></i>Monthly Expenditure</a></li>
                                        <li><a
                                                href="{{ route('expenditure.recurrent.location.yearly', \Crypt::encrypt(32)) }}"><i
                                                    class="icon icon-circle-o"></i>Yearly Expenditure</a></li>
                                    </ul>
                                </li>
                        </li>
                    </ul>
                </li>
            @endrole
            @role('administrator|hq-accountant|auditor|resident-pastor|account-officer|location-admin')
                <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Location Project Expenditure<i
                            class=" icon-angle-left  pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('expenditure.getbylocation', auth()->user()->location_id) }}"><i
                                    class="icon icon-circle-o"></i>Expenditures</a></li>
                    </ul>
                </li>
            @endrole
            @role('administrator|auditor|hq-accountant')
                <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Expenditure Summary<i
                            class=" icon-angle-left  pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('expenditure.bylocations.capital', \Crypt::encrypt(32)) }}"><i
                                    class="icon icon-circle-o"></i>Monthly CapEx</a></li>
                        <li><a href="{{ route('expenditure.locations.yearly', 'capital') }}"><i
                                    class="icon icon-circle-o"></i>Yearly CapEx</a></li>
                        <li><a href="{{ route('expenditure.bylocations.recurrent', \Crypt::encrypt(32)) }}"><i
                                    class="icon icon-circle-o"></i>Monthly RecEx</a></li>
                        <li><a href="{{ route('expenditure.locations.yearly', 'recurrent') }}"><i
                                    class="icon icon-circle-o"></i>Yearly RecEx</a></li>
                    </ul>
                </li>
            @endrole
        </ul>
        </li>
    @endrole
    @role('administrator|resident-pastor|hq-accountant|account-officer|location-admin')
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Balance Sheet<i
                    class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                @role('resident-pastor|administrator|auditor|account-officer|location-admin')
                    <li><a href="{{ route('balance.bylocations', \Crypt::encrypt(32)) }}"><i
                                class="icon icon-circle-o"></i>Balance Sheet</a></li>
                @endrole
            </ul>
        </li>
    @endrole
    @role('administrator|hq-accountant|auditor|resident-pastor|account-officer|location-admin')
        <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Assets Management<i
                    class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                @role('administrator|auditor')
                    <li><a href="{{ route('assets.categories.index', \Crypt::encrypt(32)) }}"><i
                                class="icon icon-circle-o"></i>Asset Caategories</a></li>
                    <li><a href="{{ route('assets.types', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>Asset
                            Types</a></li>
                    <li><a href="{{ route('assets.assets', \Crypt::encrypt(32)) }}"><i
                                class="icon icon-circle-o"></i>Locations Assets</a></li>
                @endrole
                @role('resident-pastor|administrator|auditor|account-officer|location-admin')
                    <li class="treeview"><a href="#"><i class="icon icon-circle-o"></i>Location Assets<i
                                class=" icon-angle-left  pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('assets.location.index', \Crypt::encrypt(32)) }}"><i
                                        class="icon icon-circle-o"></i>Assets</a></li>
                        </ul>
                    </li>
                @endrole
            </ul>
        </li>
    @endrole
    {{--  @role('administrator|hq-accountant|auditor')
        <li><a href="{{route('accounts-reconsilation', \Crypt::encrypt(32)) }}"><i class="icon icon-circle-o"></i>Reconcile Accounts</a></li>
        @endrole
        @role('administrator|hq-accountant|auditor')
        <li><a href="{{route('accounts-hq-remitance') }}"><i class="icon icon-circle-o"></i>HQ Remitance</a></li>
        @endrole
        @role('administrator|hq-accountant|auditor')
        <li class="treeview">
            <a href="{{route('accounts-hq-remitance') }}"><i class="icon icon-circle-o"></i>Disburstments<i class=" icon-angle-left  pull-right"></i></a>
            <ul class="treeview-menu">
                @role('administrator')        
                <li>
                    <a href="{{route('recurrent-disburstments') }}"><i class="icon icon-circle-o"></i>Recurrent</a></li>
                <li>
                    <a href="{{route('location-disburstments') }}"><i class="icon icon-circle-o"></i>Location</a>
                </li>
                @endrole
            </ul>
        </li>
        @endrole  --}}
    </ul>

</div>
