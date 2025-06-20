<main role="main" class="container">

    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layouts/frontend/_menu') ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="<?= $content->image ? base_url("images/user/$content->image") : base_url('images/user/avatar.png') ?>" alt="" height="200">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <p>Nama: <?= $content->name ?></p>
                            <p>Email: <?= $content->email ?></p>
                            <p>No Handphone: <?= $content->no_telp ?></p>
                            <p>Alamat:
                                <ul>
                                    <li><?= $content->address ?></li>
                                    <li><?= $content->address ?></li>
                                    <li><?= $content->address ?></li>
                                </ul> 
                            </p>
                            <a href="<?= base_url("profile/update/$content->id") ?>" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-primary">Tambah Alamat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>