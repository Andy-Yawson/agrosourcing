<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Warehouse</h1>
    </div>

    <div class="card shadow mb-4 p-3">
        <div class="card-body">
            <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="<?php echo e(route('user.store.warehouse')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Longitude">Longitude*</label>
                            <input type="text" name="longitude" class="form-control"  value="<?php echo e(old('longitude')); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="Latitude">Latitude*</label>
                            <input type="text" name="latitude" class="form-control"  value="<?php echo e(old('latitude')); ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="region">Select Region*</label>
                            <select name="region" class="form-control" id="region">
                                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($region->id); ?>"><?php echo e($region->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="district">Select District</label>
                            <select name="district" id="district" class="form-control">
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($district->id); ?>" id="<?php echo e($district->region_id); ?>"><?php echo e($district->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Select Crop Types*</label>
                            <select class="form-control select2-multi"
                                    name="crops[]" multiple="multiple" id="crops" required>
                                <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($crop->id); ?>"><?php echo e($crop->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="image">Warehouse Image*</label>
                            <input type="file" name="image" class="form-control" value="<?php echo e(old('image')); ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Type of warehouse*</label>
                            <select name="type_of_warehouse" class="form-control">
                                <option value="Certified Seed Storage">Certified Seed Storage</option>
                                <option value="Harvested Crop Storage">Harvested Crop Storage</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Warehouse Storage Capacity (cu ft)</label>
                        <input type="number" class="form-control" name="storage_capacity" required>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Other services*</label>
                            <select name="other_services" class="form-control">
                                <option value="Aflatoxin Testing">Aflatoxin Testing</option>
                                <option value="Grain Threshing">Grain Threshing</option>
                                <option value="Moisture Testing">Moisture Testing</option>
                                <option value="Weighing">Weighing</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Warehouse Certifications*</label>
                            <select name="warehouse_certification" class="form-control">
                                <option value="HACCP - (Hazard Analysis Critical Control Point)">HACCP - (Hazard Analysis Critical Control Point)</option>
                                <option value="GLOBAL GAP">GLOBAL GAP</option>
                                <option value="NOP USDA -Organic Certification">NOP USDA -Organic Certification</option>
                                <option value="EU BIO - Organic Certification">EU BIO - Organic Certification</option>
                                <option value="ISL Certification">ISL Certification</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Other Certifications</label>
                        <input type="text" class="form-control" name="other_certification">
                        <small>Please Add any other Certifications you have that are not listed in the options and <b>separate with a comma</b></small>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-plus"></i> Add Warehouse
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/select2.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2-multi').select2();

            var $select1 = $( '#region' ),
                $select2 = $( '#district' ),
                $options = $select2.find( 'option' );

            $select1.on( 'change', function() {
                $select2.html( $options.filter( '[id="' + this.value + '"]' ) );
            } ).trigger( 'change' );

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/aggregator/add_warehouse.blade.php ENDPATH**/ ?>