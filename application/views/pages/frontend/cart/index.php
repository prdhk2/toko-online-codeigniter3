<main role="main" class="container py-4">
    <div class="row">
        <div class="col-12">
            <?php $this->load->view('layouts/frontend/_alert') ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card border-0 mb-4">
                <div class="card-header text-white mb-2" style="background-color: #5c90ff">
                    <h4 class="mb-0"><i class="fas fa-shopping-cart mr-2"></i>Keranjang Belanja Anda</h4>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0" style="width: 40%">Produk</th>
                                    <th class="border-0 text-center">Harga</th>
                                    <th class="border-0 text-center">Jumlah</th>
                                    <th class="border-0 text-center">Subtotal</th>
                                    <th class="border-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($content)): ?>
                                    <?php foreach ($content as $row) : ?>
                                        <tr class="align-middle">
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url('images/product/default.png') ?>" 
                                                         class="img-thumbnail border-0" 
                                                         style="width: 80px; height: 80px; object-fit: cover" 
                                                         alt="<?= $row->title ?>">
                                                    <div class="ml-3">
                                                        <h6 class="mb-1"><?= $row->title ?></h6>
                                                        <small class="text-muted">SKU: <?= $row->product_code ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="font-weight-bold text-primary">Rp<?= number_format($row->price, 0, ',', '.') ?></span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="<?= base_url("cart/update/$row->id") ?>" method="POST" class="d-inline-block">
                                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                                    <div class="input-group input-group-sm" style="width: 120px">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn btn-outline-secondary btn-minus"><i class="fas fa-minus"></i></button>
                                                        </div>
                                                        <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>" min="1">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-outline-secondary btn-plus"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="text-center align-middle">
                                                <span class="font-weight-bold">Rp<?= number_format($row->subtotal, 0, ',', '.') ?></span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST" class="d-inline">
                                                    <?= form_hidden('id', $row->id) ?>
                                                    <?= form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()) ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus item ini dari keranjang?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="empty-cart">
                                                <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                                                <h5 class="text-muted">Keranjang Belanja Kosong</h5>
                                                <p class="text-muted">Anda belum menambahkan produk ke keranjang</p>
                                                <a href="<?= base_url('') ?>" class="btn btn-primary">
                                                    <i class="fas fa-arrow-left mr-2"></i>Lanjutkan Belanja
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <?php if(!empty($content)): ?>
                        <div class="cart-summary p-4 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Kode Kupon">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">Gunakan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal:</span>
                                        <span class="font-weight-bold">Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?></span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Ongkos Kirim:</span>
                                        <span class="font-weight-bold">-</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Diskon:</span>
                                        <span class="font-weight-bold text-danger">Rp0</span>
                                    </div>
                                    <div class="d-flex justify-content-between total-price">
                                        <h5 class="mb-0">Total:</h5>
                                        <h4 class="mb-0 text-primary">Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                
                <?php if(!empty($content)): ?>
                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                        <a href="<?= base_url('') ?>" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left mr-2"></i>Lanjutkan Belanja
                        </a>
                        <a href="<?= base_url('checkout') ?>" class="btn btn-primary px-4">
                            Proses Pembayaran <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>

<!-- Add this in your head section or layout file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .bg-gradient-primary {
        background: linear-gradient(87deg, #4e73df 0, #224abe 100%) !important;
    }
    .btn-primary {
        background-color: #5c90ff !important;
    }
    .header-table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
    .cart-summary {
        background-color: #f8f9fa;
    }
    .total-price {
        padding-top: 1rem;
        border-top: 1px dashed #dee2e6;
    }
    .btn-minus, .btn-plus {
        width: 36px;
    }
    .empty-cart {
        padding: 2rem 0;
    }
</style>

<script>
$(document).ready(function() {
    // Quantity increment
    $('.btn-plus').click(function() {
        var input = $(this).closest('.input-group').find('input');
        var val = parseInt(input.val()) + 1;
        input.val(val).trigger('change');
        $(this).closest('form').submit();
    });
    
    // Quantity decrement
    $('.btn-minus').click(function() {
        var input = $(this).closest('.input-group').find('input');
        var val = parseInt(input.val()) - 1;
        if(val >= 1) {
            input.val(val).trigger('change');
            $(this).closest('form').submit();
        }
    });
    
    // Auto submit when quantity changes
    $('input[name="qty"]').change(function() {
        $(this).closest('form').submit();
    });
});
</script>