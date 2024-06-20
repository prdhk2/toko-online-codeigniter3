<div class="container-fluid">
	<div class="navbar-social d-flex align-items-center">
		<a href="#" target="_blank" class="nav-link p-2 mr-2"><i class="fab fa-whatsapp"></i></a>
		<a href="#" target="_blank" class="nav-link p-2 mr-2"><i class="fab fa-instagram"></i></a>
		<a href="#" target="_blank" class="nav-link p-2 mr-2"><i class="fab fa-facebook"></i></a>
	</div>
</div>
<nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
		<div class="navbar-brand justify-content-center">
			<h2>
				<a href="<?= base_url('/') ?>" style="text-decoration: none; font-weight:700">
					<span class="logo-first">Bakul</span><span class="text-black">Sayur</span>
				</a>
			</h2>
		</div>
		<div class="floating-menu">
			<ul>
				<li class="<?= set_active(''); ?>"><a href="<?= base_url('/') ?>">Home</a></li>
				<li class="<?= set_active('products'); ?>"><a href="<?= base_url('products'); ?>">All Product</a></li>
                <?php if ($this->session->userdata('role') !== 'admin') : ?>
                    <li class="<?= set_active('cart'); ?>"><a href="<?= base_url('cart') ?>">Shopping Cart</a></li>
                    <li class="<?= set_active('checkout'); ?>"><a href="<?= base_url('checkout') ?>">Checkout</a></li>
                    <?php endif; ?>
                    <li class="<?= set_active('available_promo'); ?>"><a href="<?= base_url('available_promo'); ?>"><i class="fa-solid fa-atom"></i> Promo's</a></li>
				<li><a href="#">Blog</a></li>
			</ul>
		</div>
        <ul class="navbar-nav">

            <li class="nav-item">
            <?php if ($this->session->userdata('role') !== 'admin') : ?>
                <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart(<?= getCart() ?>)</a>
            <?php endif; ?>
            </li>
            <?php if (!$this->session->userdata('is_login')) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('login') ?>" class="nav-link"><i class="fas fa-user"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('register') ?>" class="nav-link">Register</a>
                </li>
            <?php else: ?>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-2">
                        <?php if ($this->session->userdata('role') != 'admin') : ?>
                            <a href="<?= base_url('myorder') ?>" class="dropdown-item"><i class="fas fa-shop"></i> My Orders</a>
                        <?php endif; ?>
                        <?php if ($this->session->userdata('role') == 'admin') : ?>
                            <a href="<?= base_url('admin/dashboard') ?>" class="dropdown-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        <?php endif; ?>
                        <a href="<?= base_url('profile') ?>" class="dropdown-item"><i class="fas fa-user"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('logout') ?>" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </div>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>
