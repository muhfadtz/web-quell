function hideSidebar() {
    document.getElementById("sidebar").style.right = "-220px";
    document.getElementById("overlay").style.display = "none"; // Sembunyikan lapisan semitransparan
}

document.getElementById("hamburger").addEventListener("click", function () {
    document.getElementById("sidebar").style.right = "0";
    document.getElementById("overlay").style.display = "block"; // Tampilkan lapisan semitransparan
});

document.getElementById("user").addEventListener("click", function () {
    // Add user icon click functionality here
});

document.addEventListener("click", function (event) {
    if (!event.target.closest(".navbar") && !event.target.closest(".sidebar")) {
        document.getElementById("sidebar").style.right = "-220px";
        document.getElementById("overlay").style.display = "none"; // Sembunyikan lapisan semitransparan
    }
});
