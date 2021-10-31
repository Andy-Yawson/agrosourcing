<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Farm Crop</h1>
    </div>



    <div class="card shadow mb-4 p-5">
        <h5 class="font-weight-lighter">PROVIDE FARM DETAILS</h5>
        <p class="font-weight-normal">Choose a crop type, the wastes will be generated for you.</p>
        <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-body">
            <form action="<?php echo e(route('user.warehouse.addCrop.store',['warehouse'=>$id])); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="">Select Crop*</label>
                    <select name="crop" class="form-control">
                        <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($crop->id); ?>"><?php echo e($crop->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label for="">Currency*</label>
                        <select name="currency"  class="form-control">
                            <option value="GHS">GHS</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Price*</label>
                            <input type="number" class="form-control" name="price" value="<?php echo e(old('price')); ?>" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Package Quantity*</label>
                            <input type="number" class="form-control" name="package_quantity" value="<?php echo e(old('package_quantity')); ?>" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="">Quantity*</label>
                        <select name="quantity"  class="form-control">
                            <option value="Ton">Ton</option>
                            <option value="Kilogram">Kilogram</option>
                            <option value="Cubic feet">Cubic feet</option>
                            <option value="Cubic Meters">Cubic Meters</option>
                            <option value="Crate">Crate</option>
                            <option value="Bag">Bag</option>
                            <option value="Bottle">Bottle</option>
                            <option value="Unit">Unit</option>
                            <option value="Box">Box</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Crop Variety*</label>
                            <input type="text" class="form-control" name="crop_variety" value="<?php echo e(old('crop_variety')); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Dryness/ Moisture Content*</label>
                            <input type="number" class="form-control" name="moisture_content" value="<?php echo e(old('moisture_content')); ?>">
                            <small>g/m³ (grams of water per cubic meter)</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Availability Period</label>
                            <div class="row">
                                <div class="col">
                                    <small>Start date</small>
                                    <input type="date" class="form-control" name="available_start" value="<?php echo e(old('available_start')); ?>">
                                </div>
                                <div class="col">
                                    <small>End date</small>
                                    <input type="date" class="form-control" name="available_end" value="<?php echo e(old('available_end')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Total Stock Available</label>
                            <div class="row">
                                <div class="col">
                                    <small>Quantity</small>
                                    <input type="number" class="form-control" name="total_stock_available" value="<?php echo e(old('total_stock_available')); ?>">
                                </div>
                                <div class="col">
                                    <small>Units</small>
                                    <select class="form-control" name="total_stock_available_unit">
                                        <option value="kg">kg</option>
                                        <option value="li">li</option>
                                        <option value="ton">ton(s)</option>
                                        <option value="bag">bag(s)</option>
                                        <option value="box">box(es)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Minimum Order Quantity</label>
                            <div class="row">
                                <div class="col">
                                    <small>Quantity</small>
                                    <input type="number" class="form-control" name="minimum_order_quantity" value="<?php echo e(old('minimum_order_quantity')); ?>">
                                </div>
                                <div class="col">
                                    <small>Units</small>
                                    <select class="form-control" name="minimum_order_quantity_unit">
                                        <option value="kg">kg</option>
                                        <option value="li">li</option>
                                        <option value="ton">ton(s)</option>
                                        <option value="bag">bag(s)</option>
                                        <option value="box">box(es)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Delivery Cost Description</label>
                        <textarea name="delivery_cost_description" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group mt-4 mb-4">
                    <p>Enable this if farm is organic</p>
                    <label class="switch">
                        <input type="checkbox" name="organic">
                        <span class="slider"></span>
                    </label>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary w-50" type="submit">Add Farm Crop To Warehouse <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/aggregator/create-crop.blade.php ENDPATH**/ ?>