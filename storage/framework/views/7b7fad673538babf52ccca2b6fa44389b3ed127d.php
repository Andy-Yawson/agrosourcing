<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Administrator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Farm</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.add.farm')); ?>">Add Farm</a>
                <a class="collapse-item" href="<?php echo e(route('admin.view.farm')); ?>">View Farm</a>
                <a class="collapse-item" href="<?php echo e(route('admin.add.farm.crop')); ?>">Add Crop</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFunding" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Processing Company</span>
        </a>
        <div id="collapseFunding" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.add.product')); ?>">Add Processing Site</a>
                <a class="collapse-item" href="<?php echo e(route('admin.view.product')); ?>">View Processing Site</a>
                <a class="collapse-item" href="<?php echo e(route('admin.add.processing.product')); ?>">Add Product</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAggregator" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Warehouse</span>
        </a>
        <div id="collapseAggregator" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.add.warehouse')); ?>">Add Warehouse</a>
                <a class="collapse-item" href="<?php echo e(route('admin.view.warehouse')); ?>">View Warehouse</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.view.information')); ?>">Information System</a>
                <?php if(auth()->user()->level == 1): ?>
                    <a class="collapse-item" href="<?php echo e(route('admin.view.data-users')); ?>">Management Accounts</a>
                    <a class="collapse-item" href="<?php echo e(route('admin.view.users')); ?>">View Users</a>
                <?php endif; ?>
            </div>
        </div>
    </li>
    <?php if(auth()->user()->level == 1): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.roles')); ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Roles</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.districts')); ?>">
                <i class="fas fa-fw fa-landmark"></i>
                <span>Districts</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.add.crop')); ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Crop</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.add.waste')); ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Waste</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTruck" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Trucks</span>
            </a>
            <div id="collapseTruck" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo e(route('trucks.index')); ?>">Add Truck</a>
                    <a class="collapse-item" href="<?php echo e(route('admin.trucker.view')); ?>">Manage Truckers</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.orders.view')); ?>">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Orders</span></a>
        </li>
    <?php endif; ?>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#searchModal">
            <i class="fa fa-map"></i>
            <span>Access Map</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnimals" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-dog"></i>
            <span>Manage Animals</span>
        </a>
        <div id="collapseAnimals" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('admin.add.animal')); ?>">Add new animal</a>
                <a class="collapse-item" href="<?php echo e(route('admin.view.farm.animal')); ?>">View Farm Animals</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Tables -->
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
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/partials/menu_sidebar.blade.php ENDPATH**/ ?>