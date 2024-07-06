<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="mt-3 nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Plan Set</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="components-alerts.html">
                  <i class="bi bi-circle"></i><span>Add Task</span>
                </a>
              </li>
              <li>
                <a href="components-accordion.html">
                  <i class="bi bi-circle"></i><span>Task List</span>
                </a>
              </li>

            </ul>
          </li><!-- End Components Nav -->


    </ul>

</aside>
