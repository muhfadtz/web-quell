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

      /* style.css */
      #summarizeForm {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 22px;
            border: 1px solid #1a1a1a;
            padding: 10px;
        }

      .search-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 22px;
            border: 1px solid #1a1a1a;
        }

        .search-textarea {
            align-items: center;
            display: flex;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            resize: none;
            height: auto; /* atau height: 100%; */
            overflow-y: hidden; /* atau overflow-y: auto; sesuai kebutuhan */
        }

        .search-button {
          align-items: center;
            display: flex;
            background-color: #255282;
            color: #fff;
            border: none;
            outline: none;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.2s;
        }

        .search-button:hover {
            background-color: #4384c9
        }

        .fa-copy:hover, .fa-rotate-right:hover {
          background-color: #bababa;
          border-radius: 50%;
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
                <div class="col-lg-6 mx-auto p-3" style="margin-top: 120px;">
                    @yield('container')
                </div>
            </div>    
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
  </body>
</html>
