<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?= isset($title) ? $title : "TokoSayur" ?> - BakulSayur</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/navbar-fixed/">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?= base_url("/template/css/styles.css") ?>">
	<link rel="stylesheet" href="<?= base_url("/assets/css/app.css") ?>">

	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	<!-- fontawesome -->
	<link rel="stylesheet" href="<?= base_url() ?>template/css/all.min.css">

	<link rel="stylesheet" href="<?php echo base_url('template/css/bootstrap.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/fontawesome.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/elegant-icons.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/nice-select.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/jquery-ui.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/owl.carousel.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('template/css/slicknav.min.css'); ?>" type="text/css">

</head>

<body>
<div id="preloader">
    <div class="spinner-border text-danger" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
	<!-- Navbar -->
	<?php $this->load->view('layouts/frontend/_navbar') ?>
	<!-- End Navbar -->

	<?php if ($this->uri->segment(1) == ''): ?>
    <!-- carousel -->
    <div class="container">
        <?php $this->load->view('layouts/frontend/_carousel') ?>
    </div>
    <!-- carousel end -->
	<?php endif; ?>


	<!-- Content -->
    <div class="container" style="min-height: 40vh; margin-bottom:1.25rem;">
		<?php $this->load->view($page) ?>
	</div>
	<!-- End Content -->

	<!-- footer -->
	 <?php $this->load->view('layouts/frontend/_footer'); ?>
	<!-- footer end -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="<?= base_url("/assets/js/app.js") ?>"></script>

	<!-- Js Plugins -->
	<script src="<?php echo base_url('template/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/jquery.nice-select.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/jquery.slicknav.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/mixitup.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('template/js/main.js'); ?>"></script>
	<script>
		$(window).on('load', function () {
			$("#preloader").delay(200).fadeOut("slow");
		});
	</script>
	
</body>

</html>
