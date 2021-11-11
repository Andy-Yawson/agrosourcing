<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Production Activities On Farms</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-outline-success" href="<?php echo e(route('user.add.crop')); ?>"><i class="fa fa-plus"></i> Add Crop</a>
                    <a class="btn btn-primary" href="<?php echo e(route('user.farm.animal',['id'=>request('farm')])); ?>"><i class="fa fa-plus"></i> Add Farm Animal</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Crop</th>
                                <th>Waste</th>
                                <th>Organic</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Carbon\Carbon::parse($crop->created_at)->format('dS M Y')); ?></td>
                                    <td><?php echo e($crop->crop->name); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $crop->crop->wastes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p><?php echo e($waste->name); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <?php if($crop->organic == 1): ?>
                                            <p class="text-success">Yes</p>
                                        <?php else: ?>
                                            <p class="text-danger">No</p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($crop->currency); ?><?php echo e($crop->price); ?></td>
                                    <td><?php echo e($crop->package_quantity); ?> <?php echo e($crop->quantity); ?></td>
                                    <td>
                                        <?php if($crop->visible == 0): ?>
                                            <a class="btn btn-success" href="<?php echo e(route('user.open.sale.farm', $crop->id)); ?>">Offer for sale</a>
                                        <?php elseif($crop->visible == 1): ?>
                                            <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                        <?php elseif($crop->visible == 2): ?>
                                            <a class="btn btn-danger" href="<?php echo e(route('user.close.sale.farm', $crop->id)); ?>">Remove from marketplace</a>
                                        <?php endif; ?>
                                        <a class="btn btn-success" href="<?php echo e(route('user.detail.farm.crop', $crop->id)); ?>">Details</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body shadow mt-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h4>All available animals on farm</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Created On</th>
                            <th>No of Stock</th>
                            <th>Min Order Qty</th>
                            <th>Price</th>
                            <th>Delivery Desc</th>
                            <th>Animal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\Carbon\Carbon::parse($animal->created_at)->format('dS M Y')); ?></td>
                                <td><?php echo e($animal->no_of_stock); ?></td>
                                <td><?php echo e($animal->min_order_qty); ?></td>
                                <td><?php echo e($animal->currency . ' ' . $animal->unit_price); ?></td>
                                <td><?php echo e($animal->delivery_desc); ?></td>
                                <td><?php echo e($animal->animal->name); ?></td>
                                <td>
                                    <?php if($animal->status == 0): ?>
                                        <a class="btn btn-success" href="<?php echo e(route('user.open.sale.animal', $animal->id)); ?>">Offer for sale</a>
                                    <?php elseif($animal->status == 1): ?>
                                        <a class="btn btn-warning text-white" disabled>Pending Approval</a>
                                    <?php elseif($animal->status == 2): ?>
                                        <a class="btn btn-danger" href="<?php echo e(route('user.close.sale.animal', $animal->id)); ?>">Remove from sale</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farm_crop/view.blade.php ENDPATH**/ ?>