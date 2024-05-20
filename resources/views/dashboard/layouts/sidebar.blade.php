<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary ">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">revam.</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>HOME</span></h6>
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}" style="{{ Request::is('dashboard') ? 'color: #000; font-weight: bold;' : 'color: #6c757d;' }}" aria-current="page" href="/dashboard">
                      <svg class="bi"><use xlink:href="#house-fill"/></svg>
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : '' }}" style="{{ Request::is('dashboard/posts*') ? 'color: #000; font-weight: bold;' : 'color: #6c757d;' }}" href="/dashboard/posts">
                      <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                      My Post
                  </a>
              </li>
          </ul>
        
          {{-- @can('admin')     --}}
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>ADMINISTRATOR</span></h6>
             <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}" style="{{ Request::is('dashboard/categories*') ? 'color: #000; font-weight: bold;' : 'color: #6c757d;' }}" href="/dashboard/categories">
                        <i class="fa-solid fa-table-cells-large"></i>
                        Post Categories
                    </a>
                </li>
            </ul>
          {{-- @endcan --}}

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" style="{{ Request::is('settings') ? 'color: #000; font-weight: bold;' : 'color: #6c757d;' }}" href="#">
                      <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
                      Settings
                  </a>
              </li>
              <li class="nav-item">
                  <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="nav-link d-flex align-items-center gap-2 bg-white border-0" style="color: #000;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</button>
                  </form>
              </li>
          </ul>
      </div>
  </div>
</div>
