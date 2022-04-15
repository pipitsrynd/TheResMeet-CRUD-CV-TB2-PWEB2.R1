<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/internal/dashboard">
                <img src="<?= base_url('assets/logo/internal-logo.png') ?>" class="img-fluid" alt="">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/internal/dashboard">TRM</a>
        </div>
        <ul class="sidebar-menu" style="margin-top:20%;">
            <li><a class="nav-link" href="/internal/dashboard"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-door-open"></i><span>Rooms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/internal/room_categories">Room Categories</a></li>
                    <li><a class="nav-link" href="/internal/rooms">Room Lists</a></li>
                    <li><a class="nav-link" href="/internal/room_images">Room Images</a></li>
                </ul>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="/internal/reservations"><i class="fa fa-users"></i>Reservation List</a>
                
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Actors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/internal/users">Users</a></li>
                </ul>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/internal/employees">Employees</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>