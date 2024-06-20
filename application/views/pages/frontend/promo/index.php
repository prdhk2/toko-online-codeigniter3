<main role="main" class="container">

    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="row">
        <?php foreach ($promos as $promo) : ?>
            <div class="col-12">
                <div class="card" style="box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.2); border-radius:2rem; margin:1rem;">
                    <div class="card-body d-flex align-items-center">
	
                        <img src="<?= base_url("images/promo/{$promo->image}") ?>" class="card-img-left" alt="<?= $promo->title ?>" style="width: 150px; height: 150px; object-fit: cover; margin-right: 20px; border-radius:2rem; ">
                        <div>
                            <h5 class="card-title"><?= $promo->title ?></h5>
                            <p class="card-text"><?= $promo->description ?></p>
                            <p>
                                Promo Berlaku mulai : <?= $promo->start_date ?><br>
                                <span style="color: red;"> Promo Berakhir pada : <?= $promo->end_date ?></span>
                            </p>
                            <a href="<?= base_url("promo/detail/{$promo->id}") ?>" class="btn btn-primary">Detail Promo</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
