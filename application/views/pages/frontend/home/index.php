<main role="main" class="container">
    <?php $this->load->view('layouts/frontend/_alert') ?>
    <!-- Categories Section Begin -->
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-8">
                    <div class="card mb-3 sort-by">
                        <div class="card-body">
                            Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                            <span class="float-right">
                                Urutkan harga: 
                                <a href="<?= base_url('shop/sortby/asc') ?>" class="badge badge-danger">
                                    <i class="fa-solid fa-chevron-down"></i> Termurah
                                </a> 
                                | 
                                <a href="<?= base_url('shop/sortby/desc') ?>" class="badge badge-danger">
                                    <i class="fa-solid fa-chevron-up"></i> Termahal
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search-card mb-3">
                        <div class="card-body">
                            <form action="<?= base_url('shop/search') ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                <a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-danger">
                                    <i class="fas fa-tags"></i> <?= $row->category_title ?>
                                </a>
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
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3 category-card" style="border: none; border-radius: 1rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #fff; border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                            Category
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="border: none;"><a href="<?= base_url('home') ?>" class="category-link">Semua kategori</a></li>
                            <?php foreach (getCategories() as $category) : ?>
                                <li class="list-group-item" style="border: none;"><a href="<?= base_url("shop/category/$category->slug") ?>" class="category-link"><?= $category->title ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
