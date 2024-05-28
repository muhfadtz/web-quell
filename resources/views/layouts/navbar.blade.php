<div class="navbar">
    <div class="navbar-icon ms-3" id="user"><a href="#" style="text-decoration: none;"><i class="fa-regular fa-user fs-3" style="color: #000;"></i></a></div>
    <div class="navbar-brand"><img src="../assets/3.png" alt="Logo" style="width: 35px;"></div>
    <div class="navbar-icons">
      <div class="navbar-icon" id="hamburger">
        <i class="fa-solid fa-bars-staggered" style="color: #000;"></i>
      </div>
    </div>
  </div>

  <div class="overlay" id="overlay" onclick="hideSidebar()"></div>

  <div class="sidebar" id="sidebar">
    <div class="row">
      <div class="col-4">
        <button class="btn btn-dark text-light ms-3" onclick="toggleDarkMode()"><i id="dark-mode-icon" class="fas fa-moon"></i></button>
      </div>
      <div class="col-4">
        <a href="/posts/list" class="btn btn-dark text-light"><i class="fa-solid fa-code-compare"></i></a>
      </div>
    </div>
    
    
    <hr>
      @auth
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <hr>
            <div class="dropdown-menu">
              @auth
                  @if(auth()->user()->is_admin)
                      <div>
                          <a class="dropdown-item" href="../dashboard" style="font-size: small">
                              <i class="fa-solid fa-gauge"></i> Dashboard
                          </a>
                      </div>
                      <div><hr class="dropdown-divider"></div>
                  @endif
                  <div>
                      <form action="/logout" method="post">
                          @csrf
                          <button type="submit" class="dropdown-item">
                              <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out
                          </button>
                      </form>
                  </div>
              @endauth
          </div>          
          </div>
          @else
          <a href="/login" class="btn btn-dark text-light mb-3" onclick="hideSidebar()"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a>
      @endauth
    <a href="/" onclick="hideSidebar()"> Home</a>
    <a href="/form" onclick="hideSidebar()"> QuellBot</a>
    <a href="{{ route('questions.index') }}">Community</a>
    {{-- <a href="#" onclick="hideSidebar()"><i class="fa-solid fa-right-to-bracket"></i> Sign in</a> --}}
  </div>

  <script>
    function hideAndToggle() {
      hideSidebar();
      showPopup();
    }
    
  </script>

  