<!-- Bootstrap core JavaScript-->
<script src="{{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('dash/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('dash/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('dash/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dash/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dash/js/demo/datatables-demo.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#successToast").toast({ delay: 5000 });
        $("#successToast").toast({ animate: true });
        $("#successToast").toast('show');
    })
</script>
@yield('scripts')
</body>

</html>
