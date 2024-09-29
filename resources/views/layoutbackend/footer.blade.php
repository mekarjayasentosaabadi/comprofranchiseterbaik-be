   <!-- BEGIN: Footer-->
<script>
    var listRoutes = JSON.parse('{{ json_decode(listRoutes()) }}')
</script>
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2024 Makko Group<span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/extensions/moment.min.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js">
</script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js">
</script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js">
</script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('') }}assetsbackend/app-assets/js/core/app-menu.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('') }}assetsbackend/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/js/scripts/pages/app-invoice-list.js"></script>
<script src="{{ asset('') }}assetsbackend/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page JS-->
