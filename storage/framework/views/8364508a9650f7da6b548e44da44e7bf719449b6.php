<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse Detail</h1>
    </div>

    <div class="card shadow mb-4 p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <p class="font-weight-light"><span class="font-weight-bold">Loaction:</span> <?php echo e($warehouse->region->name); ?></p>
                    <p class="font-weight-light"><span class="font-weight-bold">Type of warehouse:</span> <?php echo e($warehouse->type_of_warehouse); ?></p>
                    <p class="font-weight-light"><span class="font-weight-bold">Storage capacity:</span> <?php echo e($warehouse->storage_capacity); ?></p>
                    <p class="font-weight-light"><span class="font-weight-bold">Warehouse Certification:</span> <?php echo e($warehouse->warehouse_certification); ?></p>
                    <p class="font-weight-light"><span class="font-weight-bold">Created:</span> <?php echo e(\Illuminate\Support\Carbon::parse($warehouse->created_at)->diffForHumans()); ?></p>
                    <a class="w-75 btn btn-primary" href="<?php echo e(route('admin.warehouse.addCrop', $warehouse->id)); ?>">Add Crop</a>
                </div>
                <div class="col-6">
                    <div style="width: 50%">
                        <img src="<?php echo e(asset('img/warehouses/'.$warehouse->image)); ?>" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card shadow mb-4 p-3">
            <h3 class="lead">Crops stored in warehouse</h3>
            <div class="card-body">
                <a class="btn btn-circle btn-success" href="<?php echo e(route('admin.warehouse.addCrop',['warehouse'=>$warehouse->id])); ?>"><i class="fa fa-plus"></i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Created On</th>
                            <th>Crop</th>
                            <th>Organic</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $farmCrops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(\Carbon\Carbon::parse($crop->created_at)->format('dS M Y')); ?></td>
                                <td><?php echo e($crop->crop->name); ?></td>

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
                                    <?php if($crop->visible == 1): ?>
                                        <a class="btn btn-success" href="<?php echo e(route('admin.show.warehouse.crop',$crop->id)); ?>"><i class="fa fa-thumbs-up"></i> Go live</a>
                                    <?php elseif($crop->visible == 0): ?>
                                        <p class="text-success">unpublished</p>
                                    <?php else: ?>
                                        <p class="text-success">Active</p>
                                    <?php endif; ?>
                                    <a class="btn btn-success" href="<?php echo e(route('admin.warehouse.crop.detail', $crop->id)); ?>">Details</a>
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

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/warehouse/detail.blade.php ENDPATH**/ ?>