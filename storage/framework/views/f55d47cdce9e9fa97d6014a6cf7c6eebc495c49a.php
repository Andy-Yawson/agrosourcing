<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">More Info</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="mb-4 p-5">
                <div class="row">
                    <div class="col-6">
                        <p class="font-weight-light"><span class="font-weight-bold">Price</span>: <?php echo e($farmCrop->currency.' '.$farmCrop->price); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Quantity</span>: <?php echo e($farmCrop->package_quantity . '/' . $farmCrop->quantity); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Organic</span>: <?php echo e($farmCrop->organic == 0 ? 'No':'Yes'); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Crop Variety</span>: <?php echo e($farmCrop->crop_variety); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Moisture Content</span>: <?php echo e($farmCrop->moisture_content); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Available to Start</span>: <?php echo e(\Carbon\Carbon::parse($farmCrop->available_start)->format('dS M Y')); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">End Availability</span>: <?php echo e(\Carbon\Carbon::parse($farmCrop->available_end)->format('dS M Y')); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Stock Available</span>: <?php echo e($farmCrop->total_stock_available . '/ ' . $farmCrop->total_stock_available_unit); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Minimum Quantity</span>: <?php echo e($farmCrop->minimum_order_quantity . '/ ' . $farmCrop->minimum_order_quantity_unit); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Delivery cost desc</span>: <?php echo e($farmCrop->delivery_cost_description); ?></p>
                        <p class="font-weight-light"><span class="font-weight-bold">Created</span>: <?php echo e(\Carbon\Carbon::parse($farmCrop->created_at)->diffForHumans()); ?></p>
                    </div>
                    <div class="col-6">
                        <img src="<?php echo e(asset('img/farms/'.$farmCrop->image)); ?>" alt="crop image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farm_crop/detail.blade.php ENDPATH**/ ?>