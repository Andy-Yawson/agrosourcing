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
                    <div class="mb-3">
                        <a class="btn btn-success" href="<?php echo e(route('user.add.farm')); ?>"><i class="fa fa-plus"></i> Add Farm</a>
                        <a class="btn btn-outline-success" href="<?php echo e(route('user.add.crop')); ?>"><i class="fa fa-plus"></i> Add Crop</a>
                        <a class="btn btn-primary" href="<?php echo e(route('user.farm.animal')); ?>"><i class="fa fa-plus"></i> Add Farm Animal</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Created On</th>
                                <th>Longitude</th>
                                <th>Latitude</th>
                                <th>Size</th>
                                <th>Region</th>
                                <th>Community</th>
                                <th>Code</th>
                                <th>Farm Crops</th>
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
                                    <td><a href="<?php echo e(route('user.view.farm.crop',$farm->id)); ?>" class="btn btn-primary">View</a></td>
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

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farmer/view.blade.php ENDPATH**/ ?>