    
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url(); ?>admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>admin/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?= base_url(); ?>admin/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url(); ?>admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url(); ?>admin/dist/js/pages/chart/chart-page-init.js"></script>

    <script>
        document.getElementById('productName').addEventListener('input', function() {
            var productName = this.value;
            var slug = productName.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            document.getElementById('productSlug').value = slug;
        });
    </script>
    <script>
        document.getElementById('categoryName').addEventListener('input', function() {
            var productName = this.value;
            var slug = productName.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            document.getElementById('categorySlug').value = slug;
        });
    </script>
    <script>
        document.getElementById('productName').addEventListener('input', function() {
            let productName = this.value;
            let productSlug = productName.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
            document.getElementById('productSlug').value = productSlug;
        });
    </script>

</body>

</html>