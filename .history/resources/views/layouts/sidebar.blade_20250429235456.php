<!-- Sidebar -->
<nav class="bg-white text-dark shadow w-25" style="min-height: 100vh;">
    <!-- Logo -->
    <div class="p-3 border-bottom d-flex align-items-center">
        <div class="text-white p-2 rounded">
            <img src="{{ asset('template/img/djp.png') }}" alt="Logo DJP" width="50">
            {{-- <i class="fas fa-car fa-lg"></i> --}}
        </div>
        <span class="ml-3 h5 font-weight-bold mb-0">MODIS 101</span>
    </div>

    <!-- Navigation -->
    <ul class="nav flex-column p-2">
        <li class="nav-item">
            <a class="nav-link text-white bg-primary rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-car mr-2"></i> Kendaraan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-users mr-2"></i> Peminjam
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-calendar-check mr-2"></i> Peminjaman
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-file-alt mr-2"></i> Laporan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark rounded mb-1 d-flex align-items-center" href="#">
                <i class="fas fa-cog mr-2"></i> Pengaturan
            </a>
        </li>
    </ul>

    <div class="p-3 border-top text-center">
        <button onclick="toggleSidebar()"
            class="btn btn-light btn-block d-flex align-items-center justify-content-center" id="sidebarToggleBtn">
            <i class="fas fa-chevron-left" id="toggleIcon"></i>
            <span class="ml-2" id="toggleText">Sembunyikan</span>
        </button>
    </div>

</nav>
