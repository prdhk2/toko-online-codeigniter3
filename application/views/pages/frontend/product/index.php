<main role="main" class="container">

    <div class="row">
        <div class="col-md-10 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="row">
        <?php foreach ($content as $row) : ?>
            <div class="col-md-3">
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
</main>