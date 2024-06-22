    
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
    <script>
        function printOrderDetails() {
            var logo = '<div class="navbar-brand justify-content-center"><h2><p style="text-decoration: none; font-weight:700"><span class="logo-first">Bakul</span><span class="text-black">Sayur</span></p></h2></div>';
            var thanks = '<div class="justify-content-center">Terimakasih Sudah Order :)</div>'
            var orderDetails = document.getElementById("order-details").outerHTML;
            var orderItems = document.getElementById("order-items").outerHTML;
            var newWin = window.open("", "Print-Window");
            newWin.document.open();
            newWin.document.write('<html><head><title>Print Order</title><style>body{font-family: Arial, sans-serif; margin: 0; padding: 0; text-align: center;} table{width: 90%; margin: 10px auto; border-collapse: collapse;} th, td{border: 1px solid #ddd; padding: 8px; text-align: left;} th{text-align: center;} .text-center{text-align: center;} .print-container{width: 80%; margin: auto;} .navbar-brand{display: flex; justify-content: center; align-items: center; margin-bottom: 20px;}</style></head><body onload="window.print()"><div class="print-container">' + logo + orderDetails + '<br>' + orderItems + '<br>' + thanks +'</div></body></html>');
            newWin.document.close();
            setTimeout(function(){ newWin.close(); }, 10);
        }
    </script>
</body>

</html>