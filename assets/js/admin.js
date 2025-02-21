document.addEventListener("DOMContentLoaded", function () {
    let menuItems = document.querySelectorAll(".admin-sidebar ul li");
    
    menuItems.forEach(item => {
        item.addEventListener("click", function () {
            menuItems.forEach(i => i.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
