<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="#">
    <!-- Contoh penggunaan Google Fonts di HTML -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <style>
      body {
        margin: 0;
        font-family: 'Montserrat', sans-serif;
        scroll-behavior: smooth;
      }

      .navbar {
        position: sticky;
        top: 0;
        z-index: 999;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 10px;
        border-bottom: 1px solid #e5e7eb;
      }

      .navbar-brand {
        font-size: 1.5em;
        font-weight: bold;
        color: #000;
      }

      .navbar-icons {
        display: flex;
      }

      .navbar-icon {
        margin-right: 15px;
        cursor: pointer;
        color: #000;
      }

      .sidebar {
        position: fixed;
        top: 0;
        right: -220px;
        width: 220px;
        height: 100%;
        background-color: #fff;
        padding-top: 50px;
        transition: 0.3s;
        color: #000;
        z-index: 1000;
        font-weight: bold;
        transition: ease-in-out 0.2s;
      }

      .sidebar a:not(.exclude-me) {
        padding: 12px;
        text-decoration: none;
        color: #000;
        display: block;
        transition: 0.2s;
        font-weight: bold;
        margin: 0 10px;
        border-radius: 10px;
      }

      .sidebar .card {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 90%;
        text-decoration: none;
        color: #000;
        display: block;
        transition: 0.2s;
        font-weight: bold;
        margin: 10px;
        border-radius: 10px;
      }

      .sidebar a:not(.exclude-me):hover {
        background-color: #e5e7eb;
        margin: 0 10px;
        border-radius: 10px;
      }

      .join:hover {
        background-color: #e5e7eb;
        margin: 10px;
        border-radius: 10px;
        color: #000;
      }

      .dark-mode {
        background-color: #1a1a1a;
        color: #fff;
      }

      .dark-mode .navbar {
        background-color: #1a1a1a;
        border-bottom: 1px solid #2c2c2c;
        color: #fff; /* Perubahan warna teks navbar pada dark mode */
      }

      .dark-mode .sidebar {
        background-color: #1a1a1a;
        color: #fff;
      }

      .dark-mode a {
        color: #fff;
      }

      .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
      }

      .dark-mode .card {
          background-color: #fff !important;
          color: #1a1a1a !important;
      }

      .dark-mode a {
          color: #ffffff !important;
      }

      .dark-mode .card h3,
      .dark-mode .card span,
      .dark-mode .card a {
          color: #1a1a1a !important;
      }

      #popup-container {
          display: none; /* Sembunyikan secara default */
          position: fixed;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 100%;
          background-color: #f1f1f1;
          padding: 20px;
          box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.1);
          border-top: 3px solid #000;
          overflow-y: auto;
          max-height: 85%;
          height: auto;
          transition: height 0.2s ease-in-out;
          border-top-left-radius: 25px; /* Sudut melengkung di atas kiri */
          border-top-right-radius: 25px; /* Sudut melengkung di atas kanan */
          margin: 0; /* Ganti margin menjadi 0 */
          z-index: 999;
      }

      #popup-handle {
        cursor: grab;
        width: 40px;
        height: 5px;
        background-color: #333;
        margin: 0 auto;
        margin-bottom: 10px;
        touch-action: none;
      }

      .lock-icon:not(.exclude-lock),
      .close-icon {
        font-size: larger;
        cursor: pointer;
      }

      @media screen and (max-width: 600px) {
        #popup-handle {
          margin-left: calc(
            50% - 20px
          ); /* Menengahkan handle pada tampilan mobile */
        }
      }

      .tab-container {
        display: flex;
        flex-direction: column;
        max-width: 100%;
        overflow-x: auto;
        align-items: center; /* Tambahkan ini untuk mengatur posisi tengah jika tidak ada overflow */
      }

      .tab-bar {
          display: flex;
          justify-content: center; /* Tambahkan ini untuk mengatur posisi tengah jika tidak ada overflow */
      }

      .tab {
          padding: 5px 10px;
          margin-right: 10px;
          cursor: pointer;
          border: 1px solid #ddd;
          border-radius: 25px;
      }

      /* Tambahkan gaya aktif untuk tab terpilih */
      .tab.active {
          background-color: #1a1a1a;
          color: white;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title></title>
  </head>
  <body>
    @include('layouts.navbar')

        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-3 mt-5">
                    @yield('container')
                </div>
            </div>    
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const tabs = document.querySelectorAll('.tab');
  
          tabs.forEach(tab => {
              tab.addEventListener('click', function(event) {
                  event.preventDefault(); // Mencegah perilaku default anchor link
  
                  // Lakukan navigasi ke URL
                  window.location.href = this.querySelector('a').getAttribute('href');
              });
          });
      });
    </script>
    <script>
      function hideSidebar() {
        document.getElementById("sidebar").style.right = "-220px";
        document.getElementById("overlay").style.display = "none";
      }

      function toggleDarkMode() {
        const body = document.body;
        body.classList.toggle("dark-mode");

        const logo = document.querySelector(".navbar-brand img");
        const darkModeIcon = document.getElementById("dark-mode-icon");
        const userIcon = document.getElementById("user");
        const hamburgerIcon = document.getElementById("hamburger");

        if (body.classList.contains("dark-mode")) {
          logo.src = "#";
          darkModeIcon.classList.remove("fa-moon");
          darkModeIcon.classList.add("fa-sun");
          userIcon.innerHTML = '<a href="#" style="text-decoration: none;"><i class="fa-regular fa-user fs-3" style="color: #fff;"></i></a>';
          hamburgerIcon.innerHTML = '<i class="fa-solid fa-bars-staggered" style="color: #fff;"></i>';
        } else {
          logo.src = "assets/revam.png";
          darkModeIcon.classList.remove("fa-sun");
          darkModeIcon.classList.add("fa-moon");
          userIcon.innerHTML = '<a href="#" style="text-decoration: none;"><i class="fa-regular fa-user fs-3" style="color: #1a1a1a;"></i></a>';
          hamburgerIcon.innerHTML = '<i class="fa-solid fa-bars-staggered" style="color: #000;"></i>';
        }
      }

      document.getElementById("hamburger").addEventListener("click", function () {
        document.getElementById("sidebar").style.right = "0";
        document.getElementById("overlay").style.display = "block";
      });

      document.getElementById("user").addEventListener("click", function () {
        // Add user icon click functionality here
      });

      document.addEventListener("click", function (event) {
        if (!event.target.closest(".navbar") && !event.target.closest(".sidebar")) {
          document.getElementById("sidebar").style.right = "-220px";
          document.getElementById("overlay").style.display = "none";
        }
      });
    </script>
    <script>
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
              e.preventDefault();

              document.querySelector(this.getAttribute('href')).scrollIntoView({
                  behavior: 'smooth'
              });
          });
      });
    </script>
    <script>
        /* script.js */
        const searchInput = document.querySelector(".search-textarea");
        const suggestions = document.querySelector(".suggestions");

        searchInput.addEventListener("input", () => {
            const query = searchInput.value.toLowerCase();

            const filteredSuggestions = Array.from(suggestions.querySelectorAll("li"))
                .filter(suggestion => suggestion.textContent.toLowerCase().includes(query));

            suggestions.style.display = filteredSuggestions.length > 0 ? "block" : "none";
        });
    </script>
    <script>
      let isDragging = false;
      let initialY;
      let yOffset = 0;
      let isLocked = false;

      const popupContainer = document.getElementById("popup-container");
      const popupHandle = document.getElementById("popup-handle");
      const lockIcon = document.getElementById("lock-icon");
      const lockText = document.getElementById("lock-text");

      popupHandle.addEventListener("mousedown", startDrag);
      document.addEventListener("mouseup", endDrag);
      document.addEventListener("mousemove", drag);

      popupHandle.addEventListener("touchstart", startDrag);
      document.addEventListener("touchend", endDrag);
      document.addEventListener("touchmove", drag);

      function startDrag(e) {
        isDragging = true;
        initialY = (e.clientY || e.touches[0].clientY) - yOffset;
        popupHandle.style.cursor = "grabbing";

        // Periksa apakah perangkat mendukung sentuhan
        if (e.type === "touchstart") {
          initialY = e.touches[0].clientY - yOffset;
        }

        // Tambahkan event listener untuk menghindari seleksi teks selama pergerakan mouse atau sentuhan
        document.addEventListener("selectstart", disableSelection);
      }

      function endDrag() {
        isDragging = false;
        popupHandle.style.cursor = "grab";
        // Hapus event listener setelah selesai menarik
        document.removeEventListener("selectstart", disableSelection);
      }

      function drag(e) {
        if (isDragging && !isLocked) {
          const newY = (e.clientY || e.touches[0].clientY) - initialY;
          const windowHeight = window.innerHeight;

          if (newY < 0) {
            // Jika pergerakan mouse ke atas, set tinggi popup sesuai dengan pergerakan
            popupContainer.style.transition = "none";
            popupContainer.style.height = `${windowHeight - newY}px`;
          } else if (newY > 0) {
            // Jika pergerakan mouse ke bawah, set tinggi popup sesuai dengan pergerakan
            popupContainer.style.transition = "none";
            popupContainer.style.height = `${windowHeight - newY}px`;
          }

          yOffset = (e.clientY || e.touches[0].clientY) - initialY;
        }
      }

      // Fungsi untuk mencegah seleksi teks selama pergerakan mouse atau sentuhan
      function disableSelection(e) {
        e.preventDefault();
      }

      // Fungsi untuk mengatur tinggi pop-up ke max-height (85%) saat pertama kali tampil
      function setDefaultHeight() {
        popupContainer.style.height = "85%";
      }

      // Fungsi untuk menampilkan pop-up
      function showPopup() {
        popupContainer.style.display = "block";
      }

      // Panggil fungsi setDefaultHeight saat dokumen selesai dimuat
      window.onload = setDefaultHeight;

      // Fungsi untuk mengunci atau membuka tinggi pop-up
      function toggleLock() {
        isLocked = !isLocked;
        if (isLocked) {
          lockIcon.innerHTML = '<i class="fa-solid fa-lock"></i>';
        } else {
          lockIcon.innerHTML = '<i class="fa-solid fa-unlock"></i>';
        }
      }

      // Fungsi untuk menutup pop-up
      function closePopup() {
        popupContainer.style.display = "none";
      }
    </script>
  </body>
</html>
