<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Crops</h1>
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="card shadow mb-4">
                <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage All Crops</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Reg Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($crop->name); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($crop->created_at)->format('dS M Y H:iA')); ?></td>
                                    <td>
                                       <a class="btn btn-circle btn-danger" href="<?php echo e(route('admin.delete.crop',$crop->id)); ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <div class="card shadow p-4">
                <h5 class="font-weight-light mb-3">Add New Crop</h5>
                <form action="<?php echo e(route('admin.post.crop')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Crop Name</label>
                        <input type="text" name="crop" class="form-control" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Crop <i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/crop/add.blade.php ENDPATH**/ ?>