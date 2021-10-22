<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3 shadow-sm bg-white">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('web.home')); ?>">
            <img src="<?php echo e(asset('web/img/agro.jpg')); ?>" alt="" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.about')); ?>">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.sourcemap')); ?>">SourceMap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.upcycling')); ?>">UpCycling</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.research')); ?>">Our Research</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.contact')); ?>">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('web.marketplace')); ?>">Marketplace</a>
                </li>
                <?php if(auth()->check()): ?>
                    <li class="nav-item">
                        <a class="btn btn-primary pl-4 pr-4" href="<?php echo e(route('user.welcome')); ?>">Dashboard</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary pl-4 pr-4" href="<?php echo e(route('user.login')); ?>">Login <i class="fa fa-user-circle"></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/website/partials/_nav.blade.php ENDPATH**/ ?>