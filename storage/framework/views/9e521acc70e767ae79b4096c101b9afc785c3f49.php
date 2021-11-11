<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Farm Animals</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card shadow mb-4">
                <div class="card-body">
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
                                        <?php if($animal->status == 1): ?>
                                            <a class="btn btn-warning" href="<?php echo e(route('admin.publish.animal', $animal->id)); ?>">Publish to market</a>
                                        <?php elseif($animal->status == 0): ?>
                                            <p class="text-info">Pending</p>
                                        <?php elseif($animal->status == 2): ?>
                                            <p class="text-success">Published</p>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/farm/view_animals.blade.php ENDPATH**/ ?>