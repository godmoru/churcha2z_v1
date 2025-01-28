    

  @role('administrator|sys-admin')
        @include('layouts.sections.sidebar.inner.pill-home')
        @include('layouts.sections.sidebar.inner.pill-converts')
        @include('layouts.sections.sidebar.inner.pill-member')
        @include('layouts.sections.sidebar.inner.pill-location')
        @include('layouts.sections.sidebar.inner.pill-accounts')
        @include('layouts.sections.sidebar.inner.pill-settings')
        @include('layouts.sections.sidebar.inner.pill-class')
        @include('layouts.sections.sidebar.inner.pill-hrm')
        @include('layouts.sections.sidebar.inner.pill-pastorate')
        @include('layouts.sections.sidebar.inner.pill-user')
        @include('layouts.sections.sidebar.inner.pill-reports')
        @include('layouts.sections.sidebar.inner.pill-workforce')
        @include('layouts.sections.sidebar.inner.pill-dhc')
    @endrole

    @role('hq-minister')
        @include('layouts.sections.sidebar.inner.pill-pastorate')
        @include('layouts.sections.sidebar.inner.pill-user')
    @endrole
    @role('resident-pastor|assistant-pastor|hq-minister|location-admin')
    @include('layouts.sections.sidebar.inner.pill-pastorate')
    @include('layouts.sections.sidebar.inner.pill-accounts')
    @include('layouts.sections.sidebar.inner.pill-user')
    @include('layouts.sections.sidebar.inner.pill-settings')
    @endrole
    @role('auditor|administrator|resident-pastor|senior-pastor|hq-accountant|account-officer|location-admin')
        @include('layouts.sections.sidebar.inner.pill-accounts')
        @include('layouts.sections.sidebar.inner.pill-settings')
        @include('layouts.sections.sidebar.inner.pill-user')
    @endrole
    
    