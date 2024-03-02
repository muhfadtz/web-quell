<div class="navbar">
    <div class="navbar-icon ms-3" id="user"><a href="#" style="text-decoration: none;"><i class="fa-regular fa-user fs-3" style="color: #000;"></i></a></div>
    <div class="navbar-brand"><img src="#" alt="Logo" style="width: 35px;"></div>
    <div class="navbar-icons">
      <div class="navbar-icon" id="hamburger">
        <i class="fa-solid fa-bars-staggered" style="color: #000;"></i>
      </div>
    </div>
  </div>

  <div class="overlay" id="overlay" onclick="hideSidebar()"></div>

  <div class="sidebar" id="sidebar">
    <button class="btn btn-dark text-light ms-3" onclick="toggleDarkMode()"><i id="dark-mode-icon" class="fas fa-moon"></i></button>
    <button class="btn btn-dark text-light ms-3"><i class="fa-solid fa-headset"></i></button>
    <hr>
      {{-- @auth --}}
          {{-- <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
              Name
          </a>
          <hr>
          <div class="dropdown-menu">
              <div><a class="dropdown-item" href="../dashboard" style="font-size: small"><i class="fa-solid fa-gauge"></i> Dashboard</a></div>
              <div><hr class="dropdown-divider"></div>
              <div>
              <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</button>
              </form>
              </div>
          </div>
          </div> --}}
          {{-- @else --}}
          <a href="/login" class="btn btn-dark text-light mb-3" onclick="hideSidebar()"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a>
      {{-- @endauth --}}
    <a href="#" onclick="hideSidebar()"> Home</a>
    <a href="#" onclick="hideAndToggle()"> QuellBot &nbsp;<i class="fa-solid fa-lock exclude-lock" style="font-size: 10px; background-color: #1a1a1a; color: #fff; border-radius: 5px; padding: 5px;"></i></a>
    {{-- <a href="#" onclick="hideSidebar()"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a> --}}
    <div class="card text-light" style="background-color: #1a1a1a">
      <div class="card-body">
          <p class="fw-light" style="font-size: smaller"><span class="fw-bold" style="font-size: medium">Try Pro</span><br>Upgrade for expand in more scale<br><button class="border-0 fw-bold mt-2 px-2" style="border-radius: 10px"><i class="fa-solid fa-arrow-up-right-from-square"></i><a href="#" class="exclude-me" style="text-decoration: none; color: inherit;"> Learn More</a></button></p>
      </div>
    </div> 
  </div>

  <script>
    function hideAndToggle() {
      hideSidebar();
      showPopup();
    }
  </script>