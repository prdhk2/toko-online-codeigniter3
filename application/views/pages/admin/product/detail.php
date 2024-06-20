<div class="page-wrapper">
    <div class="row">
        <div class="col-12 mx-auto">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Product Detail</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $breadcum; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <h3><?= $product->title ?></h3>
                    <p><strong>Slug:</strong> <?= $product->slug ?></p>
                    <p><strong>Price:</strong> Rp.<?= number_format($product->price, 0, ',', '.') ?></p>
                    <p><strong>Description:</strong> <?= $product->description ?></p>
                    <img src="<?= base_url('images/product/' . $product->image) ?>" alt="<?= $product->title ?>" width="200">
                </div>
            </div>
        </div>
    </div>
</div>
