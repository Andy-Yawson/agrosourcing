<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Farms</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a class="btn btn-circle btn-success" href="<?php echo e(route('user.add.crop')); ?>"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farm_crop/view.blade.php ENDPATH**/ ?>