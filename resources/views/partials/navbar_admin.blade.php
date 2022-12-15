<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard')) active @endif" aria-current="page" href="/dashboard">
            <i  class="bi bi-house-door"></i>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard/blog*')) active @endif" href="/dashboard/blog">
            <i class="bi bi-stickies"></i>
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard/komentar')) active @endif" href="/dashboard/komentar">
            <i class="bi bi-chat-left-dots"></i>
            Komentar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard/pengumuman*')) active @endif" href="/dashboard/pengumuman">
            <i class="bi bi-info-circle"></i>
            Pengumuman
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard/pengurus*')) active @endif" href="/dashboard/pengurus">
            <i class="bi bi-people"></i>
            Pengurus
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::is('dashboard/user*')) active @endif" href="/dashboard/user">
            <i class="bi bi-person-circle"></i>
            User
          </a>
        </li>
      </ul>

      
      </ul>
    </div>
  </nav>