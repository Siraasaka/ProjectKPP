<!-- Sidebar -->
{{-- <nav id="sidebar" class="bg-white text-dark shadow" style="min-height: 100vh;">
    <!-- isi sidebar kamu -->
</nav> --}}

<nav id="sidebar" class="bg-white text-dark shadow" style="min-height: 100vh;">
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

    <!-- Collapse Button -->
    <div class="p-4 border-t border-gray-200">
        <button onclick="toggleSidebar()" class="flex items-center justify-center p-2 rounded-lg hover:bg-gray-100">
            <i class="fas fa-chevron-left"></i>
            <span class="sidebar-text ml-3">Sembunyikan</span>
        </button>
    </div>
    </div>
</nav>
