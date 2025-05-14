function toggleSidebar() {
    const sidebar = document.querySelector(".sidebar");
    const content = document.querySelector(".content-area");
    sidebar.classList.toggle("collapsed");
    content.classList.toggle("expanded");
}
