function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const icon = document.getElementById("toggleIcon");
    const text = document.getElementById("toggleText");
    const wrapper = document.getElementById("wrapper");

    sidebar.classList.toggle("collapsed");
    wrapper.classList.toggle("sidebar-collapsed");

    if (sidebar.classList.contains("collapsed")) {
        icon.classList.replace("fa-chevron-left", "fa-chevron-right");
        text.textContent = "";
    } else {
        icon.classList.replace("fa-chevron-right", "fa-chevron-left");
        text.textContent = "Sembunyikan";
    }
}
