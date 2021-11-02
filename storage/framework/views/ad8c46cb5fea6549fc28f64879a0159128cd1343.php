<?php $__env->startSection('web-content'); ?>
    <main class="pt-5">
        <section class="section-pagetop bg-bread p-5">
            <div class="container">
                <div class="m-auto">
                    <h2 class="font-weight-light text-white mt-5">All Products</h2>
                </div>
            </div>
        </section>
        <!-- About Us-->
        <section class="pt-5 pb-5 mt-5 mb-5" id="about-us">
            <div class="container">
                <div class="">
                    <?php if(count($farms) > 0 or count($warehouses) > 0 or count($products) > 0): ?>
                        <div class="row">
                            <?php $__currentLoopData = $farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="<?php echo e(asset('img/farms/'.$farm->image)); ?>" alt="warehouse image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-success"></i> Farm</h5>
                                            <h6 class="card-text"><?php echo e($farm->farm->user->name); ?>'s Farm</h6>
                                            <p class="card-text">Crop Type: <?php echo e($farm->crop->name); ?></p>
                                            <p class="card-text">Farm Size: <?php echo e($farm->size); ?></p>
                                            <p class="card-text">Price: <?php echo e($farm->currency); ?><?php echo e($farm->price); ?> per <?php echo e($farm->package_quantity); ?><?php echo e($farm->quantity); ?></p>
                                            <a href="<?php echo e(route('user.view.orderList.detail',['id'=>$farm->id,'type'=>'farm'])); ?>" class="btn btn-circle btn-primary"><i class="fa fa-cart-plus"></i></a>
                                            <p class="card-text"><small class="text-muted">Last updated <?php echo e(\Carbon\Carbon::parse($farm->updated_at)->diffForHumans()); ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="https://via.placeholder.com/150" alt="warehouse image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-warning"></i> Warehouse Crop</h5>
                                            <h6 class="card-text">
                                                <?php if($crop->user_id != null): ?>
                                                    <?php echo e($crop->user->name); ?>'s Warehouse
                                                    <?php if($crop->user->profile->company !== null): ?> - <?php echo e($crop->user->profile->company); ?><?php endif; ?>
                                                <?php else: ?>
                                                    Agrosourcing Support
                                                <?php endif; ?>
                                            </h6>
                                            <p class="card-text">Variety: <?php echo e($crop->crop_variety); ?></p>
                                            <p class="card-text">Price: <?php echo e($crop->currency . $crop->price); ?> </p>
                                            <p class="card-text">Quantity: <?php echo e($crop->package_quantity . ' ' . $crop->quantity); ?> </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 mb-3">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="<?php echo e(asset('img/products/'.$product->image)); ?>" alt="product image" height="200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fa fa-dot-circle text-info"></i> Processing Company</h5>
                                            <h6 class="card-text"><?php echo e($product->name); ?></h6>
                                            <p class="card-text"><?php echo e($product->product->region->name); ?></p>
                                            <p class="card-text">Material(s): <?php echo e($product->materials); ?> </p>
                                            <p class="card-text">Price: <?php echo e($product->currency); ?><?php echo e($product->price); ?> per <?php echo e($product->quantity); ?> </p>
                                            <a href="<?php echo e(route('user.view.orderList.detail',['id'=>$product->id,'type'=>'product'])); ?>" class="btn btn-circle btn-primary"><i class="fa fa-cart-plus"></i></a>
                                            <p class="card-text"><small class="text-muted">Last updated <?php echo e(\Carbon\Carbon::parse($product->updated_at)->diffForHumans()); ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <h3 class="font-weight-light">No items available to order</h3>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.website-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/website/marketplace.blade.php ENDPATH**/ ?>