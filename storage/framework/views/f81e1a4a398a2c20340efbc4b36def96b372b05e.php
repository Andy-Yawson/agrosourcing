<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Available Farms</h1>
    </div>

    <div class="card shadow mb-4 p-2">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="mb-4">
                <div class="">
                    <a class="btn btn-circle btn-success" href="<?php echo e(route('admin.add.farm')); ?>"><i class="fa fa-plus"></i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>longitude</th>
                                <th>latitude</th>
                                <th>size</th>
                                <th>region</th>
                                <th>Community</th>
                                <th>Farm Code</th>
                                <th>Farm Crop</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $farms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $farm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Carbon\Carbon::parse($farm->created_at)->format('dS M Y')); ?></td>
                                    <td><?php echo e($farm->longitude); ?></td>
                                    <td><?php echo e($farm->latitude); ?></td>
                                    <td><?php echo e($farm->size); ?></td>
                                    <td><?php echo e($farm->region->name); ?></td>
                                    <td><?php echo e($farm->community == null ? "N/A" : $farm->community); ?></td>
                                    <td><?php echo e($farm->code); ?></td>
                                    <td><a href="<?php echo e(route('admin.view.farm.crop',$farm->id)); ?>" class="btn btn-primary">View</a></td>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/farm/view.blade.php ENDPATH**/ ?>