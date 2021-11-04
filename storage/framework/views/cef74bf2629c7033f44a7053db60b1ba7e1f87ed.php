<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Animal Information</h1>
    </div>



    <div class="card shadow mb-4 p-5">
        <h5 class="font-weight-lighter">PROVIDE FARM ANIMAL DETAILS</h5>
        <p class="font-weight-normal">Choose an animal type from the list.</p>
        <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-body">
            <form action="<?php echo e(route('user.farm.animal.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-4">
                    <label for="">Select animal from list*</label>
                    <select class="form-control" name="animal_id">
                        <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($animal->id); ?>"><?php echo e($animal->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Number of stock (Population)*</label>
                            <input type="number" class="form-control" name="no_of_stock" value="<?php echo e(old('no_of_stock')); ?>" min="1" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Minimum Order Quantity*</label>
                            <input type="number" class="form-control" name="min_order_qty" value="<?php echo e(old('min_order_qty')); ?>" min="1" required>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Select currency from list*</label>
                                    <select class="form-control" name="currency">
                                        <option value="GHS">GHS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Unit Price*</label>
                                    <input type="number" class="form-control" name="unit_price" value="<?php echo e(old('unit_price')); ?>" min="1" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Animal's Pic*</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Delivery Cost Description</label>
                    <textarea class="form-control" name="delivery_desc"></textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add Farm Animal <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farmer/animal_create.blade.php ENDPATH**/ ?>