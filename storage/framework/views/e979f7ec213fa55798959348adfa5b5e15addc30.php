<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add New Farm</h1>
    </div>



    <div class="card shadow mb-4 p-5">
        <h5 class="font-weight-lighter">PROVIDE FARM DETAILS</h5>
        <p class="font-weight-normal">Choose a crop type, the wastes will be generated for you.</p>
        <?php echo $__env->make('flash._notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card-body">
            <form action="<?php echo e(route('user.store.farm')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Longitude*</label>
                            <input type="text" class="form-control" name="longitude" value="<?php echo e(old('longitude')); ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Latitude*</label>
                            <input type="text" class="form-control" name="latitude" value="<?php echo e(old('latitude')); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Farm Size (In Acres)*</label>
                            <input type="number" class="form-control" min="0"
                                   name="size" value="<?php echo e(old('size')); ?>">
                        </div>
                    </div>
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
                </div>
                <div class="form-group">
                    <label for="district">Select District</label>
                    <select name="district" id="district" class="form-control">
                        <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($district->id); ?>" id="<?php echo e($district->region_id); ?>"><?php echo e($district->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Community (Optional)</label>
                    <input type="text" class="form-control" name="community">
                </div>


                <input type="hidden" name="district_id" id="district_id">


                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add Farm Details <i class="fa fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            var $select1 = $( '#region' ),
                $select2 = $( '#district' ),
                $options = $select2.find( 'option' );

            $select1.on( 'change', function() {
                $select2.html( $options.filter( '[id="' + this.value + '"]' ) );
            } ).trigger( 'change' );
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/user/farmer/create.blade.php ENDPATH**/ ?>