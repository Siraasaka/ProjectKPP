function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const icon = document.getElementById("toggleIcon");
    const text = document.getElementById("toggleText");

    sidebar.classList.toggle("hidden");

    if (sidebar.classList.contains("hidden")) {
        icon.classList.replace("fa-chevron-left", "fa-chevron-right");
        text.textContent = "Tampilkan";
    } else {
        icon.classList.replace("fa-chevron-right", "fa-chevron-left");
        text.textContent = "Sembunyikan";
    }
}
