<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Agro Sourcing</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.welcome') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Activities
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.profile') }}"
           data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    @foreach(auth()->user()->roles as $role)
        @if($role->id == 1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Manage Farm</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.view.farm') }}">View Farm</a>
                        <a class="collapse-item" href="{{ route('user.add.farm') }}">Add Farm</a>
                        <a class="collapse-item" href="{{ route('user.add.crop') }}">Add Crop</a>
                    </div>
                </div>
            </li>

        @elseif($role->id == 2)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFunding" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Processing Company</span>
                </a>
                <div id="collapseFunding" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.add.site') }}">Add Processing Site</a>
                        <a class="collapse-item" href="{{ route('user.view.site') }}">View Processing Site</a>
                        <a class="collapse-item" href="{{ route('user.add.product') }}">Add Product</a>
                    </div>
                </div>
            </li>
        @elseif($role->id == 3)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAggregator" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Manage Warehouses</span>
                </a>
                <div id="collapseAggregator" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.add.warehouse') }}">Add Warehouse</a>
                        <a class="collapse-item" href="{{ route('user.view.warehouse') }}">View Warehouse</a>
                    </div>
                </div>
            </li>
        @elseif($role->id == 4)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTrucker" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Trucker</span>
                </a>
                <div id="collapseTrucker" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('user.add.trucker') }}">Add Truck</a>
                        <a class="collapse-item" href="{{ route('user.view.trucker') }}">View Trucks</a>
                    </div>
                </div>
            </li>
        @endif
    @endforeach
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-shopping-cart"></i>
            <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.view.orderList') }}">Place Order</a>
                <a class="collapse-item" href="{{ route('user.view.cart') }}">View Carts</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#searchModal">
            <i class="fa fa-map"></i>
            <span>Access Map</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
