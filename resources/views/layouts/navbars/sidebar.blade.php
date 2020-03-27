<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="img-profile rounded-circle" src="https://source.unsplash.com/OApHds2yEGQ/40x40"/>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Budgeteer') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Accounts
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('accounts.index') !!}">
            <i class="fas fa-file-invoice-dollar fa-fw"></i>
            <span>Accounts</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('balances.create') !!}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Balances</span></a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{!! route('bills.index') !!}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Bills</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('loans.index') !!}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Loans</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('incomes.index') !!}">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
            <span>Other Income</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{!! route('selfAssessments.index') !!}">
            <i class="fas fa-fw fa-landmark"></i>
            <span>Self Assessments</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->