<!-- Sidebar -->
<nav id="sidebar" class="sidebar-custom">
    <!-- Logo -->
    <div class="sidebar-logo">
        <div class="logo-wrapper">
            <img src="{{ asset('template/img/djp.png') }}" alt="Logo DJP" width="50">
        </div>
        <span class="sidebar-title">MODIS 101</span>
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column p-2">
        <li class="nav-item">
            <a class="nav-link active-link" href="#">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-car mr-2"></i> Kendaraan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-users mr-2"></i> Peminjam
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-calendar-check mr-2"></i> Peminjaman
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-file-alt mr-2"></i> Laporan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-cog mr-2"></i> Pengaturan
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <button onclick="toggleSidebar()"
            class="btn btn-light btn-block d-flex align-items-center justify-content-center" id="sidebarToggleBtn">
            <i class="fas fa-chevron-left toggle" id="toggleIcon"></i>
            <span class="ml-2" id="toggleText">Sembunyikan</span>
        </button>
    </div>
</nav>
