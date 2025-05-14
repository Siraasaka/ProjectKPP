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

const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".searchBtn"),
    modeSwitch = body.querySelector(".modeSwitch"),
    modeText = body.querySelector("modeTexte");
