<nav class="sidebar close bg-white">
    <header class="d-flex align-items-center justify-content-between px-3 py-2">
        <div class="d-flex align-items-center">
            <i class='bx bxs-dashboard fs-4 text-primary'></i>
            <span class="ms-2 fw-bold logo-text text-dark">MyApp</span>
        </div>
        <i class='bx bx-chevron-right toggle text-dark'></i>
    </header>

    <ul class="nav flex-column menu-links px-2">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="/dashboard">
                <i class='bx bx-home-alt icon me-2'></i>
                <span class="text nav-text">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center" href="#">
                <i class='bx bx-car icon me-2'></i>
                <span class="text nav-text">Kendaraan</span>
            </a>
        </li>
        <!-- Tambahkan item lain di sini -->
    </ul>

    <div class="bottom-content mt-auto px-2">
        <a class="nav-link d-flex align-items-center" href="#">
            <i class='bx bx-log-out icon me-2'></i>
            <span class="text nav-text">Logout</span>
        </a>
    </div>
</nav>

<script>
    const body = document.querySelector('body');
    const sidebar = document.querySelector('.sidebar');
    const toggle = document.querySelector('.toggle');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('close');
    });
</script>
