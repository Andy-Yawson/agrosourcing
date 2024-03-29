<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <img src="<?php echo e(asset('img/logo.jpg')); ?>" height="50px"/>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="<?php echo e(route('user.view.cart')); ?>">
                <i class="fa fa-shopping-cart"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-success badge-counter"><?php echo e(\Cart::getContent()->count()); ?></span>
            </a>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php echo e(auth()->user()->unReadNotifications->count()); ?></span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    All Notifications
                </h6>
                <?php if(auth()->user()->notifications->count()): ?>
                    <?php $__currentLoopData = auth()->user()->unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div>
                                <div class="small text-gray-500"><?php echo e(\Carbon\Carbon::parse($notification->created_at)->diffForHumans()); ?></div>
                                <span class="font-weight-bold"><?php echo e($notification->data["title"]); ?></span><br>
                                <span class="font-weight-normal"><?php echo e(\Illuminate\Support\Str::limit($notification->data["message"], 40, '...')); ?></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo e(route('user.mark.notify')); ?>">
                        Mark All As Read
                    </a>
                <?php else: ?>
                    <a class="dropdown-item text-center small text-gray-500" href="#">No notifications available</a>
                <?php endif; ?>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                               <?php echo e(auth()->user()->name); ?>

                            </span>
                <img class="img-profile rounded-circle" src="<?php echo e(asset('img/profile/'.auth()->user()->profile->pic)); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/partials/nav.blade.php ENDPATH**/ ?>