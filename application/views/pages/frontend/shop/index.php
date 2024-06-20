<ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart(<?= getCart() ?>)</a>
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
                        aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata("name") ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-2">
                        <a href="<?= base_url('profile') ?>" class="dropdown-item"><i class="fas fa-user"></i>Profile</a>
                        <a href="<?= base_url('myorder') ?>" class="dropdown-item">Orders</a>
                        <a href="<?= base_url('logout') ?>" class="dropdown-item">Logout</a>
                    </div>
                </li>
            <?php endif ?>
        </ul>