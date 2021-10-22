<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('dash/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo e(asset('dash/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('dash/js/sb-admin-2.min.js')); ?>"></script>
<script src="<?php echo e(asset('dash/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('dash/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('dash/js/demo/datatables-demo.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $("#successToast").toast({ delay: 5000 });
        $("#successToast").toast({ animate: true });
        $("#successToast").toast('show');
    })
</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/agrosourcing/resources/views/admin/partials/_leg.blade.php ENDPATH**/ ?>