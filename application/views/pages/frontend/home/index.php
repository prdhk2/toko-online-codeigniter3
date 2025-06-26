<main role="main" class="container">
    <?php $this->load->view('layouts/frontend/_alert') ?>

        <!-- Hero Banner Section -->
    <section class="hero-banner mb-5 rounded-3" style="background: linear-gradient(rgba(116, 156, 211, 0.5), rgba(255, 255, 255, 0.5)), url('<?= base_url('assets/img/hero-bg.jpg') ?>'); background-size: cover; height: 300px;">
        <div class="container h-100 d-flex align-items-center">
            <div class="hero-content text-white">
                <h1 class="display-4 fw-bold" style="color: gray">Temukan Produk <span style="color:#5c90ff">Terbaik</span></h1>
                <p class="lead text-black">Diskon hingga 50% untuk produk pilihan</p>
                
                <form action="<?= base_url('shop/search') ?>" method="POST" class="mt-4">
                    <div class="input-group input-group-lg shadow-lg">
                        <input type="text" name="keyword" class="form-control border-0 py-3" placeholder="Cari produk..." value="<?= $this->session->userdata('keyword') ?>">
                        <button class="btn btn-primary px-4" type="submit">
                            <i class="fas fa-search me-2"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Categories Section Begin -->
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-12">
                    <!-- Sorting and Category Header -->
                    <div class="card shadow-sm mb-4 border-0">
                        <div class="card-body py-3">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="mb-2 mb-md-0">
                                    <h5 class="mb-0">Kategori: <span class="text-primary"><?= isset($category) ? $category : 'Semua Produk' ?></span></h5>
                                </div>
                                <div class="sort-options">
                                    <span class="me-2">Urutkan:</span>
                                    <div class="btn-group" role="group">
                                        <a href="<?= base_url('shop/sortby/asc') ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-arrow-down me-1"></i> Termurah
                                        </a>
                                        <a href="<?= base_url('shop/sortby/desc') ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-arrow-up me-1"></i> Termahal
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($content as $row) : ?>
                    <div class="col-md-4">
                        <div class="card-product mb-3">
                            <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.png") ?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row->product_title ?></h5>
                                <p class="card-text"><strong>Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</strong></p>
                                <p class="card-text card-description"><?= $row->description ?></p>
                                <a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-primary">
                                    <i class="fas fa-tags"></i> <?= $row->category_title ?>
                                </a>

                                <div class="product-rating mt-2">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                    <span class="ms-1">(4.5)</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <?php if($this->session->userdata('role') != 'admin') : ?>
                                <form action="<?= base_url('cart/add') ?>" method="POST" class="d-flex m-1">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                    <input type="hidden" name="qty" value="1" class="form-control qty-input">
                                    <button class="cart-btn" type="submit">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </form>
                                <form action="<?= base_url('cart/fav') ?>" method="POST" class="d-flex m-1">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                    <input type="hidden" name="qty" value="1" class="form-control qty-input">
                                    <button class="cart-btn" type="submit">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <nav aria-label="Page navigation example" class="mt-3">
                <?= $pagination ?>
            </nav>
            </div>
        <div class="col-lg-3">
        <!-- In your view file -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header border-0 py-3">
                <h5 class="mb-0 text-white"><i class="fas fa-list-ul me-2"></i> Kategori</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-0">
                        <a href="<?= base_url('home') ?>" class="text-decoration-none d-flex align-items-center py-2">
                            <i class="fas fa-boxes me-2 text-muted"></i> Semua Kategori
                        </a>
                    </li>
                    <?php foreach ($categories as $category) : ?>
                        <li class="list-group-item border-0">
                            <a href="<?= base_url("shop/category/$category->slug") ?>" class="text-decoration-none d-flex align-items-center py-2">
                                <i class="fas fa-tag me-2 text-muted"></i> <?= $category->title ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</main>
