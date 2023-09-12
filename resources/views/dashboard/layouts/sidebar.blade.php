<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('dashboard/announcements') ? 'active' : '' }}" hrefaria-current="page"
                    href="/dashboard/announcements">
                    <span data-feather="file-text"></span>
                    Announcements
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/attendences">
                        <span data-feather="grid"></span>
                        Attendence
                    </a>
                </li>
            </ul>
        @endcan

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1">
            <span>Worker</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/absences">
                    <span data-feather="grid"></span>
                    Absence
                </a>
            </li>
        </ul>
    </div>
</nav>
