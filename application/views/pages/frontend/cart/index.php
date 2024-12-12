<main role="main" class="container">

    <div class="row">
        <div class="col-12">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card mx-auto mb-3">
                <div class="card-header">
                    Keranjang Belanja
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="header-table">
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td>
                                        <p>
                                            <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url('images/product/default.png') ?>" alt="" height="50"> 
                                            <strong><?= $row->title ?></strong>
                                        </p>
                                    </td>
                                    <td class="text-center">Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                    <td>
                                        <form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <div class="input-group">
                                                <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-check"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center">Rp.<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                    <td>
                                    <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                        <?= form_open(base_url("cart/delete/$row->id"), array('method' => 'POST')) ?>
                                        <?= form_hidden('id', $row->id) ?>
                                        <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                                        <?= form_close() ?>
                                    </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3"><strong>Total:</strong></td>
                                <td class="text-center"><strong>Rp.<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('checkout') ?>" class="btn btn-primary float-right">Pembayaran <i class="fas fa-angle-right"></i></a>
                    <a href="<?= base_url('') ?>" class="btn btn-primary text-white"><i class="fas fa-angle-left"></i> Kembali belanja</a>
                </div>
            </div>
        </div>
    </div>
</main>
