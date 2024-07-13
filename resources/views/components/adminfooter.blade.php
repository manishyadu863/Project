<footer class="footer">
    {{-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
    </div> --}}
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="Dashboard/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="Dashboard/vendors/chart.js/Chart.min.js"></script>
<script src="Dashboard/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="Dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="Dashboard/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="Dashboard/js/off-canvas.js"></script>
<script src="Dashboard/js/hoverable-collapse.js"></script>
<script src="Dashboard/js/template.js"></script>
<script src="Dashboard/js/settings.js"></script>
<script src="Dashboard/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="Dashboard/js/dashboard.js"></script>
<script src="Dashboard/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script>
    @if (Session::has('alert-success'))
        toastr["success"]("{{ session::get('alert-success') }}");
    @endif
    @if (Session::has('alert-info'))
        toastr["info"]("{{ session::get('alert-info') }}");
    @endif
    @if (Session::has('alert-danger'))
        toastr["error"]("{{ session::get('alert-danger') }}");
    @endif
    @if (Session::has('alert-warning'))
        toastr["warning"]("{{ session::get('alert-warning') }}");
    @endif
</script>
</html>

