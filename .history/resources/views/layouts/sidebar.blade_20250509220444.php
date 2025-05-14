<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    {{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"> --}}

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('template/img/djp.png') }}" alt="Logo DJP" width="50">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">MODIS101</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('kendaraan*') ? 'active' : '' }}">
        <a class="nav-link" href="/kendaraan">
            <i class="fas fa-fw fa-car"></i>
            <span>Kendaraan</span></a>
    </li>

    <li class="nav-item {{ request()->is('peminjaman*') ? 'active' : '' }}">
        <a class="nav-link" href="/peminjaman">
            <i class="fas fa-fw fa-calendar-days"></i>
            <span>Peminjaman</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-auto">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
