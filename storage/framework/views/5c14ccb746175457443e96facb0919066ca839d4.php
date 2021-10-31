<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Warehouses</h1>
    </div>

    <div class="card shadow mb-4 p-2">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="mb-4">
                <div class="">
                    <a class="btn btn-circle btn-success" href="<?php echo e(route('admin.add.warehouse')); ?>"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Owner</th>
                                <th>Region</th>
                                <th>District</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Carbon\Carbon::parse($warehouse->created_at)->format('dS M Y')); ?></td>
                                    <td><?php if($warehouse->user_id != null): ?><?php echo e($warehouse->user->name); ?><?php else: ?> N/A <?php endif; ?></td>
                                    <td><?php echo e($warehouse->region->name); ?></td>
                                    <td><?php echo e($warehouse->district->name); ?></td>
                                    <td><?php echo e($warehouse->longitude); ?></td>
                                    <td><?php echo e($warehouse->latitude); ?></td>
                                    <td>
                                        <?php if(auth()->user()->level == 1): ?>
                                            <?php if($warehouse->visible == 1): ?>
                                                <a class="btn btn-success" href="<?php echo e(route('admin.show.warehouse',$warehouse->id)); ?>"><i class="fa fa-thumbs-up"></i> Go live</a>
                                            <?php elseif($warehouse->visible == 0): ?>
                                                <p class="text-success">unpublished</p>
                                            <?php else: ?>
                                                <p class="text-success">Active</p>
                                            <?php endif; ?>
                                                <a class="btn btn-primary" href="<?php echo e(route('admin.view.warehouse.detail', $warehouse->id)); ?>">View</a>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/warehouse/view.blade.php ENDPATH**/ ?>